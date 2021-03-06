<?php
include "../../auth/auth_functions_inc.php";
session_prove();
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
        }

        li {
            margin-top: 20px;
            float: left;
        }

        li a {
            font-family: open sans;
            font-size: 24px;
            font-weight: 600;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            color: white;
        }

        .navRight {
            float: right;
        }

        .team-section {
            overflow: hidden;
            text-align: center;
            padding: 60px;
        }

        .team-section h1 {
            text-transform: uppercase;
            margin-bottom: 60px;
            color: black;
            font-size: 40px;
        }

        .inner-width {
            max-width: 1200px;
            margin: auto;
            padding: 40px;
            overflow: hidden;
        }

        .border {
            display: block;
            margin: auto;
            width: 160px;
            height: 3px;
            background: #394d60;
            margin-bottom: 60px;
        }

        .ps a {
            display: inline-block;
            margin: 0 40px;
            width: 200px;
            height: 200px;
            overflow: hidden;
            border-radius: 70%;
        }

        .ps a img {
            width: 100%;
            filter: grayscale(50%);
        }

        .ps a:hover>img {
            filter: none;
        }

        .pe {
            float: left;
            width: calc(100%/5);
        }
    </style>
</head>

<body style="background-color: #CFD3D6;">
    <ul>
        <a href="../../../index.php"><img src="../../../img/logo.png"></a>
        <div class="navRight">
            <li><a href="../health/form.php">HEALTH STATUS</a></li>
            <li><a href="../request/request-main.php">REQUEST</a></li>
            <li><a href="../request/request-status.php">STATUS</a></li>
            <li><a href="../profile/Profile.php">PROFILE</a></li>
            <li><a style="color: white" href="about-us.php">ABOUT US</a></li>
        </div>
    </ul>
    <p style="background-color: #465865; color: #394d60; margin-top: 0px;"><br><br></p>
    <img src="../../../img/Background.png" alt="Nature" style="width:100%;">
    <br><br><br>

    <table >
        <tr>
            <th style="width:60%;text-align:justify;font-family:monaco;padding: 15px; opacity: 0.7; font-size: 30px">Req N GO is a one-click system which can be used by everyone staying in Malaysia. It is a system provided for everyone to request to cross the border while we are still under restricted movement control (RMO). It is more convenient to use during the pandemic as it is done online so people do not have to go to the police station to get the form and approval. With req’ n go, everything is done at the tip of your finger anytime and anywhere.
                <br><br>
                Our objective is to make sure that everyone can request for crossing the border form wherever you are staying. Looking at the world situation now, we understand that it is safer to stay at home to avoid the threat of covid-19. So instead of going outside, exposing yourself to the threat, we provide an online request form for everyone. If you are enquiring for anything regarding our services, feel free to chat us here or you can contact us via email. We will answer any of your concerns as soon as possible.
            <th>
            <th style="width:60%; border: 5px solid #99A3A4;text-align:justify;padding: 20px; font-family:monaco; font-size: 30px;opacity: 0.7 ;border-radius: 25px;">
                <h1>How We Work</h1>Before making any request from our Req N Go, your need to become a member by filling in your details first and creating an account. All informati given to us are kept as private and confidential. Also, members are required to declare their health status before requesting for crossing the border form. Request to cross the border must be done at least 3 days before the date. It takes around 2-4 days to process your request, either it is approve or otherwise.<br>
            <th>
        </tr>
    </table>

    <div class="team-section">
        <div class="inner-width">
            <h1>Our Admin</h1>
            <span class="border"></span>
            <div class="ps">
                <div class="pe">
                    <a href="../../../aboutUs/Alis/alis.html" target="_blank"><img src="../../../aboutUs/Alis/alis.jpeg" alt="Alis"></a>
                    <h2>&nbsp &nbsp &nbsp Alis</h2>
                </div>
                <div class="pe">
                    <a href="../../../aboutUs/Arif/ariff.html" target="_blank"><img src="../../../aboutUs/Arif/ariff.jpg" alt="Ariff"></a>
                    <h2>&nbsp &nbsp &nbsp Ariff</h2>
                </div>
                <div class="pe">
                    <a href="../../../aboutUs/Azri/Azri Biography.html" target="_blank"><img src="../../../aboutUs/Azri/img/Gambar.jpg" alt="Azri"></a>
                    <h2>&nbsp &nbsp &nbsp Azri</h2>
                </div>
                <div class="pe">
                    <a href="../../../aboutUs/Izz/biography.html" target="_blank"><img src="../../../aboutUs/Izz/image/MyPic.jpeg" alt="Izz"></a>
                    <h2>&nbsp &nbsp &nbsp Izz</h2>
                </div>
                <div class="pe">
                    <a href="../../../aboutUs/Yiwen/mysite.html" target="_blank"><img src="../../../aboutUs/Yiwen/img/profile.jpg" alt="Yi Wen"></a>
                    <h2>&nbsp &nbsp &nbsp Yiwen</h2>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger intent="WELCOME" chat-title="Borderz" agent-id="3784ef82-a873-40d8-aaa3-3a0a07de9806" language-code="en"></df-messenger>
</body>

</html>