<?php 
	include 'config.php';

	$visitor_name=$_POST['name'];
	$visitor_email=$_POST['email'];
	$visitor_message=$_POST['message'];

	$sql="INSERT INTO visitors VALUES(0,'$visitor_name','$visitor_email','$visitor_message')";
	$result = mysqli_query($conn,$sql) or die(mysqli_error());
	header("location:contact-us.html")
?>