<?php
session_start();

// variable declaration
$username = "";
$email    = "";
$fullname    = "";
$address   = "";
$phone   = "";
$address  = "";
$nationality = "";
$identity = "";
// $reference_number = "";
$errors   = array();

// call the login() function if register_btn is clicked
if (isset($_POST['login-btn'])) {
    login();
}


// LOGIN USER
function login()
{
    global $db, $username, $errors;

    // grap form values
    $username = e($_POST['username']);
    $password = e($_POST['password']);

    // make sure form is filled properly
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin') {
                $_SESSION['username'] = $username;
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: admin/home.php');
            } else if ($logged_in_user['user_type'] == 'staff') {
                $_SESSION['username'] = $username;
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: SFolder/staff.php');
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";

                header('location: index.php');
            }
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
