<?php
// Initialize the session
session_start();
include "../auth/auth_functions_inc.php";
// Check if the user is logged in, if not then redirect him to login page
session_prove();

$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="img/car.ico">
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
                    <li class="active"><a href="pages/admin/AdminMain.php">HOME</a></li>
                    <li class="active"><a href="pages/admin/view/view-request.php">REQUEST</a></li>
                    <li><a href="pages/admin/history/history-main.php">HISTORY</a></li>
                    <li><a href="pages/admin/analysis/analysis.php">ANALYSIS</a></li>

                    <button><a href="pages/auth/logout.php">Logout</a></button>
                </ul>
            </div>
        </nav>
    </header>

    <div class="wrapper-form">
        <h2>Welcome , <?php echo $username ?> !</h2>
    </div><br><br><br><br><br><br>
    <div class="display">
        <p>This is Admin page</p>
        <footer>
            <p>Phone : 06-231 4133 </p>
            <p>Email : reqngo@gmail.com </p>
        </footer>
</body>

</html>