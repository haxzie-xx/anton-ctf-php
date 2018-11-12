<?php 
    include 'config.php';

    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cid'])) {

        $sql = "select title, description, score from challenges where id = ".$_GET['cid'].";";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        if (!$result) echo "ERROR";
        $count = mysqli_num_rows($result);

        if ( $count != 1) {
            $obj->message = "ERROR";
            die(json_encode($obj));
        } else {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $obj->title = $row["title"];
            $obj->description = $row["description"];
            $obj->score = $row["score"];

            echo json_encode($obj);
            die();
        }
    } else {
        die("ERROR");
    }
?>