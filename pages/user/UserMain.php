<?php
// require "../../header.php";
 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
// {
//     header("location: login.php");
//     exit;
// }

// $username=$_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head><link rel="icon" href="img/car.ico">
    <meta charset="UTF-8">
    <title>Req-N-Go</title>
    <style>
        ul{
            list-style-type: none;
            margin: 0;
        }
        li{
            margin-top: 20px;
            float: left;
        }
        li a{
            font-family: open sans;
            font-size: 24px;
            font-weight: 600;         
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li a:hover:not(.active){
            color: white;
        }
        .navRight {
            float: right;
        }
    </style>
</head>
<body style="background-color: #CFD3D6;">
    <ul>
        <img src="../../img/Logo.png" alt="Logo.png">
        <div class="navRight">
            <li><a href="#home">HEALTH STATUS</a></li>
            <li><a href="#request">REQUEST</a></li>
            <li><a href="#status">STATUS</a></li>
            <li><a href="#profile">PROFILE</a></li>
            <li><a href="homescreen/about-us.php">ABOUT US</a></li>
        </div>
    </ul>
    <br>
    <br><br><br>
    <div class="wrapper-form">
    <!-- <h2>Welcome , <?php //echo $cust_name ?> !</h2><br> -->
    <h2>This is User Main page</h2>
    </div>

    <footer>
    <p>Phone : 06-231 4133 </p>
    <p>Email : carrental@gmail.com </p>
    </footer>
</body>
</html>

