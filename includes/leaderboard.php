<div class="leaderboard">
    <h3>Leaderboard</h3>
    <table>
        <thead>
            <tr class="heading">
                <th>Rank</th>
                <th>Name</th>
                <th>Solved</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>

            <?php 

                $sql = "select @a:=@a+1 as rank, u.name as name, count(sb.c_id) as solved, sum(ch.score) as score from (SELECT @a:= 0) AS a, users as u, challenges as ch, scoreboard as sb where sb.c_id = ch.id and sb.user_id = u.id group by sb.user_id order by score desc";
                $result = mysqli_query($conn, $sql) or die(mysqli_error());
                $count = mysqli_num_rows($result);
                $i = 1;
                if ($count > 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$i++."</td>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["solved"]."</td>";
                        echo "<td>".$row["score"]."</td>";
                        echo "</tr>";
                    }

                }

            ?>
            
        </tbody>

    </table>
</div>