<!DOCTYPE html>
<html>
<head>
	<title>Request form page</title>

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

        form{
          margin: auto;
        }
        *{
            box-sizing: border-box;
          }
          .rform {
            padding: 10px;
            background-color: white;
            width: 50%;
            margin: auto;
            font-size: 20px;
            border-radius: 5px;
          }
        .rform input[type=text] {
          width: 30%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          resize: vertical;
          background-color: white;
        }
        .ra
        {
          text-align: left;
          background-color: white;
        }
        .rform{
          background-color: white;
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
	<form method="post" action="addreq.php" enctype="multipart/form-data">
		<h1 style="text-align: center;">REQUEST FORM</h1><br>
		1. Vehicle Registration No.: <input type="text" name="Vehicle_Req_No" required>
  		<br><br>
    
  		
    2. Mode of Transport: <input type="text" name="Mode_Of_Transportation" required>
  		<br><br>
      
  
    3. Identity Number: <input type="text" name="Identity_No" required>
  		<br><br>
     
  4. Departure Date: <input type="Date" name="Departure_Date" required>
  		<br><br>
      
  
    5. Arrival Date: <input type="Date" name="Arrival_Date" required>
  		<br><br>

  		  6. Reason: <input type="text" name="Reason" required>
  		<br><br>

      7. Request Date: <input type="Date" name="Request_Date" required>
      <br><br>

      8. Form Id: <input type="text" name="Form_Id" required>
      <br><br>

      9. Staff_Id: <input type="text" name="Staff_Id" required>
      <br><br>

      <button onclick="alert('Your request will be processed soon!')"><input type="submit" value="submit" name="submit" ></button> 


     <!--  <br><br>  <input onclick="alert('Thank you for your submission. Your request will be processed soon.')" type="submit" value="submit" name="submit"><br><br> -->
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