<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<?php
session_start();

//connect to database
$servername = "localhost";
$username = "root";
$password = "";
// $username = "admin";
// $password = "123"; //utk azri lul
$database = "reqngo";
$conn = mysqli_connect($servername, $username, $password, $database);    //connect database

if ($conn->connect_error) {

    echo "<script type='text/javascript'>toastr.error('Database Collapsed!')</script>";
    echo "<script type='text/javascript'>toastr.options.positionClass = 'toast-bottom-right '</script>";
    die("Connection failed: " . $conn->connect_error);    //die = exit , . utk joined
} else {
    // echo "<script type='text/javascript'>toastr.options.positionClass = 'toast-bottom-right '</script>";
    // echo "<script type='text/javascript'>toastr.success('Database Connected!')</script>";
}
// variable declaration
$identityNo = "";
$identityType = "";
$fullname    = "";
$address   = "";
$state   = "";
$nationality = "";
$email    = "";
$address  = "";
$pwd = "";
$phone   = "";
$userType = "";


// $reference_number = "";
$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
    global $conn, $identityNo;
    $identityNo    =  e($_POST['idnumber']);
    $email       =  e($_POST['email']);
    $fullname   =   e($_POST['fullname']);
    $phone      =   e($_POST['phone']);
    $address    =   e($_POST['address']);
    $nationality    =   e($_POST['nationality']);
    $identityType   =   e($_POST['idtype']);
    $state  =   e($_POST['state']);
    $pwd =  e($_POST['password']);
    if (empty($identityNo) == false && empty($email) == false && empty($fullname) == false && empty($phone) == false && empty($address) == false && empty($nationality) == false && empty($pwd) == false && empty($identityType) == false  && empty($state) == false) {



        $query = "SELECT * FROM user WHERE Identity_No='$identityNo'";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);


        if ($resultCheck > 0) {
            echo "<script type='text/javascript'>toastr.error('User Existed!')</script>";
            echo "<script type='text/javascript'>toastr.options.positionClass = 'toast-bottom-right '</script>";
            // exit();
        } else {

            register();
        }
    } else {
        echo "<script type='text/javascript'>toastr.warning('All fields must be filled out!')</script>";
        echo "<script type='text/javascript'>toastr.options.positionClass = 'toast-bottom-right '</script>";
    }
}

function register()
{
    // call these variables with the global keyword to make them available in function
    global $conn, $errors, $username, $email, $name;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $identityNo    =  e($_POST['idnumber']);
    $email       =  e($_POST['email']);
    $fullname   =   e($_POST['fullname']);
    $phone      =   e($_POST['phone']);
    $address    =   e($_POST['address']);
    $nationality    =   e($_POST['nationality']);
    $identityType   =   e($_POST['idtype']);
    $state  =   e($_POST['state']);
    $pwd =  e($_POST['password']);

    // form validation: ensure that the form is correctly filled


    // register user if there are no errors in the form
    $passwordhashed = md5($pwd); //encrypt the password before saving in the database


    $query = "INSERT INTO user (Identity_No, Identity_Type, Fullname, Address, State, Nationality, Email, Password, Phone_Number, User_Type) 
                VALUES('$identityNo', '$identityType','$fullname','$address','$state','$nationality', '$email','$passwordhashed', '$phone', 'Customer')";
    mysqli_query($conn, $query)  or die("Bad Query: $query");
    $_SESSION['success']  = "New user successfully created!!";
    $jan = true;
    if ($jan == true) {
        header('location: login.php');
    }
    // Fetching data from fee table to refrence the user on which fee type they are gonna pay gang 


}


// call the login() function if register_btn is clicked
if (isset($_POST['login-button'])) {
    login();
}



// LOGIN USER
function login()
{
    global $conn, $email, $errors;

    // grap form values
    $email = e($_POST['email']);
    $password = e($_POST['password']);

    // make sure form is filled properly


    // attempt login if no errors on form
    if ($email && $password !== null) {

        $password = md5($password);
        $query = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            //session start as an email
            $_SESSION['email'] = $email;
            $_SESSION['success']  = "You are now logged in";
            $_SESSION["loggedin"] = true;
            header('location: ../user/homescreen/about-us.php');
        } else {
            echo "<script type='text/javascript'>toastr.error('Wrong Email/Password!')</script>";
            echo "<script type='text/javascript'>toastr.options.positionClass = 'toast-bottom-right '</script>";
        }
    }
}

if (isset($_POST['staff-login'])) {
    staff_login();
}

function staff_login()
{
    global $conn, $email, $errors;

    // grap form values
    $email = e($_POST['staff_email']);
    $password = e($_POST['staff_pwd']);

    // make sure form is filled properly


    // attempt login if no errors on form
    if ($email && $password !== null) {


        $query = "SELECT * FROM admin WHERE Email='$email' AND Password='$password' LIMIT 1";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            //session start as an email
            $_SESSION['email'] = $email;
            $_SESSION['success']  = "You are now logged in";
            $_SESSION["loggedin"] = true;
            header('location: ../admin/analysis/analysis.php');
        } else {
            echo "<script type='text/javascript'>toastr.error('Wrong Email/Password!')</script>";
            echo "<script type='text/javascript'>toastr.options.positionClass = 'toast-bottom-right '</script>";
        }
    }
}
// escape string
function e($val)
{
    global $conn;
    return mysqli_real_escape_string($conn, trim($val));
}

function session_prove()
{

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }
}

if (isset($_SESSION["loggedin"]) == true) {
}
