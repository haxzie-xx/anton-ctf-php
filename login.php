<?php 
    include("config.php");
    session_start();
    $count=0;
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login-submit'])) {
        $myEmail = mysqli_real_escape_string($conn,$_POST['email']);
        $myPassword = mysqli_real_escape_string($conn,$_POST['password']); 
        $sql = "SELECT `id`, `role`, `name` FROM `users` WHERE `email` = \"".$myEmail."\" and `password` = \"".$myPassword."\"";
        
        if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
        }

        $result = mysqli_query($conn, $sql);

        if(! $result ) {
            die('Could not get data: '.$sql . mysqli_error());
        }

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result);
        if($count == 1) {
            $_SESSION['login_user'] = $myEmail;
            $_SESSION['role'] = $row['role'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            if(($row['role'] == 'user')) {
                header('location: dashboard.php');
                die('Logged in as user');
            } else if (($row['role'] == 'admin')) {
                header("location: admin.php");
                die();
            } else {
                header("location: login.php?p=login#invalid");
                die("Invalid User Category");
            }
         } else {
            header("location: login.php?p=login#error");
            echo("Invalid User Category");
            die();
         }
    } else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup-submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $sql = "SELECT `email` from `users` where `email`='$email'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1){
            echo("User already exists");
            die();
        }
        else{
            $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES('$name', '$email', '$password')";
            $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        }
    }
?>
<?php 

    $LOGIN = "login";
    $SIGNUP = "signup";
    $current_page = null;

    //redirect to login page 
    //set the current page to login or sign up based on the param
    if (isset($_GET['p']) && $_GET['p'] == "login") {
        $current_page = $LOGIN;
    } else if (isset($_GET['p']) && $_GET['p'] == "signup") {
        $current_page = $SIGNUP;
    } else {
        header('Location: login.php?p=login');
        die();
    }
?>

<!DOCTYPE html>
<html>

<?php 
    include 'includes/header.php';
?>
<body>
    <div class="background"></div>
    <div class="foreground"></div>
    <nav>
        <div class="nav-container">
            <h1>
                SOSC
            </h1>
        </div>

    </nav>
    <div class="main-container">
        <div class="login-card">
            <div class="tabs">
                <ul>
                    <?php 
                        if ($current_page == $LOGIN) {
                            echo '<li><a href="login.php?p=login" class="active">Login</a></li>';
                            echo '<li><a href="login.php?p=signup">Sign Up</a></li>';
                        } else if ($current_page == $SIGNUP) {
                            echo '<li><a href="login.php?p=login">Login</a></li>';
                            echo '<li><a href="login.php?p=signup"  class="active">Sign Up</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <?php 
                if ($current_page == $LOGIN) {
                    include 'includes/login.php';
                } else if ($current_page == $SIGNUP){
                    include 'includes/signup.php';
                }
            ?>
        </div>
    </div>


</body>

</html>