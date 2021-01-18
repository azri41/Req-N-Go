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
    $pwd =  e($_POST['password']);
    $query = "SELECT * FROM user WHERE IdentityNo='$identity_No'";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        echo "<script type='text/javascript'>toastr.error('User Existed!')</script>";
        echo "<script type='text/javascript'>toastr.options.positionClass = 'toast-bottom-right '</script>";
        // exit();
    } else {
        echo $identityNo, $email, $fullname, $phone, $address, $nationality, $pwd;
        // register();
    }
}

function register()
{
    // call these variables with the global keyword to make them available in function
    global $conn, $errors, $username, $email, $name;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $username    =  e($_POST['username']);
    $email       =  e($_POST['email']);
    $name        =  e($_POST['name']);
    $batch        =  e($_POST['batch']);
    $phone       =  e($_POST['phone']);
    $address     =  e($_POST['address']);
    $category    =  e($_POST['category']);
    $password_1  =  e($_POST['password_1']);
    $password_2  =  e($_POST['password_2']);
    $user_type   =  e($_POST['user_type']);

    // form validation: ensure that the form is correctly filled
    if (empty($username)) {
        array_push($errors, "MatricID is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($name)) {
        array_push($errors, "Name is required");
    }

    if (empty($user_type)) {
        array_push($errors, "Please choose the user type");
    }
    if (empty($category)) {
        array_push($errors, "Please choose the category");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }


    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        if (isset($_POST['user_type'])) {

            if (empty($user_type)) {
                array_push($errors, "Please choose the user type");
            } else {
                $query = "INSERT INTO users (username, email, name, batch, phone, address, user_type, category, password) 
					  VALUES('$username', '$email','$name','$batch','$phone','$address', '$user_type','$category', '$password')";
                mysqli_query($conn, $query)  or die("Bad Query: $query");
                $_SESSION['success']  = "New user successfully created!!";
                // Fetching data from fee table to refrence the user on which fee type they are gonna pay gang 
                if ($category == 'normal') {
                    $sql = "SELECT fee_id, fee_Amount FROM fee WHERE fee_ID=? OR fee_ID=? OR fee_ID=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo 'Cannot prepare';
                        exit();
                    } else {
                        $id1 = 1;
                        $id2 = 2;
                        $id3 = 3;
                        mysqli_stmt_bind_param($stmt, "iii", $id1, $id2, $id3);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        mysqli_stmt_bind_result($stmt, $fee_id, $fee_Amount);

                        $query = "INSERT INTO student_fee_brdg (username, fee_ID, Balance) VALUES (?,?,?)";
                        $stmt2 = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt2, $query)) {
                            echo 'Cannot prepare!';
                            exit();
                        }
                        while (mysqli_stmt_fetch($stmt)) {
                            $param_fee_id = $fee_id;
                            $param_username = $username;
                            $param_balance = $fee_Amount;

                            mysqli_stmt_bind_param($stmt2, "sid", $param_username, $param_fee_id, $param_balance);
                            mysqli_stmt_execute($stmt2);
                            continue;
                        }
                    }

                    if (isAdmin()) {
                        header('location: home.php');
                    } else {
                        header('location: ../SFolder/staff.php');
                    }
                } elseif ($category == 'scholarship') {
                    $sql = "SELECT fee_id, fee_Amount FROM fee WHERE fee_ID=? OR fee_ID=? OR fee_ID=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo 'Cannot prepare';
                        exit();
                    } else {
                        $id4 = 4;
                        $id5 = 5;
                        $id6 = 6;
                        mysqli_stmt_bind_param($stmt, "iii", $id4, $id5, $id6);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        mysqli_stmt_bind_result($stmt, $fee_id, $fee_Amount);

                        $query = "INSERT INTO student_fee_brdg (username, fee_ID, Balance) VALUES (?,?,?)";
                        $stmt2 = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt2, $query)) {
                            echo 'Cannot prepare!';
                            exit();
                        }
                        while (mysqli_stmt_fetch($stmt)) {
                            $param_fee_id = $fee_id;
                            $param_username = $username;
                            $param_balance = $fee_Amount;

                            mysqli_stmt_bind_param($stmt2, "sid", $param_username, $param_fee_id, $param_balance);
                            mysqli_stmt_execute($stmt2);
                            continue;
                        }
                    }

                    if (isAdmin()) {
                        header('location: home.php');
                    } else {
                        header('location: ../SFolder/staff.php');
                    }
                } elseif ($category == 'mara') {
                    $sql = "SELECT fee_id, fee_Amount FROM fee WHERE fee_ID=? OR fee_ID=? OR fee_ID=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo 'Cannot prepare';
                        exit();
                    } else {
                        $id7 = 7;
                        $id8 = 8;
                        $id9 = 9;
                        mysqli_stmt_bind_param($stmt, "iii", $id7, $id8, $id9);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        mysqli_stmt_bind_result($stmt, $fee_id, $fee_Amount);

                        $query = "INSERT INTO student_fee_brdg (username, fee_ID, Balance) VALUES (?,?,?)";
                        $stmt2 = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt2, $query)) {
                            echo 'Cannot prepare!';
                            exit();
                        }
                        while (mysqli_stmt_fetch($stmt)) {
                            $param_fee_id = $fee_id;
                            $param_username = $username;
                            $param_balance = $fee_Amount;

                            mysqli_stmt_bind_param($stmt2, "sid", $param_username, $param_fee_id, $param_balance);
                            mysqli_stmt_execute($stmt2);
                            continue;
                        }
                    }

                    if (isAdmin()) {
                        header('location: home.php');
                    } else {
                        header('location: ../SFolder/staff.php');
                    }
                } else {
                }

                if (isAdmin()) {
                    header('location: home.php');
                } else {
                    header('location: ../SFolder/staff.php');
                }
            }
        }
    }
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
