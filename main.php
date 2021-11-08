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
    $priv = $_SESSION['acct_priv'];
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <!-- php for login start-->

            <?php

            $ft_tables="job_history";
            $rec_Table = "applicant_details";
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $databaseName = "thesis_1";
            $app_stat_cnt=0;
            $total_no_applicants = 0;
            $pending_req = 0;
            $completed_jobs = 0;
            $job_counter= 0;

            $con = mysqli_connect($hostname, $username, $password, $databaseName);
            $inboxQuery = "SELECT applicant_id, app_status FROM $rec_Table";
            $rec_Query = "SELECT job_history_id, job_status FROM $ft_tables";
            $result3 = mysqli_query($con, $rec_Query);
            $inbx = mysqli_query($con, $inboxQuery);
            while($row2 = mysqli_fetch_array($inbx))
            {
                $total_no_applicants++;
                $app_stat = $row2['app_status'];
                if($app_stat>3){
                    $app_stat_cnt++;
                }
                else if($app_stat<4){
                    $pending_req++;
                }
                
            }
            while($row = mysqli_fetch_array($result3))
            {
                $rec_cnt = $row['job_history_id'];
                $job_status = $row['job_status'];
                if($job_status>0){
                    $completed_jobs++;
                }
            }

            if (isset($_POST['username'])){
            
              $username = ($_POST['username']);
              $password = ($_POST['password']);
              $password = (sha1($password)); 
              $priv = "";
            
            $query = "SELECT * FROM `login_accounts` WHERE username='$username'
            and password='".($password)."'";
             $result = mysqli_query($con,$query) or die(mysql_error());
             while($priv_rows = mysqli_fetch_array($result))
             {
                $priv = $priv_rows['acct_priv'];
             }
             $rows = mysqli_num_rows($result);
                    if($rows==1){
                 $_SESSION['username'] = $username;
                 $_SESSION['acct_priv'] = $priv;

            
                 
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
                                        <div class="col-md-10 col-xs-4 row"> <p class="modal-text mr-2">Don't have an account yet?<p> <a href="register/register.php">Click here</a></div>
                                        
                                        <div class="modal-footer">
                                            <!-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="false" aria-controls="collapseExample">
                                                Admin Login
                                            </button> -->
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="submit" id="modal-btn">Login</button>
                                        </div>

                                        <!-- collapse card start -->

                                        <!-- <div class="collapse" id="collapseAdmin">
                                        <div class="card card-body">

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
                                            <div class="form-group row justify-content-center">
                                                <div class="col-lg-10 col-sm-10">
                                                    <p>KEY CODE</p><input type="password" name="keycode" class="form-control" placeholder="*********" >
                                                </div>
                                            </div>

                                        </div>
                                        </div> -->

                                        <!-- collapse card end-->
                                                                                
                                        </form>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <!-- modal start-->

                <div class="modal fade" id="jobModal" tabindex="-1" role="dialog" aria-hidden="true">
                <?php 
                $ft_tables="job_history";
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $databaseName = "thesis_1";
                $app_stat_cnt=0;

                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                $rec_Query = "SELECT job_id, job_city, DATEDIFF(CURDATE(),job_date) as datepassed, emp_type FROM $ft_tables";
                $result3 = mysqli_query($connect, $rec_Query);
                ?>
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-light">Job Opportunities</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php 
                                                while($row = mysqli_fetch_array($result3))
                                                {
                                                    $row_num = $row['job_id'];
                                                    $city = $row['job_city'];
                                                    $emp_type = $row['emp_type'];
                                                    $date =$row['datepassed'];
                                                    if($row_num==1){
                                                        $job_id='Manager';
                                                    }
                                                    else if($row_num==2)
                                                    {
                                                        $job_id='Mechanic';
                                                    }
                                                    else if($row_num==3)
                                                    {
                                                        $job_id='Treasury Staff';
                                                    }
                                                    else if($row_num==4)
                                                    {
                                                        $job_id='IT Staff';
                                                    }
                                                    else if($row_num==5)
                                                    {
                                                        $job_id='Cost Engineer';
                                                    }
                                                    else if($row_num==6)
                                                    {
                                                        $job_id='HR Staff';
                                                    }
                                                    else if($row_num==7)
                                                    {
                                                        $job_id='Store Clerk';
                                                    }
                                                    $job_counter++;
                                                    echo "<h4 class=\"mb-3\">$job_id</h4>";
                                                    echo "<div class=\"form-row\">";
                                                    echo "<p class=\"ml-2 text-secondary\">$city<p><i class=\"ml-3 fas fa-briefcase text-secondary\"></i> <p class=\"ml-1 text-secondary\">$emp_type </p>";
                                                    echo "</div>";
                                                    echo "<div class=\"form-row d-flex justify-content-between\">";
                                                    echo "<p class=\"text-secondary\">[#$job_counter]  Over $date day(s) ago</p>";
                                                    echo "<a type=\"button\" class=\"mr-4 btn btn-info\" href=\"applicant\applicant-page1.php\" value=\"$job_id\" id=\"apply_btn\">Apply</a>";
                                                    echo "</div>";
                                                    echo "<hr>";
                                                }
                                                
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                        <!-- modal end -->
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
                                <img class="logo-topbar" src="img/logo-1.png">
                            </div>
                                <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#collapse-items" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                            <div class="collapse navbar-collapse" id="collapse-items">
                                <ul class="col-md-6">
                                
                                </ul>
                                
                                <?php 
                                if(!isset($_SESSION["username"])){
                                    echo "<ul class=\"col-md-6 navbar-nav m-0 ml-lg-auto p-3 p-lg-0 justify-content-between\" >";

                                    echo "<li>
                                    <a class=\"nav-link\" href=\"#about\" id=\"abt-btn\">ABOUT</a>
                                    </li>";
                                    echo "<li>
                                    <a class=\"nav-link\" href=\"#services\" id=\"srv-btn\">PRODUCT</a>
                                    </li>";
                                    echo "<li>
                                    <a class=\"nav-link\" data-toggle=\"modal\" data-target=\"#jobModal\" id=\"jobs-btn\">JOBS</a>
                                    </li>";
                                    echo "<li>
                                    <a class=\"nav-link\" data-toggle=\"modal\" data-target=\"#accountmodal\" id=\"contact-us\">LOGIN</a>
                                    </li>";
                                }
                                else {
                                    //if logged in, welcomes user
                                    $logged_user = $_SESSION["username"];
                                    
                                    echo "<ul class=\"col-md-6 navbar-nav m-0 ml-lg-auto p-3 p-lg-0 justify-content-between\" >";

                                    echo "<li>
                                    <a class=\"nav-link\" href=\"#about\" id=\"abt-btn\">ABOUT</a>
                                    </li>";
                                    echo "<li>
                                    <a class=\"nav-link\" href=\"#services\" id=\"srv-btn\">PRODUCT</a>
                                    </li>";
                                    echo "<li>
                                    <a class=\"nav-link\" data-toggle=\"modal\" data-target=\"#jobModal\" id=\"prt-btn\">JOBS</a>
                                    </li>";
                                    echo "<li>
                                    <a class=\"nav-link\" href=\"userpanel.php\" id=\"contact-us\">ACCOUNT</a>
                                    </li>";
                                }
                                ?>
                                
                                        
                                        
                                        
                                        
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
                                    <p class="mt-4 mb-3" style="font-family: 'Nunito'; font-size: 50px;";>WE ARE NOW HIRING!</p>
                                    <p class="mt-3 mb-5" style="font-family: 'Nunito'; font-size: 14px;";>“Motorsiklo Sigurado, Alaga Ka Dito” sums up its number one priority — Total Customer Satisfaction is what we always guarantee! </p>
                                    <!-- <img class="logo-topbar-2 img-fluid" src="img/banner-1.png"> -->
         
                                    <?php 
                                    if(!isset($_SESSION["username"])){
                                        echo "<a role=\"button\" data-toggle=\"modal\" data-target=\"#jobModal\" class=\"btn btn-warning button-style \"  id=\"gs-btn\" style=\"font-family: 'Nunito'; font-size: 20px;\";>APPLY NOW</a>";
                                    }
                                    else {
                                        //if logged in, welcomes user
                                        $logged_user = $_SESSION["username"];
                                    }
                                    ?>
                                    
                                </div>

                                <!-- # of statistics start -->         
                                <div class="form-row col-lg-6">
                                    
                                <div class="col-xl-4 col-md-8 mb-4 mr-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Job Openings</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo  $rec_cnt;?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-5 col-md-12 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Total Applicants</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "$total_no_applicants";?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                 
                                
                                
                                <!-- # of statistics end -->
                                
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- ---------------------landing cover end-------------------------- -->

            <!-- data analytics start  -->


            <!-- data analytics end -->
 
            

            <!-----------------------scripts start-------------------------- -->

            <script src="js/jquery-3.4.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.easing.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <!-----------------------scripts end-------------------------- -->

            <script>
                $(function(){
		            $('#apply_btn').click(function(e){
                        var btn_val = $('#apply_btn').val();
                        console.log(btn_val);
                    });
	            });
            </script>

        </body>

        
</html>