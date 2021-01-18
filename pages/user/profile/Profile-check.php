<?php 
include "../../auth/auth_functions_inc.php";
session_prove();

$Email = $_SESSION['Email'];

$fetch_profile = "SELECT Fullname, Address, Email, Phone_Number, Nationality, State FROM user WHERE Email = '$Email'";

$profile = mysqli_query($conn,$fetch_profile);
$user_profile = mysqli_fetch_assoc($profile);

if(isset($_POST['update'])){
    print "You pressed Button 3";
    if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['nationality']) && isset($_POST['idnumber']) && isset($_POST['state']) && isset($_POST['address']) ) {

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
        $address = validate($_POST['address']);
    
        if (empty($fullname) || empty($email) || empty($phone) ||empty($nationality) ||empty($idnumber) ||empty($state)||empty($address) ) {
            header("Location: Profile.php?error= form not complete");
            exit();
        }
        else{
            $sql = "UPDATE user SET Fullname = '$fullname', Address = '$address', Email = '$email', Phone_Number = '$phone', Nationality = '$nationality', State = '$state' WHERE user.Identity_No = $idnumber;";
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
    header("Location: ../../../index.php");
    exit();
}
