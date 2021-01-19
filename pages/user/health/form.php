<?php
include "../../auth/auth_functions_inc.php";
session_prove();

$email = $_SESSION['email'];
$query = "SELECT Identity_No FROM user WHERE email='$email'";
$fetch=mysqli_query($conn,$query);
//to carry identity no from previous page
while ($row = mysqli_fetch_array($fetch))
{
    $id = $row['Identity_No'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Health Status Form</title>
	<link rel="stylesheet" type="text/css" href="../../../style/style.css">

     <script type="text/javascript">
     //to make sure all the input from user are accurate
     function myConfirm(){
          var answer = window.confirm("Please ensure all details are accurate before submitting");
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
            <li><a style="color: white" href="form.php">HEALTH STATUS</a></li>
            <li><a href="../request/request-main.php">REQUEST</a></li>
            <li><a href="../request/request-status.php">STATUS</a></li>
            <li><a href="../profile/Profile.php">PROFILE</a></li>
            <li><a href="../homescreen/about-us.php">ABOUT US</a></li>
        </div>
    </ul>
    <p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
    <br>               
     <form class="healthform" action="form-check.php" method="post">
     	<h2>Health Status Form</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
               //all the question and the readiobox are in the table
               //to easy manage the position
          <label>1. Have you been to see any area or countries of COVID-19 as indicated by WHO over the past 14 days?</label><br><br>
               <table class="center">
                    <tr>
                         <th>Choice</th>
                         <th>Input</th>
                    </tr>
                    <tr>
                         <td>Yes</td>
                         <td><input type="radio" id="Yes" name="area" value="Yes"></td>
                    </tr>
                    <tr>
                         <td>No</td>
                         <td><input type="radio" id="No" name="area" value="No"></td>
                    </tr>
               </table>
          <br>
          <label>2. Have you had any of the following sysmtoms over the past 14 days? Please tick if yes</label><br>
               <br>
               <table class="center"> 
                    <tr>
                         <th>Symptoms</th>
                         <th>Input</th>
                    </tr>
                    <tr>
                         <td>Fever</td>
                         <td><input type="checkbox" id="Fever" name="fever" value="Yes"></td>
                    </tr>
                    <tr>
                         <td>Difficulty in breathing</td>
                         <td><input type="checkbox" id="Breath" name="breath" value="Yes"></td>
                    </tr>
                    <tr>
                         <td>Cough</td>
                         <td><input type="checkbox" id="Cough" name="cough" value="Yes"></td>
                    </tr>
                    <tr>
                         <td>Sore throat</td>
                         <td><input type="checkbox" id="Throat" name="throat" value="Yes"></td>
                    </tr>
               </table>
               <br>
               <label>Other symptoms (please specify)</label>
               <input type="text" name="symtoms" placeholder="Other symptoms"><br>
          
               <label>3. Have you been in close contact with person suspected to have COVID-19?</label><br><br>
               <table class="center">
                    <tr>
                         <th>Choice</th>
                         <th>Input</th>
                    </tr>
                    <tr>
                         <td>Yes</td>
                         <td><input type="radio" id="Yes" name="contact" value="Yes"></td>
                    </tr>
                    <tr>
                         <td>No</td>
                         <td><input type="radio" id="No" name="contact" value="No"></td>
                    </tr>
               </table><br>

               <label>If the answer is yes to either of the question above, please report to the Health Screening Area.</label>
               <br><br><br>
               <h3>Definition close contact:</h3>
               <h4>- Health care associated exposure, include providing direct care for COVID-19 patients, working with health care workers infected with COVID-19, visiting patients or staying in the same close environment of a COVID-19 patient.</h4>
               <h4>- Working together in close proximity or sharing same classroom environment with a COVID-19 patient.</h4>
               <h4>- Traveling together with COVID-19 patient in any kind of conveyance</h4>
               <h4>- Living in the same household as a COVID-19 patient</h4>

     	<button class="button" type="submit" onClick="myConfirm()">Submit</button>
     </form>
     <br>
     <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger
    intent="WELCOME"
    chat-title="Borderz"
    agent-id="3784ef82-a873-40d8-aaa3-3a0a07de9806"
    language-code="en"
    ></df-messenger>
</body>
</html>
