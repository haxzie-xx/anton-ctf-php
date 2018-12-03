<div class="admin-leaderboard">
    <div class="container">
        <div class="toolbar">
            <h3>LeaderBoard</h3>
        </div>
        <table>
            <tr class="head">
                <th>Rank</th>
                <th>Name</th>
                <th>Score</th>
                <th>Solved</th>
            </tr>

            <?php 

                $sql = "select @a:=@a+1 as rank, u.name as name, count(sb.c_id) as solved, sum(ch.score) as sscore from (SELECT @a:= 0) AS a, users as u, challenges as ch, scoreboard as sb where sb.c_id = ch.id and sb.user_id = u.id group by sb.user_id order by sscore desc";
                $result = mysqli_query($conn, $sql) or die(mysqli_error());
                $count = mysqli_num_rows($result);
                $i = 1;
                if ($count > 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr class='content'>";
                        echo "<td>".$i++."</td>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["sscore"]."</td>";
                        echo "<td>".$row["solved"]."</td>";
                        echo "</tr>";
                    }

                }

            ?>
        </table>
    </div>

</div>

<div id="modal-add-challenge" class="modal">
    <div class="modal-card">
        <h2>New Challenge</h2>
        <form action="admin/controllers/add_challenge.php" method="POST">
            <input type="text" name="title" placeholder="Challenge Title"/>
            <textarea name="description" placeholder="Challenge Description"></textarea>
            <div class="row">
                <select name="cat_id">
                    <option disabled selected>Choose category</option>
                    <?php 
                        $sql = "select cat.cat_id, cat.name from category cat order by cat.cat_id";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error());
                        if (!$result) echo "ERROR";
                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo "<option value=\"".$row["cat_id"]."\">".$row["name"]."</option>";
                            }
                        }
                    ?>
                </select>
                <input type="text" placeholder="Score" name="score" />
                <input type="text" placeholder="Flag" name="flag" />
            </div>
            <input type="submit" name="add_challenge" value="CREATE">
        </form>
        <button id="btn-modal-close"class="btn-close"><img src="images/close.svg"/></button>
    </div>
</div>

<script src="js/modal.js"></script>
<script>
    Modal.init("modal-add-challenge", "btn-add-challenge", "btn-modal-close");
</script>