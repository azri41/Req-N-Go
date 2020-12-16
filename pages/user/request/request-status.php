<!DOCTYPE html>
<html>
<head>
	<title>Request Status Page</title>
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
img {
  position: absolute;
  object-fit: scale-down;
}
/*li a.active {
  color: white;
  background-color: #4CAF50;
}*/
.navRight {
  float: right;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
		h1{
  font-family: monospace;
  font-size: 50px;
  margin: 1px;
}
</style>
</head>
<body style="background-color: #5e80a1 ">
<ul>
<li><img src="Logo.png" alt="Logo.png" style="width:50px;height:50px;"></li>
<div class="navRight">
  <li><a href="#home">HEALTH STATUS</a></li>
  <li><a href="#request">REQUEST</a></li>
  <li><a href="#status">STATUS</a></li>
  <li><a href="#profile">PROFILE</a></li>
  <li><a href="#about">ABOUT US</a></li>
</div>
</ul>
<p style="background-color: #394d60; color: #394d60; margin-top: 0px;">lol</p>
<br>
<h1 style="text-align: center; font-family: helevatica; font-size: 40px;">REQUEST STATUS</h1><br>
<table>
		<tr>
			<th>Request ID</th>
			<th>Identity No</th>
			<th>Vehicle No</th>
			<th>Departure Date</th>
			<th>Arrival Date</th>
			<th>Reason</th>
			<th>Request Date</th>
			<th>Status</th>
			<th>Form ID</th>
			<th>Staff ID</th>
			<th>Mode of Transportation</th>

		</tr>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "reqngo");
		if ($conn-> connect_error) 
		{
			die ("Connection failed: ". $conn-> connect_error);
		}

		$sql = "SELECT Request_ID, Identity_No, Vehicle_Req_No, Departure_Date, Arrival_Date, Reason, Request_Date, Request_Status, Form_ID, Staff_ID, Mode_Of_Transportation FROM request";
		$result = $conn-> query($sql);

		if ($result-> num_rows > 0)
		{
			while ($row = mysqli_fetch_assoc($result))
			{
				?>
				<td><?php echo $row['Request_ID'];?></td>
				<td><?php echo $row['Identity_No'];?></td>
				<td><?php echo $row['Vehicle_Req_No'];?></td>
				<td><?php echo $row['Departure_Date'];?></td>
				<td><?php echo $row['Arrival_Date'];?></td>
				<td><?php echo $row['Reason'];?></td>
				<td><?php echo $row['Request_Date'];?></td>
				<td><?php echo $row['Request_Status'];?></td>
				<td><?php echo $row['Form_ID'];?></td>
				<td><?php echo $row['Staff_ID'];?></td>
				<td><?php echo $row['Mode_Of_Transportation'];?></td>
				<?php
				//echo "<td><a href = 'delete.php?id=".$row['bookID']."' >Delete</a></td>";

				echo "</tr>";

				// echo "<td><a href = 'update.php?=" .$row['bookID']."'>Update</a></td>";
			}
			echo "</table>";
		}
		else
		{
			echo "0 result";
		}
		$conn-> close();

		?>
	</table>


	</table>
</body>
</html>