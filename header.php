<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head><link rel="icon" href="img/car.ico"> 
    <meta charset="UTF-8">
    <meta name="decription" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Req-N-Go</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
    <header>

        <a href="index.php">
            <img src="img/Logo.png" alt="logo">
        </a>
           
        <nav>
            <ul class="index">
             <li><a href="pages/user/health/health-status.php">HEALTH STATUS</a></li>
             <li><a href="pages/user/request/request-main.php">REQUEST</a></li>
             <li><a href="pages/user/request/request-status.php">REQUEST STATUS</a></li>
             <li><a href="pages/user/profile/profile.php">PROFILE</a></li>
             <li><a href="pages/user/homescreen/about-us.php">ABOUT US</a></li>
            </ul>
            <div class="header-input">
                <?php
                    if(isset($_SESSION['usertype'])){
                        echo '<button><a href="Logout.php">Logout</a></button>';
                    }
                    else{
                        echo '<button><a href="Login.php">Login</a></button>
                        <button><a href="RegisterCustomer.php">Register</a></button>';
                    }

                ?>   
            </div>
        </nav>

    </header>
 
</body>
</html>