<html>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "reqngo";
$conn = new mysqli($servername, $username, $password, $database);	//connect database

if ($conn->connect_error) {

	echo "<script type='text/javascript'>toastr.error('Database Collapsed!')</script>";
	echo "<script type='text/javascript'>toastr.options.positionClass = 'toast-bottom-right '</script>";
	die("Connection failed: " . $conn->connect_error);	//die = exit , . utk joined
} else {
	echo "<script type='text/javascript'>toastr.options.positionClass = 'toast-bottom-right '</script>";
	echo "<script type='text/javascript'>toastr.success('Database Connected!')</script>";
}	
//require once file.php call file
