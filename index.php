<?php

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
</head>

<body>
    <header>

        <a href="index.php">
            <img src="img/logo-invert.png" alt="logo">
        </a>

        <nav>
            <div class="header-input">
                <?php
                if (isset($_SESSION['usertype'])) {
                    echo '<button><a href="Logout.php">Logout</a></button>';
                } else {
                    echo '<button class="auth"><a href="Login.php">Login</a></button>
                        <button class="auth"><a href="RegisterCustomer.php">Register</a></button>';
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
                            header("location: UserMain.php");
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
        </div>

    </main>
</body>
<br><br><br><br>
<footer class="index">
    <p>Phone : 06-231 4133 </p>
    <p>Email : @gmail.com </p>
</footer>

</html>