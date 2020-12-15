<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: login.php");
    exit;
}

$username=$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head><link rel="icon" href="img/car.ico">
    <meta charset="UTF-8">
    <title>Req-N-Go</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
<a href="index.php">
        <img src="img/Logo.png" alt="logo">
    </a>
    <nav>
    <div class="wrapper">
        <ul>
            <li class="active"><a href="AdminMain.php">REQUEST</a></li>
            <li><a href="pages/admin/history/history-main.php">HISTORY</a></li>
            <li><a href="pages/admin/analysis/analysis.php">ANALYSIS</a></li>

            <button><a href="pages/auth/logout.php">Logout</a></button>
        </ul>
    </div>
    </nav>
</header>
    <table>
        <tr>
            <td>Request ID</td>
            <td>User ID</td>
            <td>Departure Date</td>
            <td>Arrival Date</td>
            <td>Request Date</td>
            <td>Status</td>
        </tr>
        <tr>
             <td><?php  ?></td>
        </tr>
    </table>
</body>
</html>