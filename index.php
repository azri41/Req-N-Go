<?php
    require "header.php";
?>

<main>
    <div class="wrapper-main">
        <section class="section-default">
            <?php
                if (isset($_SESSION['usertype'])){
                    echo '<p class="login-status">You are logged in!</p>';

                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                        if($_SESSION["usertype"] === 'Customer'){
                            header("location: UserMain.php");
                            exit;
                        }
                        elseif($_SESSION["usertype"] === 'Admin'){
                            header("location: AdminMain.php");
                            exit;
                        }
                    }
                }
                else{
                    echo '<p class="login-status">You are logged out!</p>';
                }
            ?>
        </section>
    </div>
    
</main>
<br><br><br><br>
    <footer>
    <p>Phone : 06-231 4133 </p>
    <p>Email : @gmail.com </p>
    </footer>