<?php
    $Vehicle_Req_No = $_POST['Vehicle_Req_No'];
    $Departure_Date = $_POST['Departure_Date'];
    $Arrival_Date = $_POST['Arrival_Date'];
    $Reason = $_POST['Reason'];
    $Mode_Of_Transportation = $_POST['Mode_Of_Transportation'];

    $conn = mysqli_connect('localhost', 'root', '', 'reqngo');
    if (!$conn) 
    {
      die ("Connection Failed :" . mysqli_connect_error());
    }

    echo "Connected successfully";


  $sqli = "SELECT * FROM user INNER JOIN request ON user.Identity_No = request.Identity_No";  
  $result = mysqli_query($conn, $sqli);  
  while ($row2 = mysqli_fetch_array($result))
        {
            $Identity_No = $row2['Identity_No'];
        }



  $mysql = "SELECT * FROM health INNER JOIN request ON health.Form_Id = request.Form_Id";  
  $results = mysqli_query($conn, $mysql);  
  while ($row3 = mysqli_fetch_array($results))
        {
            $Form_Id = $row3['Form_Id'];
        }


        // $sql_e = "SELECT * FROM request WHERE Request_Status =='pending' AND Identity_No = '$Identity_No'";
        // $res_u = mysqli_query($conn, $sql_e);
        // if (mysqli_num_rows($res_u) > 0) 
        // {
        //     echo "Sorry, the username is already taken. Please choose another one";
        // }
        // else
      $sql = "INSERT INTO request (Identity_No, Vehicle_Req_No, Departure_Date, Arrival_Date, Reason, Request_Status, Request_Date, Form_Id, Mode_Of_Transportation) 
      VALUES('$Identity_No', '$Vehicle_Req_No', '$Departure_Date', '$Arrival_Date', '$Reason', 'Pending', now(), '$Form_Id', '$Mode_Of_Transportation')";

          mysqli_query($conn, $sql);

           if (mysqli_query($conn, $sql)) {
            sleep(1);
            header("Location: request-status.php");
          }
          else{
            echo "Error:" . $sql . "<br>" . mysqli_error($conn);
          }
          exit();

?>

