<?php
require "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="img/car.ico">
    <meta charset="UTF-8">
    <meta name="decription" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Req-N-Go</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">

    <style>
        body {
            /* background: #1690a7; */
            background: url("img/wallpaper2.jfif");
            background-repeat: no-repeat;
            background-size: auto;

            /* align-items: center; */
            height: 100vh;
            /* flex-direction: column; */
        }
    </style>
</head>

<body>
    <header>

        <a href="index.php">
            <img id="logo_index" src="img/logo-invert.png" alt="logo">
        </a>


        <nav>
            <div class="header-input">
                <?php
                if (isset($_SESSION['usertype'])) {
                    echo '<button><a href="pages/auth/login.php">Logout</a></button>';
                } else {
                    echo '<button class="auth"><a href="pages/auth/login.php">Login</a></button>
                        <button class="auth"><a href="pages/auth/register.php">Register</a></button>';
                }

                ?>
            </div>
        </nav>

    </header>


    <main>
        <div class="wrapper-main">
            <section class="section-default">
                <?php
                if (isset($_SESSION['usertype'])) {
                    echo '<p class="login-status">You are logged in!</p>';

                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                        if ($_SESSION["usertype"] === 'Customer') {
                            header("location:pages/homescreen/about-us.php.php");
                            exit;
                        } elseif ($_SESSION["usertype"] === 'Admin') {
                            header("location: AdminMain.php");
                            exit;
                        }
                    }
                } else {
                    echo '<p class="login-status">You are logged out!</p>';
                }
                ?>
            </section>
        </div>
        <div>
            <h1 id="welcome">WELCOME</h1>
            <h2 id="description">Req N Go is a website that</h2>
            <h2 id="description"> help you to apply for</h2>
            <h2 id="description"> crossing the state easily.</h2>
        </div>
        <side>
            <img id="malaysia" src="img/malaysia.png">
        </side>

    </main>
</body>


</html>