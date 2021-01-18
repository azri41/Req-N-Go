<!-- Database Connection -->
<?php 
include "../../auth/auth_functions_inc.php";
session_prove();

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

<!-- To get Identity number and form Id so user cannot edit in form -->
<?php 
        $email = $_SESSION['email'];
        $query = "SELECT Identity_No FROM user WHERE email='$email'";
        $fetch=mysqli_query($conn,$query);
        while ($row = mysqli_fetch_array($fetch))
        {
            $id = $row['Identity_No'];
        }
?> 

<?php 
 $mysql = "SELECT * FROM health INNER JOIN request ON health.Form_Id = request.Form_Id";  
 $results = mysqli_query($conn, $mysql);  
 $fetchRows = mysqli_fetch_assoc($results);
?> 


<!DOCTYPE html>
<html>
<head>
	<title>Request form page</title>
  <link rel="stylesheet" type="text/css" href="../../../style/style.css">

 <!--  When user clicks button submit form -->
  <script type="text/javascript">
     function myConfirm()
     {
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
 <h2><?=$_SESSION["email"];?></h2><br><br>
<div class="rform">

	<form method="post" action="addreq.php">
    <h1 style="text-align: center; color: black;">REQUEST FORM</h1><br>
		
		1. Vehicle Registration No.:<input type="text" name="Vehicle_Req_No" required>
  		
    2. Mode of Transport:<input type="text" name="Mode_Of_Transportation" required>
    
  	 
    3. Identity Number:<?php echo $id;?><br><br><br>
     
    4. Departure Date: <input type="Date" name="Departure_Date" required>	      
  
    5. Arrival Date: <input type="Date" name="Arrival_Date" required>
  	
  	6. Reason: <input type="text" name="Reason" required>

    7. FormID: <br><?php echo $fetchRows['Form_Id'];?><br><br><br>
     
     <button class="button" type="submit" onClick="myConfirm()">Submit</button>
</form>
</div>

<!-- chatbot -->
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger
    intent="WELCOME"
    chat-title="Borderz"
    agent-id="3784ef82-a873-40d8-aaa3-3a0a07de9806"
    language-code="en"
    ></df-messenger>
</body>
</html>