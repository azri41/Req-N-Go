<?php
    $Identity_No = $_POST['Identity_No'];
    $Vehicle_Req_No = $_POST['Vehicle_Req_No'];
    $Departure_Date = $_POST['Departure_Date'];
    $Arrival_Date = $_POST['Arrival_Date'];
    $Reason = $_POST['Reason'];
    $Mode_Of_Transportation = $_POST['Mode_Of_Transportation'];
    $Staff_Id = $_POST['Staff_Id'];
    $Form_Id = $_POST['Form_Id'];


    $conn = mysqli_connect('localhost', 'root', '', 'reqngo');
    if (!$conn) {
      die ("Connection Failed :" . mysqli_connect_error());
    }

    echo "Connected successfully";


      $sql = "INSERT INTO request (Identity_No, Vehicle_Req_No, Departure_Date, Arrival_Date, Reason Request_Status, Form_Id, Staff_Id, Mode_Of_Transportation) 
          VALUES('$Identity_No', '$Vehicle_Req_No', '$Departure_Date', '$Arrival_Date', '$Reason', 'pending', '$Form_Id', '$Staff_Id', '$Mode_Of_Transportation')";

          if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
          }
          else{
            echo "Error:" . $sql . "<br>" . mysqli_error($conn);
          }
          mysqli_close($conn);
          header("location: request-status.php");
?>

