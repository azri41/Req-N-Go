<?php
// Initialize the session

include "../auth/auth_functions_inc.php";
// Check if the user is logged in, if not then redirect him to login page
session_prove();

$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="">
    <meta charset="UTF-8">
    <title>Req-N-Go</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
        ul{
            list-style-type: none;
            background-color: #CFD3D6;
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
<body style="background-color: #6E8A9E">
    <ul>
    <a href="AdminMain.php"><img src="../../img/logo.png"></a>
        <div class="navRight">
            <li><a style="color: white" href="AdminMain.php">HOME</a></li>
            <li><a href="view/viewRequest.php">REQUEST</a></li>
            <li><a href="history/ApproveHistory.php">HISTORY</a></li>
            <li><a href="analysis/analysis.php">ANALYSIS</a></li>
            <button><a href="../auth/logout.php">Logout</a></button>
        </div>
    </ul>
    <p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
    <br>               

<body>

    <div class="wrapper-form">
        <h2>Welcome , <?php echo $email ?> !</h2>
    </div><br><br><br><br><br><br>
    <div class="display">
        <p>This is Admin page</p>
</body>

</html>