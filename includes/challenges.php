<div class="challenge-category">

        <?php 

            $sql = "select c_id from scoreboard where user_id = ".$login_user_id;
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            $solved_id = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($solved_id, $row['c_id']);
            }

            $sql = "select ch.id, ch.title, ch.score, cat.name as cat_name from challenges as ch, category as cat where ch.cat_id = cat.cat_id order by cat.name";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            $count = mysqli_num_rows($result);
            $prev_cat_name = "";
            
            $flag = 0;

            if ($count > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    if ($prev_cat_name != $row["cat_name"]) {
                        if ($flag == 1) {
                            echo "</div>";
                        }
                        $flag = 1;

                        $prev_cat_name = $row["cat_name"];

                        echo "<h3>".$row["cat_name"]."</h3>";
                        echo "<div class='card-container'>";
                    }

                    $isSolvedClass = in_array($row["id"], $solved_id) ? "solved" : "points";
                    echo "<div class='card' data-id='".$row["id"]."'>";
                    echo "<p>".$row["title"]."</p>";
                    echo "<p class='$isSolvedClass'>".$row["score"]."</p>";
                    echo "</div>";
                }

                echo "</div>";

            }
        ?>
</div>


<div id="modal-display-challenge" class="modal">
    <div class="modal-card">
        <h2 id="challenge-id">Challenge </h2>
        <form id="solve-form" action="solve_challenge.php" method="POST">
            <h3 id="challenge-name" class="modal-title">Challenge Title</h3>
            <p id="challenge-desc" >
            </p>
            <div class="row">
                <input type="text" id="text-flag" placeholder="Flag"  autocomplete="off" name="flag" />
            </div>
            <input type="submit" id="btn-solve" name="add_challenge" value="SOLVE">
        </form>
        <button id="btn-modal-close" class="btn-close"><img src="images/close.svg"/></button>
    </div>
</div>

<script src="js/modal.js"></script>
<script>
    let challengeModal = new ChallengeModal("modal-display-challenge", "card", "btn-modal-close", "btn-solve");
    challengeModal.init(<?php echo "\"$login_user_id\"" ?>);
</script>