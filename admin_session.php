<?php
    include('config.php');
    session_start();

    $user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($conn,"select email, name, role from users where email = '$user_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['email'];
    $login_username = $row['name'];
    
    if(!isset($_SESSION['login_user']) && $row['role'] != "admin"){
        header("Location: login.php");
        die();
    }

?>