<?php 
    include 'config.php';

    $_POST = json_decode(file_get_contents("php://input"),TRUE);

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cid']) && isset($_POST['userid'])) {

        $user_id = $_POST['userid'];
        $challenge_id = $_POST['cid'];


        $sql = "select s_id from scoreboard where user_id = $user_id and c_id = $challenge_id";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $count = mysqli_num_rows($result);
        $isSolved = $count != 0? true: false;

        $sql = "select title, description, score from challenges where id = ".$_POST['cid'].";";
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
            $obj->isSolved = $isSolved;

            echo json_encode($obj);
            die();
        }
    } else {
        die("ERROR");
    }
?>