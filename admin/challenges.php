<div class="admin-challenges">
    <div class="container">
        <div class="toolbar">
            <h3>Challenges</h3>
            <button id="btn-add-challenge">ADD</button>
        </div>
        <table>
            <tr class="head">
                <th>Sl.no</th>
                <th>Title</th>
                <th>Category</th>
                <th>Score</th>
                <th>Solved</th>
            </tr>

            <?php 
                $sql = "select @a:=@a+1 sl_no, ch.id, ch.title, ch.score, cat.name from (SELECT @a:= 0) AS a, challenges ch, category cat where ch.cat_id = cat.cat_id order by ch.id";
                $result = mysqli_query($conn, $sql) or die(mysqli_error());
                if (!$result) echo "ERROR";
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr class='content'>";
                        echo "<td>".$row["sl_no"]."</td>";
                        echo "<td>".$row["title"]."</td>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["score"]."</td>";
                        echo "<td>".$row["id"]."</td>";
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