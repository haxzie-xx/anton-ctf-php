<?php 
	$visitor_name=$_POST['name'];
	$visitor_email=$_POST['email'];
	$visitor_message=$_POST['message'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "anton";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);
	// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	} 
	$sql="INSERT INTO visitors VALUES(0,'$visitor_name','$visitor_email','$visitor_message')";
	$result = mysqli_query($conn,$sql) or die(mysqli_error());
	header("location:contact-us.html")
?>