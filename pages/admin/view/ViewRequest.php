<!DOCTYPE html>
<html>
<head>
	<title>View Request Details</title>
    <link rel="stylesheet" type="text/css" href="">

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
            <li><a style="color: white" href="viewRequest.php">REQUEST</a></li>
            <li><a href="../history/ApproveHistory.php">HISTORY</a></li>
            <li><a href="../analysis/analysis.php">ANALYSIS</a></li>
            <button><a href="../../auth/logout.php">Logout</a></button>
        </div>
    </ul>
    <p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
    <br>     
<body>
        <form class="searchbar" method="post">
            <table class="searchcontainer">
                <tr class="searchcontainer">
                    <th class="searchcontainerrequest"><h2>Request</h2></th>
                    <th class="searchcontainer"><input type="text" name="searchvalue" placeholder="Search Request ID"></th>
                    <th class="searchcontainer"><input type="submit" name="search" value="Search"></th>
                    <th class="searchcontainer"><input type="submit" name="showall" value="Show All"></th>
                </tr>
            </table>
            
        </form>
        <table>
        <form class="border" name="updateStatus" method="post">
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
                <th class="col">Action</th>
            </tr>
<?php 
include "../../auth/auth_functions_inc.php";
// Check if the user is logged in, if not then redirect him to login page
session_prove();
$reqId = $status = "";
$email = $_SESSION['email'];


if(isset($_POST["search"])){
    $search =$_POST["searchvalue"];

    $sql = "SELECT * FROM request WHERE Request_Id='".$search."'";
    $result = $conn->query($sql);

}else if(isset($_POST["showall"])){
    $sql = "SELECT * FROM request";
    $result = $conn->query($sql);
}else{
    $sql = "SELECT * FROM request";
    $result = $conn->query($sql);
}
while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><a class="button" href="view-detail.php?reqId=<?php echo $row["Request_Id"]; ?>"><?php echo $row["Request_Id"]; ?></a></td>
        <td><?php echo $row["Identity_No"]; ?> </td>
        <td><?php echo $row["Vehicle_Req_No"]; ?></td>
        <td><a class="button" href="view-form.php?formId=<?php echo $row["Form_Id"]; ?>"><?php echo $row["Form_Id"]; ?></a></td>
        <td><?php echo $row["Request_Date"]; ?></td>
        <td><?php echo $row["Departure_Date"]; ?></td>
        <td><?php echo $row["Arrival_Date"]; ?></td>
        <td><?php echo $row["Mode_Of_Transportation"]; ?></td>
        <td><?php echo $row["Reason"]; ?></td>
        <td><?php echo $row["Request_Status"]; ?></td>
        <td><?php if($row["Request_Status"] == 'Pending' ){?>
            <a class='button' href='ViewRequest.php?reqId=<?php echo $row["Request_Id"] ?>&status=<?php echo 'Approved'?>'>Approved</a>
            <a name='reject' class='button' href='ViewRequest.php?reqId=<?php echo $row['Request_Id'] ?>&status=<?php echo 'Rejected'?>'>Rejected</a>
            <?php }else{
                echo "<span>&#10003;</span>";
            }
        echo "</td>";
    echo "</tr>";
}
echo "</form> </table>";


function filterTable($query1){
    

}

if(isset($_GET["reqId"])){
    $reqId = $_GET["reqId"];
    $status = $_GET["status"];
    $sql = "UPDATE request SET Request_Status = '$status' WHERE Request_Id='$reqId' ";
    mysqli_query($conn, $sql) or die ("Bad Query: $sql");
    echo "<script>alert('Status updated.');window.location.href='ViewRequest.php';</script>";
    // $result = $conn->query($sql);
}


$conn->close();
?>
            

</body>
</html>