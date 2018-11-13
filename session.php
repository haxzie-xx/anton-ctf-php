<?php
    include('config.php');
    session_start();

    $user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($conn,"select id, email, name from users where email = '$user_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['email'];
    $login_username = $row['name'];
    $login_user_id = $row['id'];
    
    if(!isset($_SESSION['login_user'])){
        header("Location: login.php");
        die();
    }

?>