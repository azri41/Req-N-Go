<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "reqngo";
 
$conn = mysqli_connect('localhost', 'root', '', 'reqngo');
if(!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}
 
?>
<?php 
 $sql = "SELECT * FROM user INNER JOIN request ON user.Identity_No = request.Identity_No";  
 $result = mysqli_query($conn, $sql);  
 $fetchRow = mysqli_fetch_assoc($result);
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Request form page</title>
  <link rel="stylesheet" type="text/css" href="../../../style/style.css">
  <script type="text/javascript">
     function myConfirm(){
          var answer = window.confirm("Thank you for your submission. We will process your letter soon.");
     }
     </script>

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
<a href="../../../index.php"><img src="../../../img/logo.png"></a>
<div class="navRight">
  <li><a href="../health/form.php">HEALTH STATUS</a></li>
  <li><a style="color: white" href="request-main.php">REQUEST</a></li>
  <li><a href="request-status.php">STATUS</a></li>
  <li><a href="../profile/Profile.php">PROFILE</a></li>
  <li><a href="../homescreen/about-us.php">ABOUT US</a></li>
</div>
</ul>
<p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
<br>

<div class="rform">

	<form method="post" action="addreq.php" >
    <h1 style="text-align: center; color: black;">REQUEST FORM</h1><br>
		
		1. Vehicle Registration No.: <input type="text" name="Vehicle_Req_No" required>
  		
    2. Mode of Transport: <input type="text" name="Mode_Of_Transportation" required>
    
  	 
    3. Identity Number: <?php echo $fetchRow['Identity_No'];?><br><br><br>
     
    4. Departure Date: <input type="Date" name="Departure_Date" required>	      
  
    5. Arrival Date: <input type="Date" name="Arrival_Date" required>
  	
  	6. Reason: <input type="text" name="Reason" required>

    7. FormID: <input type="text" name="Form_Id" required>

    8. StaffID: <input type="text" name="Staff_Id" required="">
     
     <button class="button" type="submit" onClick="myConfirm()">Submit</button>
</form>
</div>
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger
    intent="WELCOME"
    chat-title="Borderz"
    agent-id="3784ef82-a873-40d8-aaa3-3a0a07de9806"
    language-code="en"
    ></df-messenger>
</body>
</html>