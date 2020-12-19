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
        <h3>Login</h3>
    </div>
    <div class="login-form">
        <form method="post" action="login.php">
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
        </form>
    </div>
    <div id="login-button">
        <label id="label-login">Login</label>
    </div>

</body>

</html>