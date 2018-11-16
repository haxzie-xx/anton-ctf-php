<?php 

    $admin_user_count = 0;
    $admin_challenge_count = 0;
    $admin_cat_count = 0;

    $sql = "select count(*) as count from users";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    if (!$result) echo "ERROR";
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $admin_user_count = $row['count'];
    }

    $sql = "select count(*) as count from challenges";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    if (!$result) echo "ERROR";
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $admin_challenge_count = $row['count'];
    }

    $sql = "select count(*) as count from category";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    if (!$result) echo "ERROR";
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $admin_cat_count = $row['count'];
    }
?>

<div class="admin-dashboard">
    <div class="dash-row">
        <div class="col">
            <h3>Users</h3>
            <h1><?php echo $admin_user_count ?></h1>
        </div>
        <div class="col">
            <h3>Challenges</h3>
            <h1><?php echo $admin_challenge_count ?></h1>
        </div>
        <div class="col">
            <h3>categories</h3>
            <h1><?php echo $admin_cat_count ?></h1>
        </div>
    </div>
    <div class="container">
    <div class="toolbar">
            <h3>Recent Solves</h3>
        </div>
        <table>
            <tr class="head">
                <th>Name</th>
                <th>Challenge</th>
                <th>Score</th>
            </tr>

            <?php 

                $sql = "select @a:=@a+1 as sl_no, u.name as name, ch.title as title, ch.score as score from (SELECT @a:= 0) AS a, users as u, challenges as ch, scoreboard as sb where sb.c_id = ch.id and sb.user_id = u.id order by sb.ts asc";
                $result = mysqli_query($conn, $sql) or die(mysqli_error());
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr class='content'>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["title"]."</td>";
                        echo "<td>".$row["score"]."</td>";
                        echo "</tr>";
                    }

                }

            ?>
        </table>
    </div>
</div>