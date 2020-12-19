<?php
require "../../config.php";
session_start();
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
</head>

<body>
    <img id="logo_login" src="../../img/logo.png">
    <div id="rectangle">
        <h2 id="home">Home</h2>
        <h1 id="welcome">WELCOME</h1>
        <h2 id="description">Req N Go is a website that</h2>
        <h2 id="description"> help you to apply for</h2>
        <h2 id="description"> crossing the state easily.</h2>
    </div>

    </div>
    <div id="login">
        <h3>Register</h3>
    </div>
    <div class="register-form">
        <form method="post" action="register.php">
            <div class="fullname">
                <label>Full Name</label>
                <input type="text" name="fullname">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email">
            </div>
            <div class="input-group">
                <label>Phone No.</label>
                <input type="text" name="phone">
            </div>
            <div class="input-group">
                <label>IC/Passport No.</label>
                <input type="text" name="ic">
            </div>
            <div class="input-group">
                <label>State</label>
                <input type="text" name="state">
            </div>
            <div class="input-group">
                <label>Area</label>
                <input type="text" name="area">
            </div>
            <div class="input-group">
                <label>Postal Code</label>
                <input type="text" name="postal">
            </div>
            <div class="input-group">
                <label>Detailed Address</label>
                <input type="text" name="address">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <label>Retype Password</label>
                <input type="password" name=re-password>
            </div>
        </form>
    </div>
    <div id="login-button">
        <label id="label-login">Login</label>
    </div>

</body>

</html>