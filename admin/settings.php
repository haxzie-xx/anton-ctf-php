<div class="admin-leaderboard">
    <div class="container">
        <div class="toolbar">
            <h3>Settings</h3>
			<table>

			</table>
        </div>
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