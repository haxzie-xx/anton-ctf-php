<?php 
	include 'config.php';

	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sunmit-message'])) {

		$visitor_name=$_POST['name'];
		$visitor_email=$_POST['email'];
		$visitor_message=$_POST['message'];

		$sql="INSERT INTO visitors VALUES(0,'$visitor_name','$visitor_email','$visitor_message')";
		$result = mysqli_query($conn,$sql) or die(mysqli_error());
	}
?>
<html>
<head>
	<?php 
    include 'includes/header.php';
	?>
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
		<form id="contact-form" method="post" action="contact-us.php">
			<input name="name" type="text" class="form-control" placeholder="Your Name" required>
			<input name="email" type="email" class="form-control" placeholder="Your Email" required>
			<textarea name="message" class="form-control" placeholder="Message" row="4" required></textarea>
			<input type="submit" class="form-control submit" name="submit-message" value="SEND MESSAGE">
		</form>		
		</div>
	</div>
	<!-- <div class="contact-title">
			<h1>Say Hello</h1>
			<h2>We are always ready to serve you:</h2>
	</div>
	
	<div class="contact-form">
		
	</div> -->
</body>
</html>	