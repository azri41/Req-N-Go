<?php
// Initialize the session
include "auth_functions_inc.php";
session_prove();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: ../../index.php");
exit;
?>