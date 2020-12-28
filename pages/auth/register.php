<?php
require "../../config.php";

$id = $name = $state = $area = $poscode = $address = $email = $password = $phoneNum = "";
$usertype = "Customer";
$id_err = $name_err = $state_err = $area_err = $poscode_err = $add_err = $email_err = $password_err = $confirm_password_err =
    $phoneNum_err = $check_err = "";

//get data from form after submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //id_no
    if (empty(trim($_POST["Identity_No"])))
        $id_err = "Please enter your identity number.";
    else {
        //sql statement prep to check for existing ic no.
        $sql = "SELECT Identity_No FROM user WHERE Identity_No = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            //Bind variables to prepped statement
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            //assigning value to to parameters
            $param_id = trim($_POST["Identity_No"]);

            //execute sql statement (if valid)
            if (mysqli_stmt_execute($stmt)) {

                //store result to manipulate
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1)
                    $id_err = "An account with this number already exists.";
                else if (strlen($param_id) < 0)
                    $id_err = "Please enter positive number.";
                else if (!filter_var($param_id, FILTER_VALIDATE_INT))
                    $id_err = "You have entered invalid number.";
                else
                    $id = trim($_POST["Identity_No"]);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    //fullnname
    if (empty(trim($_POST["Fullname"]))) {
        $name_err = "Please enter a fullname.";
    } elseif (!preg_match("/^([a-zA-Z' ]+)$/", trim($_POST["Fullname"]))) {
        $name_err = "Invalid name.";
    } else {
        $name = trim($_POST["Fullname"]);
    }

    //state
    if (empty(trim($_POST["State"]))) {
        $state_err = "Please enter a state.";
    } elseif (!preg_match("/^([a-zA-Z' ]+)$/", trim($_POST["State"]))) {
        $state_err = "Invalid name of state.";
    } else {
        $state = trim($_POST["State"]);
    }

    //area
    if (empty(trim($_POST["Area"]))) {
        $area_err = "Please enter an area name.";
    } elseif (!preg_match("/^([a-zA-Z' ]+)$/", trim($_POST["Area"]))) {
        $area_err = "Invalid name of area.";
    } else {
        $area = trim($_POST["Area"]);
    }

    //poscode
    if (empty(trim($_POST["Poscode"]))) {
        $poscode_err = "Please enter a poscode.";
    } elseif (!filter_var(trim($_POST["Poscode"]), FILTER_VALIDATE_INT)) {
        $poscode_err = "Invalid postal code number.";
    } else {
        $poscode = trim($_POST["Poscode"]);
    }

    //phonenum
    if (empty(trim($_POST["Phone_Number"]))) {
        $phoneNum_err = "Please enter a phone number.";
    } elseif (!preg_match("/^([0-9' ]+)$/", trim($_POST["Phone_Number"]))) {
        $phoneNum_err = "Invalid phone number.";
    } else {
        $phoneNum = trim($_POST["Phone_Number"]);
    }

    //address
    if (empty(trim($_POST["Address"]))) {
        $add_err = "Please enter an address.";
    } else {
        $address = trim($_POST["Address"]);
    }

    // //nationality
    // if(empty(trim($_POST["Nationality"]))){
    //     $nationality_err = "Please enter your nationality.";
    // }
    // elseif(!preg_match("/^([a-zA-Z' ]+)$/",trim($_POST["Nationality"]))){
    //     $nationality_err = "Invalid country name.";
    // }
    // else{
    //     $nationality = trim($_POST["Nationality"]);
    // }

    //email
    if (empty(trim($_POST["Email"])))
        $email_err = "Please enter your email.";
    else {
        //sql statement prep to check for existing email.
        $sql = "SELECT * FROM user WHERE Email = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            //Bind variables to prepped statement
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            //assigning value to to parameters
            $param_email = trim($_POST["Email"]);

            //execute sql statement (if valid)
            if (mysqli_stmt_execute($stmt)) {

                //store result to manipulate
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1)
                    $email_err = "An account with this email already exists.";
                else if (!filter_var($param_email, FILTER_VALIDATE_EMAIL))
                    $email_err = "Email is invalid.";
                else
                    $email = trim($_POST["Email"]);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    //password stuff
    if (empty(trim($_POST["Password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["Password"])) < 6) {
        $password_err = "Password must be at least 6 characters.";
    } else {
        $password = trim($_POST["Password"]);
    }

    //confirm the password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Passwords do not match.";
        }
    }

    //check for errors before modifying database
    if (
        empty($id_err) && empty($name_err) && empty($state_err) && empty($area_err) && empty($poscode_err)
        && empty($add_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($phoneNum_err)
    ) {

        $sql = "INSERT INTO user (Identity_No, Fullname, State, Area, Poscode, Address, Email, Password, Phone_Number, User_Type)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param(
                $stmt,
                "ssssssssss",
                $param_id,
                $param_name,
                $param_state,
                $param_area,
                $param_poscode,
                $param_address,
                $param_email,
                $param_phoneNum,
                $param_password,
                $param_user
            );

            $param_id = $id;
            $param_name = $name;
            $param_state = $state;
            $param_area = $area;
            $param_poscode = $poscode;
            $param_address = $address;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_phoneNum = $phoneNum;
            $param_user = $usertype;

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Registration successful. Now you can login.');window.location.href='pages/auth/login.php';</script>";
            } else {
                $check_err = "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($conn);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="image/Logo.ico">
    <meta charset="UTF-8">
    <meta name="decription" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Req-N-Go</title>
    <link rel="stylesheet" type="text/css" href="../../style/auth_style.css">
    <style>
        body {
            /* background: #1690a7; */
            background: url("../../img/Register.jfif");
            background-repeat: no-repeat;
            /* background-size: auto; */
            background-size: cover;

            /* align-items: center; */
            height: 100vh;
            /* flex-direction: column; */
        }
    </style>
</head>

<body>
    <a href="../../index.php"><img id="logo_login" src="../../img/logo-invert.png"></a>


    <div class="register-form">
        <form class="formsheet" action="Profile-check.php" method='post'>

            <h1> Register</h1>

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>
            <table>

                <tr>
                    <td class="attribute">Full Name :</td>
                    <td class="formsize"><input class="textspace" type="text" name='fullname'></td>
                    <td class="attribute">Email :</td>
                    <td class="formsize"><input class="textspace" type="text" name='email'></td>
                </tr>
                <tr>
                    <td class="attribute">Phone No. :</td>
                    <td class="formsize"><input class="textspace" type="text" name='phone'></td>
                    <td class="attribute">Nationality :</td>
                    <td class="formsize"><input class="textspace" type="text" name='nationality'></td>
                </tr>
                <tr>
                    <td class="attribute">IC / Passport No. :</td>
                    <td class="formsize"><input class="textspace" type="text" name='idnumber'></td>
                    <td class="attribute">State :</td>
                    <td class="formsize"><input class="textspace" type="text" name='state'></td>
                </tr>
                <tr>
                    <td class="attribute">Area :</td>
                    <td class="formsize"><input class="textspace" type="text" name='area'></td>
                    <td class="attribute">Postal Code :</td>
                    <td class="formsize"><input class="textspace" type="text" name='postalcode'></td>
                </tr>
                <tr>
                    <td class="attribute">Address :</td>
                    <td class="formsize" colspan="4"><input class="textspace" type="text" name='address'></td>
                </tr>
            </table>

            <table style="margin-left:30%;width: 50%;">
                <tr>
                    <td><button class="btn" name='register' type="submit" onClick="myConfirm() ">Register</button></td>

                </tr>
            </table>

        </form>
    </div>
</body>

</html>