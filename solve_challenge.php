<?php

    include 'config.php';

    $_POST = json_decode(file_get_contents("php://input"),TRUE);
    //$_POST = json_decode($_POST["message"], TRUE);

    if (isset($_POST['cid']) && isset($_POST['flag']) && isset($_POST['userid'])) {

        $cid = $_POST['cid'];
        $userId = $_POST['userid'];
        $flag = $_POST['flag'];

        $sql = "select * from scoreboard where c_id = ".$cid." and user_id = ".$userId." ;";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $response->status = 200;
            $response->message = "You have already solved this question";
            die(json_encode($response));
        }

        $sql = "select flag from challenges where id = ".$cid.";";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $count = mysqli_num_rows($result);

        if ($count > 0 ){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
            if ($row['flag'] == $flag) {
                $sql = "insert into scoreboard(user_id, c_id) values(".$userId.",".$cid.");"; 
                $result = mysqli_query($conn, $sql) or die(mysqli_error());
                
                $response->status = 200;
                $response->message = "Awesome! Correct Flag!";
                echo json_encode($response);
            } else {
                $response->status = 500;
                $response->message = "Wrong Flag";
                echo json_encode($response);
            }
        } else {
            $response->status = 500;
            $response->message = "Invalid Challenge";
            echo json_encode($response);
        }
    } else {
        $response->status = 500;
        $response->message = "in sufficient parameters";
        echo json_encode($response);
    }
    
    //echo $_POST['flag'];
?>