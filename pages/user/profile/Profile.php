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
            height: 550px;
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
            width: 70%;
            border-radius: 16px;
            background-color: #fce9e9;
            color: black;
            border: 2px solid #e96363;
        }
        .btn1:hover {
            background-color: #f2a6a6;
            color: white;
        }
    </style>
    <script type="text/javascript">
        function myConfirm() {
            var answer = window.alert("Are sure you want to update your profile data? make sure you fill all.");
        }
    </script>
</head>

<body style="background-color: #6E8A9E ">
    <ul>
        <img src="../../../img/Logo.png" alt="Logo.png">
        <div class="navRight">
            <li><a href="#home">HEALTH STATUS</a></li>
            <li><a href="#request">REQUEST</a></li>
            <li><a href="#status">STATUS</a></li>
            <li><a href="#profile">PROFILE</a></li>
            <li><a href="#about">ABOUT US</a></li>
        </div>
    </ul>
    <p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
    <br><br>
    <form class="formsheet" action="Profile-check.php" method='post'>
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
                <td><button class="btn" name='update' type="submit" onClick="myConfirm() ">Update</button></td>
                <td><button class="btn1" name='logout' type="submit">Logout</button></td>
            </tr>
        </table>

    </form>
    <br>
</body>

</html>