<?php
	$servername = "localhost";
	$username = "admin";
	$password = "123";
	$database = "reqngo";
	$conn = new mysqli($servername, $username, $password, $database);	//connect database

	if($conn ->connect_error){
		die("Connection failed: ". $conn->connect_error);	//die = exit , . utk joined
	}
	else{
	echo "<script>alert('Database connected successfully')</script>";
	}	
//require once file.php call file
?>
