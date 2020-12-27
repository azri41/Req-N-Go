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
.surat{
	margin-left: 300px;
  margin-right: 300px;
  text-align: center;
  background-color: white;
}
img{

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
	<img src="polis.png" style="height: 200px; width: 200px;">
	<h2 style="text-align: center; font-size: 30px; font-family: times new roman;">Surat Kebenaran Rentas Negeri</h2>

	<form action="" method="post">
		<h2 style="text-align: center; font size: 25px; font-family: times new roman;">Maklumat Peribadi</h2><br>
		NAME: <input type="text" name="name" value="<?php echo $fetchRow['Fullname']  ?>" required><br>
		IDENTITY NUMBER: <input type="text" name="id" value="<?php echo $fetchRow['Identity_No']  ?>" required><br>
		ADDRESS: <input type="text" name="add" value="<?php echo $fetchRow['Address']  ?>" required><br>
		PHONE NUMBER: <input type="text" name="phone" value="<?php echo $fetchRow['Phone_Number']  ?>" required><br>
		NATIONALITY: <input type="text" name="nat" value="<?php echo $fetchRow['Nationality']  ?>" required><br>
		IDENTITY TYPE: <input type="text" name="idtype" value="<?php echo $fetchRow['Identity_Type']  ?>" required><br><br>

		<h2 style="text-align: center; font size: 25px; font-family: times new roman;">Maklumat Permohonan</h2><br>

	VEHICLE REGISTRATION NUMBER: <input type="text" name="title" value="<?php echo $fetchRow['Vehicle_Req_No']?>" required><br>
	DEPARTURE DATE: <input type="date" name="dep" value="<?php echo $fetchRow['Departure_Date']?>" required><br>
	ARRIVAL DATE: <input type="date" name="arr" value="<?php echo $fetchRow['Arrival_Date']?>" required><br>
	REQUEST DATE: <input type="date" name="re" value="<?php echo $fetchRow['Request_Date']?>" required><br>
	REASON: <input type="date" name="rea" value="<?php echo $fetchRow['Reason']?>" required><br>
	STATUS: <input type="text" name="status" value="<?php echo $fetchRow['Request_Status']?>" required><br>
	</form>
</div>

</body>
</html>