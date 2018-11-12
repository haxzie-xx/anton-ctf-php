<div class="admin-categories">
    <div class="container">
        <div class="toolbar">
            <h3>Categories</h3>
            <button id="btn-add-category">ADD</button>
        </div>
        <table>
            <tr class="head">
                <th>Sl.no</th>
                <th>Cat ID</th>
                <th>Category</th>
                <th>Challenges</th>
            </tr>

            <?php 
                $sql = "select @a:=@a+1 sl_no, cat.cat_id, cat.name from category cat, (SELECT @a:= 0) AS a order by cat.cat_id";
                $result = mysqli_query($conn, $sql) or die(mysqli_error());
                if (!$result) echo "ERROR";
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr class='content'>";
                        echo "<td>".$row["sl_no"]."</td>";
                        echo "<td>".$row["cat_id"]."</td>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["cat_id"]."</td>";
                        echo "</tr>";
                    }

                }

            ?>
        </table>
    </div>

</div>

<div id="modal-add-category" class="modal">
    <div class="modal-card">
        <h2>New Category</h2>
        <form action="admin/controllers/add_category.php" method="POST">
            <input type="text" name="title" placeholder="Category Title"/>
            <input type="submit" name="add_category" value="CREATE">
        </form>
        <button id="btn-modal-close"class="btn-close"><img src="images/close.svg"/></button>
    </div>
</div>

<script src="js/modal.js"></script>
<script>
    Modal.init("modal-add-category", "btn-add-category", "btn-modal-close");
</script>