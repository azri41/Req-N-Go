<?php
    include "../../auth/auth_functions_inc.php";
	// Check if the user is logged in, if not then redirect him to login page
	session_prove();
	$email = $_SESSION['email']; //session start by using email
	$fetch_profile = "SELECT Fullname FROM admin WHERE Email = '$email'"; //select name by using session email

	$profile = mysqli_query($conn,$fetch_profile);
	$admin_profile = mysqli_fetch_assoc($profile);

	//declaring variables
	$state = ""; //string
	$Kelantan = $Kedah = $Melaka = $NS = $Pahang = $PP = $Perlis = $Perak = $Sabah = $Sarawak = $Selangor = $Terengganu = $KL = $Johor = $Put = $Lab= 0; //int


	$sql = "SELECT State FROM user WHERE Identity_No IN (SELECT Identity_No FROM request WHERE Request_Status='Approved') "; //select name of each state that request have been approved
	mysqli_query($conn, $sql) or die ("Bad Query: $sql"); //connect to database or end the connection
	$result = mysqli_query($conn, $sql);
	while($row = $result->fetch_assoc()) { //fetch all state that been selected
		$state=$row["State"];

		if($state == "Kelantan"){ //condition if variable value equal to the name of state 
			$Kelantan++; //increment number of user from each state
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

	$conn->close(); //close connection
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Analysis</title>  
<script>
//javascript to display a bar graph or chart
window.onload = function () {
	
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	
	title:{
		text:"Number of People Crossing State" //title of the graph
	},
	axisX:{
		interval: 1 //space between each value on the graph
	},
	axisY2:{
		interlacedColor: "rgba(1,77,101,.2)", //color of graph
		gridColor: "rgba(1,77,101,.1)",
		title: "Origin State"
	},
	data: [{
		type: "bar",
		name: "people", 
		axisYType: "secondary",
		color: "#014D65",
		dataPoints: [
			{ y: <?php echo $Johor ?>, label: "Johor" }, //label for each y value
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
chart.render(); //render the graph

}
</script>
<style>
/* css for this page */
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
		h1{
        	font-family: monospace;
        	margin: 1px;
        	font-size: 50px;
        	text-align: left;
        	margin-top: 10px;
        }
</style> 
</head>
<body style="background-color: #6E8A9E ">
<ul>
    <a href="analysis.php"><img src="../../../img/logo.png"></a>
        <div class="navRight">
            <li><a href="../view/viewRequest.php">REQUEST</a></li>
            <li><a href="../history/ApproveHistory.php">HISTORY</a></li>
            <li><a style="color: white" href="analysis.php">ANALYSIS</a></li>
            <li><a href="../../auth/logout.php">LOGOUT</a></li>
        </div>
    </ul>
    <p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
    <br>  
<body> <!-- Display admin name-->
	<div><h1>Welcome, <?php echo$admin_profile['Fullname']; ?> !</h1></div><br><br><br><br><br><br>
	<div id="chartContainer" style="height: 370px; width: 100%;">
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> <!-- Call the script function -->
	</div>
</body>
</html>