<!DOCTYPE html>
<html>

<?php include 'includes/header.php' ?>
<?php 
    $CHALLENGES = "challenges";
    $LEADERBOARD = "leaderboard";
    $current_page = $CHALLENGES;

    if (isset($_GET["p"]) && $_GET["p"] == $LEADERBOARD) {
        $current_page = $LEADERBOARD;
    } else {
        $current_page = $CHALLENGES;
    }
?>
<body>
<div class="dash-container">
    <div class="dash-side-nav"></div>
    <div class="dash-content">
        <div class="dash-nav">
            <div class="tabs">
                <ul>
                    <?php 
                        if ($current_page == $CHALLENGES) {
                            echo "<li><a href='dashboard.php?p=challenges' class='active'>Challenges</a></li>";
                            echo "<li><a href='dashboard.php?p=leaderboard'>Leaderboard</a></li>";
                        } else {
                            echo "<li><a href='dashboard.php?p=challenges'>Challenges</a></li>";
                            echo "<li><a href='dashboard.php?p=leaderboard'  class='active'>Leaderboard</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="dash-challenge-container">
            <?php 
                if ($current_page == $CHALLENGES) {
                    include 'includes/challenges.php';
                } else {
                    include 'includes/leaderboard.php';
                }
            ?>
        </div>
    </div>
    
</div>
</body>
</html>