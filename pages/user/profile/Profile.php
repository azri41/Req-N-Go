<!DOCTYPE html>
<html>

<head>
    <style>
        ul{
            list-style-type: none;
            background-color: #CFD3D6;
            margin: 0;
        }   
        li{
            margin-top: 20px;
            float: left;
        }
        li a{
            font-family: open sans;
            font-size: 24px;
            font-weight: 600;         
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li a:hover:not(.active){
          color: white;
        }

        .navRight {
          float: right;
        }
        .formsheet {
            width: 1000px;
            height: 450px;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            margin-left: auto;
            margin-right: auto;
        }
        .formsize {
            width: 20%;
            padding: 20px;
        }
        .attribute {
            width: 10%;
            padding: 15px;
        }
        .textspace {
            border-radius: 25px;
            border: 1px solid black;
            width: 100%;
            height: 30px;
        }
        .btn {
            padding: 10px;
            width: 70%;
            border-radius: 16px;
            background-color: #dde7ee;
            color: black;
            border: 2px solid #5182A6;
        }
        .btn:hover {
            background-color: #87abc4;
            color: white;
        }
        .btn1 {
            padding: 10px;
            width: 100%;
            width: 17%;
            border-radius: 16px;
            background-color: #fce9e9;
            color: black;
            border: 2px solid #e96363;
            margin-top: 50px;
        }
        .btn1:hover {
            background-color: #f2a6a6;
            color: white;
        }
    </style>
    <script type="text/javascript">
        function myConfirm() {
            var answer = window.confirm("Are sure you want to update your profile data?");
        }

        function logOut() {
            // var answer = window.confirm("Are sure you want to logout?");
            var r = confirm('Are you sure you want to logout?');
            if (r == true) {
                window.location.href= "../../../index.php";
            } else {
                window.location.href = "Profile.php";
            }
        }

        function validateForm() {
            var a = document.forms["profileForm"]["fullname"].value;
            var b = document.forms["profileForm"]["email"].value;
            var c = document.forms["profileForm"]["phone"].value;
            var d = document.forms["profileForm"]["nationality"].value;
            var e = document.forms["profileForm"]["idnumber"].value;
            var f = document.forms["profileForm"]["state"].value;
            var i = document.forms["profileForm"]["address"].value;

            if (a == "" && b == "" && c == "" && d == "" && e == "" && f == ""  && i == "") {
                alert("All fields must be filled out");
                return false;
            }
            if (a == "") {
                alert("Name must be filled out");
                return false;
            }
            if (b == "") {
                alert("Email must be filled out");
                return false;
            }
            if (c == "") {
                alert("Phone number must be filled out");
                return false;
            }
            if (d == "") {
                alert("Nationality must be filled out");
                return false;
            }
            if (e == "") {
                alert("Identity number must be filled out");
                return false;
            }
            if (f == "") {
                alert("State must be filled out");
                return false;
            }
            if (i == "") {
                alert("Address must be filled out");
                return false;
            }
        }
    </script>
</head>

<body style="background-color: #6E8A9E ">
    <ul>
    <a href="../../../index.php"><img src="../../../img/logo.png"></a>
        <div class="navRight">
        <li><a href="../health/form.php">HEALTH STATUS</a></li>
        <li><a href="../request/request-main.php">REQUEST</a></li>
        <li><a href="../request/request-status.php">STATUS</a></li>
        <li><a style="color: white" href="Profile.php">PROFILE</a></li>
        <li><a href="../homescreen/about-us.php">ABOUT US</a></li>
        </div>
    </ul>
    <p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
    <br><br>
    <form name="profileForm" class="formsheet" action="Profile-check.php" method='post'> <!--onsubmit="return validateForm()"> -->
        <h1> My Profile</h1>
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
                <td class="attribute">Address :</td>
                <td class="formsize" colspan="4"><input class="textspace" type="text" name='address'></td>
            </tr>
        </table>

        <table style="margin-left:30%;width: 50%;">
            <tr>
                <td><button class="btn" name='update' type="submit" onClick="myConfirm()">Update</button></td>
                <!-- <td><button class="btn1" name='logout' onClick="logOut()">Logout</button></td> -->
            </tr>
            <tr><td><?=$_SESSION["Email"];?></td></tr>
        </table>

    </form>
<center><button class="btn1" name='logout' onClick="logOut()">Logout</button></center>

    <br>
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger
    intent="WELCOME"
    chat-title="Borderz"
    agent-id="3784ef82-a873-40d8-aaa3-3a0a07de9806"
    language-code="en"
    ></df-messenger>
</body>

</html>