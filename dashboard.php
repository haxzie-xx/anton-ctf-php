<?php 
    include 'session.php';
?>
<!DOCTYPE html>
<html>

<?php include 'includes/header.php' ?>
<?php 
    $CHALLENGES = "challenges";
    $LEADERBOARD = "leaderboard";
    $SETTINGS = "settings";

    $current_page = $CHALLENGES;

    if (isset($_GET["p"]) && $_GET["p"] == $LEADERBOARD) {
        $current_page = $LEADERBOARD;
    } else if (isset($_GET["p"]) && $_GET["p"] == $CHALLENGES){
        $current_page = $CHALLENGES;
    } else if (isset($_GET["p"]) && $_GET["p"] == $SETTINGS){
        $current_page = $SETTINGS;
    } else {
        header('Location: dashboard.php?p=challenges');
        die();
    }
?>

<body>

<?php 
    $sql = "select @a:=@a+1 as rank, u.id as user_id, count(sb.c_id) as solved, sum(ch.score) as score from (SELECT @a:= 0) AS a, users as u, challenges as ch, scoreboard as sb where sb.c_id = ch.id and sb.user_id = u.id group by sb.user_id order by score";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    $count = mysqli_num_rows($result);

    $user_score = 0;
    $user_rank = 0;
    $user_solve = 0;

    for ($i = 0; $i < $count; $i++) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row['user_id'] == $login_user_id) {
            $user_score = $row['score'];
            $user_solve = $row['solved'];
            $user_rank = $row['rank'];

            break;
        }
    }

    $users_count = 0;
    $challenges_count = 0;

    $sql = "select count(u.id) as u_count from  users u";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $users_count = $row['u_count'];
    }

    $sql = "select count(ch.id) as ch_count from  challenges ch";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $challenges_count = $row['ch_count'];
    }

?>
<div class="dash-container">
    <div class="dash-side-nav">
        <h2>Anton CTF</h2>
        <p class="nav-username"><?php echo $login_username ?></p>
        <div class="score">
            <h1 class="score"><?php echo $user_score ?></h1>
        </div>
        <div class="status">
            <div class="col">
                <h3><?php echo "$user_solve / $challenges_count" ?></h3>
                <p>Solved</p>
            </div>
            <div class="col">
                <h3><?php echo "$user_rank / $users_count" ?></h3>
                <p>Rank</p>
            </div>
        </div>
		<div class="links">
			    <a href="about-us.html">About</a>
			    <a href="contact-us.php">Contact Us</a>
		</div>
    </div>
    <div class="dash-content">
        <div class="dash-nav">
            <div class="tabs">
                <ul>
                    <?php 
                        if ($current_page == $CHALLENGES) {
                            echo "<li><a href='dashboard.php?p=challenges' class='active'>Challenges</a></li>";
                            echo "<li><a href='dashboard.php?p=leaderboard'>Leaderboard</a></li>";
                            echo "<li><a href='dashboard.php?p=settings'>Settings</a></li>";
                        } else if($current_page == $LEADERBOARD) {
                            echo "<li><a href='dashboard.php?p=challenges'>Challenges</a></li>";
                            echo "<li><a href='dashboard.php?p=leaderboard'  class='active'>Leaderboard</a></li>";
                            echo "<li><a href='dashboard.php?p=settings'>Settings</a></li>";
                        } else if($current_page == $SETTINGS) {
                            echo "<li><a href='dashboard.php?p=challenges'>Challenges</a></li>";
                            echo "<li><a href='dashboard.php?p=leaderboard'>Leaderboard</a></li>";
                            echo "<li><a href='dashboard.php?p=settings'  class='active'>Settings</a></li>";
                        }  
                    ?>
                </ul>
            </div>
            <a href="logout.php" class="logout">Logout</a>
        </div>
        <div class="dash-challenge-container">
            <?php 
                if ($current_page == $CHALLENGES) {
                    include 'includes/challenges.php';
                } else if ($current_page == $LEADERBOARD){
                    include 'includes/leaderboard.php';
                } else if ($current_page == $SETTINGS) {
                    include 'includes/settings.php';
                }
            ?>
        </div>
    </div>
    
</div>

<div class="toast" id="toast">
    <h3 id="message">Error</h3>
</div>
<script>
let myToast = new Toast();
myToast.init(document.getElementById("toast")); 
</script>

</body>
</html>