<?php
require "../../config.php";
include("auth_functions_inc.php");
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

    <script>
        function validateForm() {
            var a = document.forms["registerForm"]["fullname"].value;
            var b = document.forms["registerForm"]["email"].value;
            var c = document.forms["registerForm"]["phone"].value;
            var d = document.forms["registerForm"]["nationality"].value;
            var e = document.forms["registerForm"]["idnumber"].value;
            var f = document.forms["registerForm"]["state"].value;
            var g = document.forms["registerForm"]["idtype"].value;
            var h = document.forms["registerForm"]["postalcode"].value;
            var i = document.forms["registerForm"]["address"].value;
            var j = document.forms["registerForm"]["password"].value;

            if (a == "" && b == "" && c == "" && d == "" && e == "" && f == "" && g == "" && h == "" && i == "") {
                alert("All fields must be filled out!");
                return false;
            }
            if (a == "") {
                alert("Name must be filled out!");
                return false;
            }
            if (b == "") {
                alert("Email must be filled out!");
                return false;
            }
            if (c == "") {
                alert("Phone number must be filled out!");
                return false;
            }
            if (d == "") {
                alert("Nationality must be filled out!");
                return false;
            }
            if (e == "") {
                alert("Identity number must be filled out!");
                return false;
            }
            if (f == "") {
                alert("State must be filled out!");
                return false;
            }
            if (g == "") {
                alert("Please select an identification type!");
                return false;
            }
            if (h == "") {
                alert("Postal code must be filled out!");
                return false;
            }
            if (i == "") {
                alert("Address must be filled out!");
                return false;
            }
            if (j == "") {
                alert("Password must be filled out!");
                return false;
            }
        }
    </script>

</head>

<body>
    <a href="../../index.php"><img id="logo_login" src="../../img/logo-invert.png"></a>


    <div class="register-form">
        <form name="registerForm" class="formsheet" action="register.php" method='post' onsubmit="return validateForm()">

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
                    <td class="attribute"><label for="nationality">Nationality:</label></td>
                    <td class="formsize"> <select name="nationality" id="nationality">
                            <option value="">Please Select an option...</option>
                            <option value="Malaysian">Malaysian</option>
                            <option value="Foreigner">Foreigner</option>
                            <option value="Other">Other</option>
                    </td>
                    <td class="attribute">State :</td>
                    <td class="formsize"><input class="textspace" type="text" name='state'></td>
                </tr>



                <tr>
                    <td class="attribute">IC / Passport No. :</td>
                    <td class="formsize"><input class="textspace" type="text" name='idnumber'></td>
                </tr>
                <tr>
                    <td class="attribute"><label for="cars">Identification Type:</label></td>
                    <td class="formsize"> <select name="idtype" id="idtype">
                            <option value="">Please Select an option...</option>
                            <option value="I/C">I/C</option>
                            <option value="Passport">Passport</option>
                    </td>

                </tr>
                <tr>
                    <td class="attribute">Address :</td>
                    <td class="formsize" colspan="4"><input class="textspace" type="text" name='address'></td>
                </tr>
                <tr>
                    <td class="attribute">Password :</td>
                    <td class="formsize" colspan="4"><input class="textspace" type="password" name='password'></td>
                </tr>
            </table>

            <table style="margin-left:30%;width: 50%;">
                <tr>
                    <td><button class="btn" name='register_btn' type="submit">Register</button></td>

                </tr>
            </table>

        </form>
    </div>
</body>

</html>