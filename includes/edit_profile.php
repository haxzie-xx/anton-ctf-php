<?php 
    include '../session.php';
    include '../config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change-name'])) {

        if(isset($_POST['username'])) {
            $change_name = mysqli_escape_string($_POST['username']);
            $sql = "update users set name = \"".$change_name."\" where id = ".$login_user_id;
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            $count = mysqli_num_rows($result);
            header('Location: /anton/dashboard.php?p=settings');
        } else {
            echo "Invalid Parameter";
        }
    }else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change-password'])) {

        if(isset($_POST['old-password']) && isset($_POST['new-password'])) {

            $change_password = $_POST['new-password'];
            $old_password = $_POST['old-password'];

            $sql = "select email from users where id = $login_user_id and password = \"$old_password\";";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            $count = mysqli_num_rows($result);
            if ($count > 0 ) {
                $sql = "update users set password = \" $change_password \" where id = $login_user_id";
                $result = mysqli_query($conn, $sql) or die(mysqli_error());
                $count = mysqli_num_rows($result);
                header('Location: /anton/dashboard.php?p=settings');
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "Invalid Parameter";
        }
    }else {
        echo "Error!";
    }

?>