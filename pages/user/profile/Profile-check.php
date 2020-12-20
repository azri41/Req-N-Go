<?php 
session_start(); 
include "db_conn.php";

if(isset($_POST['update'])){
    print "You pressed Button 3";
    if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['nationality']) && isset($_POST['idnumber']) && isset($_POST['state']) && isset($_POST['area']) && isset($_POST['postalcode']) && isset($_POST['address']) ) {

        function validate($data){
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }

        $fullname = validate($_POST['fullname']);
        $email = validate($_POST['email']);
        $phone = validate($_POST['phone']);
        $nationality = validate($_POST['nationality']);
        $idnumber = validate($_POST['idnumber']);
        $state = validate($_POST['state']);
        $area = validate($_POST['area']);
        $postalcode = validate($_POST['postalcode']);
        $address = validate($_POST['address']);
    
        if (empty($fullname) || empty($email) || empty($phone) ||empty($nationality) ||empty($idnumber) ||empty($state) ||empty($area) ||empty($postalcode) ||empty($address) ) {
            header("Location: Profile.php?error= form not complete");
            exit();
        }
        else{
            $sql = "UPDATE user SET Fullname = '$fullname', Address = '$address', Email = '$email', Phone_Number = '$phone', Nationality = '$nationality', State = '$state', Area = '$area', Poscode = '$postalcode' WHERE user.Identity_No = $idnumber;";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: Profile.php?success=Successful update the data. Thank you!");
                exit();
            }else {
                header("Location: Profile.php?error=Make sure your Passport or IC is true");
                exit();
            }
        }
        
    }else{
        header("Location: Profile.php");
        exit();
    }

}
else if(isset($_POST['logout'])){
    header("Location: home.php");
    exit();
}
