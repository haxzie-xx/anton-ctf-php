<div class="challenge-category">

        <?php 
            $sql = "select ch.id, ch.title, ch.score, cat.name as cat_name from challenges as ch, category as cat where ch.cat_id = cat.cat_id order by cat.name";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            if (!$result) echo "ERROR";
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


                    echo "<div class='card' data-id='".$row["id"]."'>";
                    echo "<p>".$row["title"]."</p>";
                    echo "<p class='points'>".$row["score"]."</p>";
                    echo "</div>";
                }

                echo "</div>";

            }
        ?>
</div>


<div id="modal-display-challenge" class="modal">
    <div class="modal-card">
        <h2 id="challenge-id">Challenge </h2>
        <form action="solve_challenge.php" method="POST">
            <h3 id="challenge-name" class="modal-title">Challenge Title</h3>
            <p id="challenge-desc" >
                Lorem ipsum dolor sit amet conspectuas Lorem ipsum dolor sit amet conspectuas Lorem ipsum dolor sit amet conspectuas Lorem ipsum dolor sit amet conspectuasLorem ipsum dolor sit amet conspectuasLorem ipsum dolor sit amet conspectuas
            </p>
            <div class="row">
                <input type="text" id="text-flag" placeholder="Flag" name="flag" />
            </div>
            <input type="submit" name="add_challenge" value="SOLVE">
        </form>
        <button id="btn-modal-close" class="btn-close"><img src="images/close.svg"/></button>
    </div>
</div>

<script src="js/axios.min.js"></script>
<script src="js/modal.js"></script>
<script>
    ChallengeModal.init("modal-display-challenge", "card", "btn-modal-close");
</script>