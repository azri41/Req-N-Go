<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$username = $_SESSION['Fullname'];

$sql = "SELECT * FROM user WHERE Identity_No=(SELECT Identity_No FROM user WHERE Fullname='$username')";
if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $cust_id = $row['cust_id'];
            $cust_name = $row['cust_name'];
        }
        // Free result set
        mysqli_free_result($result);
    }
}

$query = "SELECT `Request_Id`, `Identity_No`, `Departure_Date`, 
        `Arrival_Date`, `Request_Date`, `Request_Status` FROM `request` WHERE Request_Status ='Pending' ";
$result = mysqli_query($conn, $query);
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
            <td>Identity No</td>
            <td>Departure Date</td>
            <td>Arrival Date</td>
            <td>Request Date</td>
            <td>Status</td>
        </tr>
        <tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<td>" . $row['Request_Id'] . "</td>";
                    echo "<td>" . $row['Identity_No'] . "</td>";
                    echo "<td>" . $row['Departure_Date'] . "</td>";
                    echo "<td>" . $row['Arrival_Date'] . "</td>";
                    echo "<td>" . $row['Request_Date'] . "</td>";
                    echo "<td>" . $row['Request_Status'] . "</td>";
                }
            } ?>
        </tr>
    </table>
</body>

</html>