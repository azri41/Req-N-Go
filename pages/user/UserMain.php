<?php
require "header.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: login.php");
    exit;
}

$username=$_SESSION['username'];

?>

    <div class="wrapper-form">
    <h2>Welcome , <?php echo $cust_name ?> !</h2><br>
    </div>
    <img src="img/hot.png" style=" width:15%; height:15%;"><br>
    <div class="hot-picks">
    <?php 
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                $car_id=$row['car_id'];
                
                $sql="SELECT * FROM car WHERE car_id='$car_id'";
                $result2 = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_assoc($result2);
                echo '<table><tr>';
                echo '<br><img style="width : 30%; height:30%;" src="data:image/jpeg;base64,'.base64_encode($row2['image']).'">' ;
                echo "<td>".$row2['model']."</td>";
                echo "<td>".$row2['transmission']."</td>";
                echo "<td>"."Rate/Hour : RM ".$row2['rate_hour']."</td>";
                echo '</table></tr>' ;
            }	
        } ?>
    </div><br><br><br><br>
    <footer>
    <p>Phone : 06-231 4133 </p>
    <p>Email : carrental@gmail.com </p>
    </footer>
</body>
</html>

