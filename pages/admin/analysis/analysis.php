<?php
    include "../../auth/auth_functions_inc.php";
	// Check if the user is logged in, if not then redirect him to login page
	session_prove();
	$email = $_SESSION['email'];
	$state = "";
	$Kelantan = $Kedah = $Melaka = $NS = $Pahang = $PP = $Perlis = $Perak = $Sabah = $Sarawak = $Selangor = $Terengganu = $KL = $Johor = $Put = $Lab= 0;


	$sql = "SELECT State FROM user WHERE Identity_No=(SELECT Identity_No FROM request WHERE Request_Status='Approved') ";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$state=$row["State"];

		if($state == "Kelantan"){
			$Kelantan++;
		}
		else if($state == "Kedah"){
			$Kedah++;
		}
		else if($state == "Melaka"){
			$Melaka++;
		}
		else if($state == "Negeri Sembilan"){
			$NS++;
		}
		else if($state == "Pahang"){
			$Pahang++;
		}
		else if($state == "Pulau Pinang"){
			$PP++;
		}
		else if($state == "Perak"){
			$Perak++;
		}
		else if($state == "Perlis"){
			$Perlis++;
		}
		else if($state == "Sabah"){
			$Sabah++;
		}
		else if($state == "Sarawak"){
			$Sarawak++;
		}
		else if($state == "Selangor"){
			$Selangor++;
		}
		else if($state == "Terengganu"){
			$Terengganu++;
		}
		else if($state == "Kuala Lumpur"){
			$KL++;
		}
		else if($state == "Putrajaya"){
			$Put++;
		}
		else if($state == "Labuan"){
			$Lab++;
		}
		else{
			$Johor++;
		}
	}

	$conn->close();
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Analysis</title>  
<script>
window.onload = function () {
	
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	
	title:{
		text:"Number of People Crossing State"
	},
	axisX:{
		interval: 1
	},
	axisY2:{
		interlacedColor: "rgba(1,77,101,.2)",
		gridColor: "rgba(1,77,101,.1)",

	},
	data: [{
		type: "bar",
		name: "people",
		axisYType: "secondary",
		color: "#014D65",
		dataPoints: [
			{ y: <?php echo $Johor ?>, label: "Johor" },
			{ y: <?php echo $Kelantan ?>, label: "Kelantan" },
			{ y: <?php echo $Kedah ?>, label: "Kedah" },
			{ y: <?php echo $Melaka ?>, label: "Melaka" },
			{ y: <?php echo $NS ?>, label: "Negeri Sembilan" },
			{ y: <?php echo $Pahang ?>, label: "Pahang" },
			{ y: <?php echo $PP ?>, label: "Pulau Pinang" },
			{ y: <?php echo $Perak ?>, label: "Perak" },
			{ y: <?php echo $Perlis ?>, label: "Perlis" },
			{ y: <?php echo $Sabah ?>, label: "Sabah" },
			{ y: <?php echo $Sarawak ?>, label: "Sarawak" },
			{ y: <?php echo $Selangor ?>, label: "Selangor" },
			{ y: <?php echo $Terengganu ?>, label: "Terengganu" },
			{ y: <?php echo $KL ?>, label: "Kuala Lumpur" },
			{ y: <?php echo $Put ?>, label: "Putrajaya" },
			{ y: <?php echo $Lab ?>, label: "Labuan" },
		]
	}]
});
chart.render();

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

		table 
		{
  			border-collapse: collapse;
  			width: 100%;
		}

		th, td 
		{
  			text-align: left;
  			padding: 8px;
		}

		tr:nth-child(even) 
		{
			background-color: #f2f2f2;
		}

		h1
		{
  			font-family: monospace;
  			font-size: 50px;
  			margin: 1px;
		}
</style> 
</head>
<body style="background-color: #6E8A9E ">
<ul>
    <a href="../AdminMain.php"><img src="../../../img/logo.png"></a>
        <div class="navRight">
            <li><a href="../AdminMain.php">HOME</a></li>
            <li><a href="../view/viewRequest.php">REQUEST</a></li>
            <li><a href="../history/ApproveHistory.php">HISTORY</a></li>
            <li><a style="color: white" href="analysis.php">ANALYSIS</a></li>
            <button><a href="../../auth/logout.php">Logout</a></button>
        </div>
    </ul>
    <p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
    <br>  
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>