<?php 
include "../../auth/auth_functions_inc.php";
session_prove();
$email = $_SESSION['email'];

$fetch_profile = "SELECT Fullname, Address, Email, Phone_Number, Nationality, Identity_No, State FROM user WHERE Email = '$email'";

$profile = mysqli_query($conn,$fetch_profile);
$user_profile = mysqli_fetch_assoc($profile);

?>
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
            margin-top: 30px;
        }
        .btn:hover {
            background-color: #87abc4;
            color: white;
        }
        .btn1 {
            padding: 10px;
            width: 70%;
            border-radius: 16px;
            background-color: #fce9e9;
            color: black;
            border: 2px solid #e96363;
            margin-top: 30px;
        }
        .btn1:hover {
            background-color: #f2a6a6;
            color: white;
        }
    </style>
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
    <form name="profileForm" name="updateForm" class="formsheet" action="Profile.php" method='post'> <!--onsubmit="return validateForm()"> -->
        <h1> My Profile </h1>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <table>

            <tr>
                <td class="attribute">Full Name :</td>
                <td class="formsize"><input class="textspace" type="text" name='fullname' value="<?php echo$user_profile['Fullname']; ?>"></td>
                <td class="attribute">Email :</td>
                <td class="formsize"><input class="textspace" type="text" name='email' disabled value="<?php echo$user_profile['Email']; ?>"></td>
            </tr>
            <tr>
                <td class="attribute">Phone No. :</td>
                <td class="formsize"><input class="textspace" type="text" name='phone' value="<?php echo$user_profile['Phone_Number']; ?>"></td>
                <td class="attribute">Nationality :</td>
                <td class="formsize"><input class="textspace" type="text" name='nationality' disabled value="<?php echo$user_profile['Nationality']; ?>"></td>
            </tr>
            <tr>
                <td class="attribute">IC / Passport No. :</td>
                <td class="formsize"><input class="textspace" type="text" name='idnumber' value="<?php echo$user_profile['Identity_No']; ?>"></td>
                <td class="attribute">State :</td>
                <td class="formsize"><input class="textspace" type="text" name='state'value="<?php echo$user_profile['State']; ?>"></td>
            </tr>
            <tr>
                <td class="attribute">Address :</td>
                <td class="formsize" colspan="4"><input class="textspace" type="text" name='address' value="<?php echo$user_profile['Address']; ?>"></td>
            </tr>
        </table>

        <table style="margin-left:30%;width: 50%;">
            <tr>
                <td><button class="btn" name='update' type="submit" onClick="myConfirm()">Update</button></td>
                <td><button class="btn1" name='logout' type="Logout">Logout</button></td>
            </tr>
        </table>

    </form>

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

<?php
    if(isset($_POST['update'])){
        $user_name=$_POST['fullname'];
        $user_PhoneNo=$_POST['phone'];
        $user_IDnumber=$_POST['idnumber'];
        $user_State=$_POST['state'];
        $user_Address=$_POST['address'];


        $query = mysqli_query ($conn,"UPDATE user SET Fullname='$user_name', Phone_Number= '$user_PhoneNo', Identity_No='$user_IDnumber', State='$user_State', Address='$user_Address' WHERE Email = '$email' ");
        $test = "Profile have updated successfully";
        echo"<script type= 'text/javascript'>alert('$test'); location='Profile.php';</script>";

    }
    if (isset($_POST['logout'])) {
        echo "<script> location.href= '../../auth/logout.php';</script>";
        exit;
    }
?>