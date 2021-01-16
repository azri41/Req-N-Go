<!DOCTYPE html>
<html>
<head>
	<title>Request Status Page</title>
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
<body style="background-color: #6E8A9E ">
<ul>
	<a href="../../../index.php"><img src="../../../img/logo.png"></a>
<!-- <li><img src="Logo.png" alt="Logo.png" style="width:50px;height:50px;"></li> -->
<div class="navRight">
  <li><a href="../health/form.php">HEALTH STATUS</a></li>
  <li><a href="request-main.php">REQUEST</a></li>
  <li><a style="color: white" href="request-status.php">STATUS</a></li>
  <li><a href="../profile/Profile.php">PROFILE</a></li>
  <li><a href="../homescreen/about-us.php">ABOUT US</a></li>
</div>
</ul>
<p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
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
			<th>Mode of Transportation</th>
			<th>View letter</th>

		</tr>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "reqngo");
		if ($conn-> connect_error) 
		{
			die ("Connection failed: ". $conn-> connect_error);
		}

		$sql = "SELECT Request_ID, Identity_No, Vehicle_Req_No, Departure_Date, Arrival_Date, Reason, Request_Date, Request_Status, Mode_Of_Transportation FROM request";
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
				<td><?php echo $row['Mode_Of_Transportation'];?></td>
				<td><a href="request-report.php?Request_ID=<?php echo $row["Request_ID"]; ?>">Print</a></td>
				<?php

				echo "</tr>";

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