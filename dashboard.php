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

<div class="dash-container">
    <div class="dash-side-nav">
        <h2>Anton CTF</h2>
        <p class="nav-username"><?php echo $login_username ?></p>
        <div class="score">
            <h1 class="score">0</h1>
        </div>
        <div class="status">
            <div class="col">
                <h3>25/50</h3>
                <p>Solved</p>
            </div>
            <div class="col">
                <h3>30/100</h3>
                <p>Rank</p>
            </div>
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