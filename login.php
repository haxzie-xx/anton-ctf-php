<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Anton CTF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="js/main.js"></script>
</head>

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
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                </ul>
            </div>
            <form action="dashboard.php" method="POST">
                <input type="text" name="email" placeholder="Email Address"/>
                <input type="password" name="password" placeholder="Password"/>
                <input type="submit" value="Sign In">
            </form>

            <p>
                <a href="forgot_password">Forgot password?</a>
            </p>
        </div>
    </div>


</body>

</html>