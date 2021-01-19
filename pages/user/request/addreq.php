<?php

include "../../auth/auth_functions_inc.php";
session_prove();
//assigned values to each variables based on form from request-main.php
    $Vehicle_Req_No = $_POST['Vehicle_Req_No'];
    $Departure_Date = $_POST['Departure_Date'];
    $Arrival_Date = $_POST['Arrival_Date'];
    $Reason = $_POST['Reason'];
    $Mode_Of_Transportation = $_POST['Mode_Of_Transportation'];
    $Destination = $_POST['Destination'];

    $conn = mysqli_connect('localhost', 'root', '', 'reqngo');
    if (!$conn) 
    {
      die ("Connection Failed :" . mysqli_connect_error());
    }

    echo "Connected successfully";

        $email = $_SESSION['email'];
        $query = "SELECT Identity_No FROM user WHERE Email='$email'";
        $fetch=mysqli_query($conn,$query);
        while ($row = mysqli_fetch_array($fetch))
        {
            $id = $row['Identity_No']; //select identity_no based on session email
        }


        //Validation
        $dep_date = $_POST['Departure_Date'];
        echo "dep = $dep_date         ";
        $arr_date = $_POST['Arrival_Date'];
        echo "arr = $arr_date";

        if($dep_date > $arr_date){ //condition if departure date more than arrival date, it will cause an error
          echo "<script>alert('Error date! Please check it again!');window.location.href='request-main.php';</script>"; //window alert will pop out if error in date
        }
        else{
          $mysql = "SELECT Form_Id FROM health WHERE Identity_No = '$id'";  
          $results = mysqli_query($conn, $mysql);  
          while ($row3 = mysqli_fetch_array($results))
                {
                    $Form_Id = $row3['Form_Id']; //fetch form id
                }
        
              $sql = "INSERT INTO request (Identity_No, Vehicle_Req_No, Destination, Departure_Date, Arrival_Date, Reason, Request_Status, Request_Date, Form_Id, Mode_Of_Transportation) 
              VALUES('$id', '$Vehicle_Req_No', '$Destination', '$Departure_Date', '$Arrival_Date', '$Reason', 'Pending', now(), '$Form_Id', '$Mode_Of_Transportation')"; //insert values into databse
        
                   if (mysqli_query($conn, $sql)) {
                    sleep(1);
                    echo "<script>alert('Thank you for your submission. We will process your letter soon.');window.location.href='request-status.php';</script>"; 
                  }
                  else{
                    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
                  }
                  exit();
        }

        


?>

