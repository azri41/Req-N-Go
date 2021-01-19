<!DOCTYPE html>
<html>
<head>
	<title>View Approved History</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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

		h2
		{
  			font-family: monospace;
  			font-size: 40px;
  			margin: 1px;
		}
        .searchButton{
            margin-top: 20px;
            float: right;
        }
</style>  
</head>
<body style="background-color: #6E8A9E ">
<ul>
    <a href="../AdminMain.php"><img src="../../../img/logo.png"></a>
        <div class="navRight">
            <li><a href="../view/viewRequest.php">REQUEST</a></li>
            <li><a style="color: white" href="ApproveHistory.php">HISTORY</a></li>
            <li><a href="../analysis/analysis.php">ANALYSIS</a></li>
            <li><a href="../../auth/logout.php">LOGOUT</a></li>
        </div>
    </ul>
    <p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
    <br>  
<body>
        <form class="searchbar" method="post">
            <table class="searchcontainer">
                <tr class="searchcontainer">
                    <th class="searchcontainerrequest"><h2>Approved History</h2></th>
                    <th class="searchButton"><input type="submit" name="showall" value="Show All"></th>
                    <th class="searchButton"><input type="submit" name="search" value="Search"></th>
                    <th class="searchButton"><input type="text" name="searchvalue" placeholder="Search Request ID"></th>
                </tr>
            </table>
            
        </form>
        <table class="border">
            <tr class="col">
                <th class="col">Request ID</th>
                <th class="col">Identity No</th>
                <th class="col">Plate No</th>
                <th class="col">Form Id</th>
                <th class="col">Request Date</th>
                <th class="col">Departure Date</th>
                <th class="col">Arrival Date</th>
                <th class="col">Transportation Mode</th>
                <th class="col">Reason</th>
                <th class="col">Request Status</th>
            </tr>
<?php 
include "../../auth/auth_functions_inc.php";
// Check if the user is logged in, if not then redirect him to login page
session_prove();
$reqId = $status = "";
$email = $_SESSION['email'];

$email = $_SESSION['email'];

if(isset($_POST["search"])){
    $search =$_POST["searchvalue"];

    $sql = "SELECT * FROM request WHERE Request_Status='Approved' AND Request_Id='".$search."'";
    $result = $conn->query($sql);

}else if(isset($_POST["showall"])){
    $sql = "SELECT * FROM request WHERE Request_Status='Approved' or 'approved'";
    $result = $conn->query($sql);
}else{
    $sql = "SELECT * FROM request WHERE Request_Status='Approved'";
    $result = $conn->query($sql);
}
while($row = $result->fetch_assoc()) { ; ?>
        <td><a class="button" href="../view/view-detail.php?reqId=<?php echo $row["Request_Id"]; ?>"><?php echo $row["Request_Id"]; ?></a></td>
        <td><?php echo $row["Identity_No"]; ?> </td>
        <td><?php echo $row["Vehicle_Req_No"]; ?></td>
        <td><?php echo $row["Form_Id"]; ?></td>
        <td><?php echo $row["Request_Date"]; ?></td>
        <td><?php echo $row["Departure_Date"]; ?></td>
        <td><?php echo $row["Arrival_Date"]; ?></td>
        <td><?php echo $row["Mode_Of_Transportation"]; ?></td>
        <td><?php echo $row["Reason"]; ?></td>
        <td><?php echo $row["Request_Status"]; ?></td>
<?php }
echo "</table>";


function filterTable($query1){
    
}

$conn->close();
?>
            

</body>
</html>