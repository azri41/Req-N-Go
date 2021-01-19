<?php
include "../../auth/auth_functions_inc.php";
session_prove();
?>

<!-- Database Connection -->
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

<!-- get the request ID so the report will display only that request -->
<?php
$Form_ID = $_GET['formId']
?>

<!-- Getting that request from the Identity Number -->
<?php 
 $sql = "SELECT * FROM health WHERE Form_Id = $Form_ID";  
 $result = mysqli_query($conn, $sql);  
 $fetchRow = mysqli_fetch_assoc($result);
?> 
 
<!DOCTYPE html>
<html>
<head>
	<title>Request Report</title>
  <link rel="stylesheet" type="text/css" href="../../../style/style.css">
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
        *
        {
            box-sizing: border-box;
        }



        .preview, .preview2
        {
          margin-left: 200px;
        }
        .printbutton{
          margin-right: 90px;
        }
</style>
</head>

<body style="background-color: #6E8A9E ">
<ul>
    <a href="../analysis/analysis.php"><img src="../../../img/logo.png"></a>
        <div class="navRight">
            <li><a href="viewRequest.php">REQUEST</a></li>
            <li><a href="../history/ApproveHistory.php">HISTORY</a></li>
            <li><a href="../analysis/analysis.php">ANALYSIS</a></li>
            <li><a href="../../auth/logout.php">LOGOUT</a></li>
        </div>
    </ul>
    <p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
    <br> 

<br>

<form action="form-check.php" method="post">
     	<h2>Health Status Details</h2>
          <p>Form ID: <?php echo $fetchRow["Form_Id"];?></p>
          <label>1. Have you been to see any area or countries of COVID-19 as indicated by WHO over the past 14 days?</label><br><br>
               <table class="center">
                    <tr>
                         <th>Answer</th>
                    </tr>
                    <tr>
                         <td><?php echo $fetchRow["IsRed_Area"]; ?></td>
                    </tr>
               </table>
          <br><br>
          <label>2. Have you had any of the following symptoms over the past 14 days?</label><br>
               <br>
               <table class="center"> 
                    <tr>
                         <th>Symptoms</th>
                    </tr>
                    <tr>
                         <td>Fever</td>
                         <td><?php echo $fetchRow["IsFever"]; ?></td>
                    </tr>
                    <tr>
                         <td>Difficulty in breathing</td>
                         <td><?php echo $fetchRow["IsDifficult_Breath"]; ?></td>
                    </tr>
                    <tr>
                         <td>Cough</td>
                         <td><?php echo $fetchRow["IsCough"]; ?></td>
                    </tr>
                    <tr>
                         <td>Sore throat</td>
                         <td><?php echo $fetchRow["IsSore_Throat"]; ?></td>
                    </tr>
               </table>
               <br><br>
               <label>Other symptoms : </label>
               <td><strong><?php echo $fetchRow["OtherSymptoms"]; ?></strong></td>
                <br><br><br><br>  
               <label>3. Have you been in close contact with person suspected to have COVID-19?</label><br><br>
               <table class="center">
                    <tr>
                         <th>Answer</th>
                    </tr>
                    <tr>
                        <td><?php echo $fetchRow["CloseContact"]; ?></td>
                    </tr>
               </table>          <br><br>
               <label>4. Verdict</label><br><br>
               <table class="center">
                    <tr>
                         <th>Health Status</th>
                    </tr>
                    <tr>
                        <td><?php echo $fetchRow["Health_Status"]; ?></td>
                    </tr>
               </table>

     </form>
    
  <div class="printbutton">
  <button onclick="window.print()">Print</button>
  </div>
  <br><br><br>   

</body>
</html>