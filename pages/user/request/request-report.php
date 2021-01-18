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
$Request_ID = $_GET['Request_ID']
?>

<!-- Getting that request from the Identity Number -->
<?php 
 $sql = "SELECT * FROM user INNER JOIN request ON user.Identity_No = request.Identity_No WHERE Request_ID = $Request_ID";  
 $result = mysqli_query($conn, $sql);  
 $fetchRow = mysqli_fetch_assoc($result);
?> 
 
<!DOCTYPE html>
<html>
<head>
	<title>Request report</title>
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
        form
        {
            margin: auto;
        }
        *
        {
            box-sizing: border-box;
        }
        .rform 
        {
            padding: 10px;
            background-color: white;
            width: 50%;
            margin: auto;
            font-size: 20px;
            border-radius: 5px;
        }
        textarea:focus, input:focus
        {
            outline: none;
        }
        input:focus 
        {
            outline: none !important;
        }
        .rform input[type=text] 
        {
            width: 30%;
            padding: 12px;
            border-width:0px;
            border:none;
            outline:none;
            resize: vertical;
            background-color: white;
        }
        .ra
        {
            text-align: left;
            background-color: white;
        }
        .rform
        {
	         background-color: white;
        }
        .surat
        {
	         margin-left: 300px;
          margin-right: 300px;
          background-color: white;
        }
        .preview, .preview2
        {
          margin-left: 200px;
        }
</style>
</head>

<body style="background-color: #6E8A9E ">
<!--    <h2><?=$_SESSION["email"];?></h2><br><br> -->
<ul>
  <a href="../../../index.php"><img src="../../../img/logo.png"></a>
<div class="navRight">
  <li><a href="../health/form.php">HEALTH STATUS</a></li>
  <li ><a href="request-main.php">REQUEST</a></li>
  <li style="color: white;"><a href="request-status.php">STATUS</a></li>
  <li><a href="../profile/Profile.php">PROFILE</a></li>
  <li><a href="../homescreen/about-us.php">ABOUT US</a></li>
</div>
</ul>
<p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
<br>
<button onclick="window.print()">Print letter</button>
<div class="surat"><br>
	<img src="../../../img/polis.png" style="height: 200px; width: 200px; margin-left: auto; margin-right: auto; display: block;">
	<h2 style="text-align: center; font-size: 30px; font-family: times new roman;">Surat Kebenaran Rentas Negeri</h2><br>

<h2 style="text-align: center; font size: 25px; font-family: times new roman;">Maklumat Peribadi</h2><br>
  <div class="preview" style="font-size: 20px">
        

        <strong>NAMA: </strong><?php echo $fetchRow['Fullname'];?><br><br>
        <strong>NOMBOR KAD PENGENALAN: </strong><?php echo $fetchRow['Identity_No'];?></h3><br><br>
        <strong>ALAMAT: </strong><?php echo $fetchRow['Address'];?><br><br>
        <strong>NOMBOR TELEFON: </strong><?php echo $fetchRow['Phone_Number'];?><br><br>
        <strong>WARGANEGARA: </strong><?php echo $fetchRow['Nationality'];?></p>
        <strong>JENIS ID: </strong><?php echo $fetchRow['Identity_Type'];?></p>

  </div>
<br>

<h2 style="text-align: center; font size: 25px; font-family: times new roman;">Maklumat Permohonan</h2><br>
  <div class="preview2" style="font-size: 20px">

        <strong>NOMBOR KENDERAAN: </strong><?php echo $fetchRow['Vehicle_Req_No'];?><br><br>
        <strong>TARIKH BERTOLAK: </strong><?php echo $fetchRow['Departure_Date'];?></h3><br><br>
        <strong>TARIKH SAMPAI: </strong><?php echo $fetchRow['Arrival_Date'];?><br><br>
        <strong>TARIKH PERMOHONAN: </strong><?php echo $fetchRow['Request_Date'];?><br><br>
        <strong>SEBAB PERMOHONAN: </strong><?php echo $fetchRow['Reason'];?></p>
        <strong>STATUS: </strong><?php echo $fetchRow['Request_Status'];?></p><br>
  </div>
    
  </div>

</body>
</html>