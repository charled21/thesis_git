<?php 
require_once('php/db-config.php');
session_start();
if(!isset($_SESSION["username"])){
    //guest welcomem msg
   // echo "<script type=\"text/javascript\">alert(\"Welcome Guest!\")</script>";
    //unset($_SESSION['username']);
    //session_destroy();
}
else {
    //if logged in, welcomes user
    $logged_user = $_SESSION["username"];
    echo "<script type=\"text/javascript\">alert(\"Welcome back $logged_user!\")</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
     <!-- --------------- Main CSS --------------------->
     <link href="css/main.css" rel="stylesheet">
     <!-- -------------- Bootstrap ----------------------->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- php for login start-->

            <?php

            $con = mysqli_connect("localhost","root","","rusty_db_01");

            if (isset($_POST['username'])){
            
              $username = ($_POST['username']);
              $password = ($_POST['password']);
              $password = (sha1($password)); 
            
            $query = "SELECT * FROM `login_accounts` WHERE username='$username'
            and password='".($password)."'";
             $result = mysqli_query($con,$query) or die(mysql_error());
             $rows = mysqli_num_rows($result);
                    if($rows==1){
                 $_SESSION['username'] = $username;
                 
            include "php\login-history.php";
            header("Location: userpanel.php");
                     }else{
             echo "
             <script type=\"text/javascript\">alert(\"Incorrect username or password!\");
             window.location.href = \"main.php\";
             </script>
             ";
            }
                }else{
                    
            ?>
            <!--php for login end--->

                        <!------------------------------modal----------------------------------->
                        <section id="modal-section">
                <div class="modal fade" id="accountmodal" tabindex="-1" role="dialog" aria-labelledby="accountmodal-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="accountmodal-label">LOGIN PANEL</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                                <div class="modal-body">
                                    <form action="" method="post" id="modal-form">
                                        <div class="form-group row justify-content-center">
                                            <div class="col-lg-10 col-sm-10">
                                                <p>USERNAME </p><input type="text" name="username" class="form-control input-txt-style" placeholder="username" >
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <div class="col-lg-10 col-sm-10">
                                                <p>PASSWORD</p><input type="password" name="password" class="form-control" placeholder="*********" >
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-xs-4 row"> <p class="modal-text mr-2">Don't have an account yet?<p> <a href="register.php">Click here</a></div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="submit" id="modal-btn">Login</button>
                                        </div>

                                        
                                        
                                        </form>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </section>

            <!--php login wrap close begin-->
            <?php } ?>
            <!--php login wrap close end-->

            <!-------------------------------modal end------------------------------>
                                

    <!-- ---------------------topbar start-------------------------- -->
    <div id="topbar"></div>
            <!-- ---------------------topbar end-------------------------- -->
            <!-- ---------------------header-------------------------- -->
            <section>
                <header id="header" class="fixed-top header-transparent">

                    <div class="container d-flex align-items-center">
                        <div class="col-lg-12 col-md-6 header-nav ">
                        <nav class="navbar navbar-expand-md">
                            <div class="row">
                                <!-- <a class="navbar-main"href="#">HRIS</a>
                                <a id="nav-main"href="#">-SUBSYS</a> -->
                                <img class="logo-topbar" src="img/appicon3.png">
                            </div>
                                <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#collapse-items" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                            <div class="collapse navbar-collapse" id="collapse-items">
                                <ul class="col-md-6">
                                
                                </ul>
                                
                                <ul class="col-md-6 navbar-nav m-0 ml-lg-auto p-3 p-lg-0 justify-content-between" >
                                        <li>
                                            <a class="nav-link" href="#about" id="abt-btn">ABOUT</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#services" id="srv-btn">PRODUCT</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#porttwo" id="prt-btn">PORTFOLIO</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#footer-personal" id="contact-us">LOGIN</a>
                                        </li>
                                        <!-- <li>
                                            <a id="account-btn" class="nav-link" data-toggle="modal" data-target="#accountmodal">ACCOUNT</a>
                                        </li>     -->
                                </ul>
                            </div>
                        </nav>
                        </div>
                    </div>
                </header>
            </section>
            <!-- ---------------------header end-------------------------- -->

            <!-- ---------------------landing cover-------------------------- -->
            <section id="landingcover"> 
                <div class="col-lg-12 landingcover-ss" >
                    <div class="container-fluid" >
                        <div class="row landing-container align-items-center" >
                            <!-- <div class="row"> -->
                                <div class="col-lg-6 col-md-6 text-center">
                                    <p class="text-style">HUMAN RESOURCE INFORMATION SYSTEM</p>
                                    <button class="btn btn-warning button-style" data-toggle="modal" data-target="#accountmodal" id="gs-btn">GET STARTED</button>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <img class="img-fluid" src="img/landing_pg_1.png">
                                </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- ---------------------landing cover end-------------------------- -->

            <!-----------------------scripts start-------------------------- -->

            <script src="js/jquery-3.4.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.easing.min.js"></script>
            <!-----------------------scripts end-------------------------- -->

        </body>
</html>