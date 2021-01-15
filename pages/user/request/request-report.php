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
$Request_ID = $_GET['Request_ID']
?>

<?php 
 $sql = "SELECT * FROM user INNER JOIN request ON user.Identity_No = request.Identity_No WHERE Request_ID = $Request_ID";  
 $result = mysqli_query($conn, $sql);  
 $fetchRow = mysqli_fetch_assoc($result);
?> 
 
<!DOCTYPE html>
<html>
<head>
	<title>Request report</title>
		<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  border: 1px solid #e7e7e7;
  background-color: #CFD3D6;
}

li {
  float: left;
}

li a {
  display: block;
  color: #666;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #ddd;
}
/*img {
  position: absolute;
  object-fit: scale-down;
}*/
/*li a.active {
  color: white;
  background-color: #4CAF50;
}*/
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
  textarea:focus, input:focus{
    outline: none;
}
  input:focus {
    outline: none !important;
}
.rform input[type=text] {
  width: 30%;
  padding: 12px;
  border-width:0px;
border:none;
outline:none;
 /* border: 0px none;
  outline: none;*/
  /*border: 1px solid #ccc;
  border-radius: 4px;*/
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
.surat{
	margin-left: 300px;
  margin-right: 300px;
  /*text-align: center;*/
  background-color: white;
}
.preview, .preview2{
  margin-left: 200px;
}

</style>
</head>
<body style="background-color: #5e80a1 ">
<ul>
<li><img src="Logo.png" alt="Logo.png" style="width:50px;height:50px; position: absolute;
  object-fit: scale-down; "></li>
<div class="navRight">
  <li><a href="#home">HEALTH STATUS</a></li>
  <li ><a href="#request">REQUEST</a></li>
  <li style="background-color: beige;"><a href="#status">STATUS</a></li>
  <li><a href="#profile">PROFILE</a></li>
  <li><a href="#about">ABOUT US</a></li>
</div>
</ul>
<p style="background-color: #394d60; color: #394d60; margin-top: 0px;">lol</p>
<br>

<div class="surat"><br>
	<img src="polis.png" style="height: 200px; width: 200px; margin-left: 270px;">
	<h2 style="text-align: center; font-size: 30px; font-family: times new roman;">Surat Kebenaran Rentas Negeri</h2><br>

<h2 style="text-align: center; font size: 25px; font-family: times new roman;">Maklumat Peribadi</h2><br>
  <div class="preview" style="font-size: 20px">
        

        <strong>NAME           :</strong>           <?php echo $fetchRow['Fullname'];?><br><br>
        <strong>IDENTITY NUMBER:      </strong><?php echo $fetchRow['Identity_No'];?></h3><br><br>
        <strong>ADDRESS        :      </strong><?php echo $fetchRow['Address'];?><br><br>
        <strong>PHONE NUMBER   :      </strong>RM<?php echo $fetchRow['Phone_Number'];?><br><br>
        <strong>NATIONALITY    :      </strong><?php echo $fetchRow['Nationality'];?></p>
        <strong>IDENTITY TYPE  :      </strong><?php echo $fetchRow['Identity_Type'];?></p>
        </div>
<br>
<h2 style="text-align: center; font size: 25px; font-family: times new roman;">Maklumat Permohonan</h2><br>
  <div class="preview2" style="font-size: 20px">

    <strong>VEHICLE NUMBER: </strong><?php echo $fetchRow['Vehicle_Req_No'];?><br><br>
        <strong>DEPARTURE DATE:      </strong><?php echo $fetchRow['Departure_Date'];?></h3><br><br>
        <strong>ARRIVAL DATE        :      </strong><?php echo $fetchRow['Arrival_Date'];?><br><br>
        <strong>REQUEST DATE   :      </strong><?php echo $fetchRow['Request_Date'];?><br><br>
        <strong>REASON    :      </strong><?php echo $fetchRow['Reason'];?></p>
        <strong>STATUS  :      </strong><?php echo $fetchRow['Request_Status'];?></p><br>
        </div>
    
  </div>

</body>
</html>