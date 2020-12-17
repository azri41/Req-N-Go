<!DOCTYPE html>
<html>
<head>
	<title>View Request Details</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
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
        <table class="border">
            <tr class="col">
                <th class="col">Request ID</th>
                <th class="col">Identity No</th>
                <th class="col">Plate No</th>
                <th class="col">Form Id</th>
                <th class="col">Staff Id</th>
                <th class="col">Request Date</th>
                <th class="col">Departure Date</th>
                <th class="col">Arrival Date</th>
                <th class="col">Transportation Mode</th>
                <th class="col">Reason</th>
                <th class="col">Request Status</th>
            </tr>
<?php 
session_start(); 
include "db_conn.php";

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
while($row = $result->fetch_assoc()) {
    echo "
    <tr>
        <td>" . $row["Request_Id"]. "</td>
        <td>" . $row["Identity_No"]. " </td>
        <td>" . $row["Vehicle_Req_No"]. "</td>
        <td>" . $row["Form_Id"]. "</td>
        <td>" . $row["Staff_Id"]. "</td>
        <td>" . $row["Request_Date"]. "</td>
        <td>" . $row["Departure_Date"]. "</td>
        <td>" . $row["Arrival_Date"]. "</td>
        <td>" . $row["Mode_Of_Transportation"]. "</td>
        <td>" . $row["Reason"]. "</td>
        <td>" . $row["Request_Status"]. "</td>
    </tr>";
}
echo "</table>";


function filterTable($query1){
    
}

$conn->close();
?>
            

</body>
</html>