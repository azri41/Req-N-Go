<?php
require "../../config.php";
include "../auth/auth_functions_inc.php";
session_prove();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="image/Logo.ico">
    <meta charset="UTF-8">
    <meta name="decription" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Req-N-Go</title>
    <link rel="stylesheet" type="text/css" href="../../style/auth_style.css">

    <script>
        function validateForm() {
            var x = document.forms["loginForm"]["staff_email"].value;
            var y = document.forms["loginForm"]["staff_pwd"].value;
            if (x == "" && y == "") {
                alert("All fields must be filled out");
                return false;
            }
            if (x == "") {
                alert("Email must be filled out");
                return false;
            }
            if (y == "") {
                alert("Password must be filled out");
                return false;
            }
        }
    </script>
</head>

<body>
    <a href="../../index.php"><img id="logo_login" src="../../img/logo.png"></a>
    <div id="rectangle">


        <br><br><br>
        <h1 id="welcome">WELCOME</h1>
        <h2 id="description">Req N Go is a website that</h2>
        <h2 id="description"> help you to apply for</h2>
        <h2 id="description"> crossing the state easily.</h2>
    </div>

    <div id="login">
        <h3>Admin Login</h3>
    </div>
    <div class="login-form">
        <form name="loginForm" method="post" action="login_admin.php" onsubmit="return validateForm()">
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="staff_email">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="staff_pwd">
            </div>
            <input id="login-button" name="staff-login" type="submit" value="Login">
        </form>
    </div>
    <!-- <div id="login-button">
        <label id="label-login">Login</label>
    </div> -->

</body>

</html>