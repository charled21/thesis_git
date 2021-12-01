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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                if($job_status==0){
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
                                        <!-- <div class="col-md-10 col-xs-4 row"> <p class="modal-text mr-2">Don't have an account yet?<p> <a href="register/register.php">Click here</a></div> -->
                                        
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
                $rec_Query = "SELECT b.job_history_id, b.job_city, DATEDIFF(CURDATE(),b.job_date) as datepassed, b.emp_type, c.job_name FROM $ft_tables b JOIN job_req c ON b.job_id = c.job_id WHERE job_status = 0";
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
                                                <form method="POST" action="">
                                                <?php 
                                                while($row = mysqli_fetch_array($result3))
                                                {
                                                    $job_history_id = $row['job_history_id'];
                                                    $city = $row['job_city'];
                                                    $emp_type = $row['emp_type'];
                                                    $date =$row['datepassed'];
                                                    $job_name = $row['job_name'];
                                                    $job_counter++;
                                                    
                                                    echo "<h4 class=\"mb-3\">$job_name</h4>";
                                                    echo "<div class=\"form-row\">";
                                                    echo "<p class=\"ml-2 text-secondary\">$city<p><i class=\"ml-3 fas fa-briefcase text-secondary\"></i> <p class=\"ml-1 text-secondary\">$emp_type </p>";
                                                    echo "</div>";
                                                    echo "<div id=\"job_cnt_div\" class=\"form-row d-flex justify-content-between\">";
                                                    echo "<p class=\"ml-2 text-secondary\">Over $date day(s) ago</p>";
                                                    echo "<button type=\"submit\" class=\"apply_btn mr-4 btn btn-info\" data-id=\"$job_history_id\">Apply</button>";
                                                    
                                                    echo "</div>";
                                                    echo "<hr>";


                                                }

                                                echo "<input type=\"text\" id=\"passed_id\" name=\"passed_id\" value=$job_history_id hidden>";
                                                
                                                ?>
                                                </form>
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
                <header id="header" class="fixed-top">

                    <div class="container d-flex align-items-center">
                        <div class="col-lg-12 col-md-6">
                        <nav class="navbar navbar-expand-md">
                            <div class="row">
                                <!-- <a class="navbar-main"href="#">HRIS</a>
                                <a id="nav-main"href="#">-SUBSYS</a> -->
                                <img class="logo-topbar" src="img/logo-2.png">
                            </div>
                                <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#collapse-items" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                            <div class="collapse navbar-collapse" id="collapse-items">
                                <ul class="col-md-6">
                                
                                </ul>
                                
                                <?php 
                                if(!isset($_SESSION["username"])){
                                    echo "<ul class=\"col-md-6 navbar-nav m-0 ml-lg-auto p-3 p-lg-0 justify-content-between\" >";

                                    echo "<li>
                                    <a class=\"nav-link\" href=\"https://motortrade.com.ph/about-us/\" id=\"abt-btn\">ABOUT</a>
                                    </li>";
                                    echo "<li>
                                    <a class=\"nav-link\" href=\"https://www.facebook.com/pages/category/Product-Service/Motortrade-Butuan-Montilla-2503337789690685/\" id=\"srv-btn\">PRODUCT</a>
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
                                    <a class=\"nav-link\" href=\"https://motortrade.com.ph/about-us/\" id=\"abt-btn\">ABOUT</a>
                                    </li>";
                                    echo "<li>
                                    <a class=\"nav-link\" href=\"https://www.facebook.com/pages/category/Product-Service/Motortrade-Butuan-Montilla-2503337789690685/\" id=\"srv-btn\">PRODUCT</a>
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
                <div class="col-lg-12 landingcover-ss parallax" >
                    <div class="container-fluid" >
                        <div class="row landing-container align-items-center center-items" >
                            <!-- <div class="row"> -->
                                <div class="col-md-12 text-center">
                                    <p class="mt-4 mb-3 mid-text">JOIN OUR TEAM!</p>
                                    <p class="mt-3 mb-5 mid-text-sub">“Motorsiklo Sigurado, Alaga Ka Dito” sums up its number one priority. <br> Total Customer Satisfaction is what we always guarantee! </p>
                                    <!-- <img class="logo-topbar-2 img-fluid" src="img/banner-1.png"> -->
         
                                    <?php 
                                    if(!isset($_SESSION["username"])){
                                        echo "<a role=\"button\" data-toggle=\"modal\" data-target=\"#jobModal\" class=\"apply_now\">Apply Now</a>";
                                    }
                                    else {
                                        //if logged in, welcomes user
                                        $logged_user = $_SESSION["username"];
                                    }
                                    ?>
                                    
                                </div>

                                
                                
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- ---------------------landing cover end-------------------------- -->

            <!-- data analytics start  -->


            <!-- data analytics end -->
        
            <!-- # of statistics start -->         
            <div class="form-row col-lg-12" style="height: 35vh; box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.8);">
                                                    
                                    
                                                    <div data-aos="fade-up" class="mt-4 col mr-2 text-center">
                                                        <i class="mb-3 fas fa-users fa-3x"></i>
                                                        <div class="h5 text-xs font-weight-bold text-info  mb-3">
                                                        Average Applicants Per Job</div>
                                                        <!-- <div class="h5 mb-0 font-weight-bold text-gray-800 count-up">php echo "$total_no_applicants";?></div> -->
                                                        <div class="h2 mb-0 font-weight-bold text-gray-800 count-up">8</div>
                                                    </div>

                                                    <div data-aos="fade-up" class="mt-4 col mr-2 text-center">
                                                        <i class="mb-3 fas fa-wrench fa-3x"></i>
                                                        <div class="h5 text-xs font-weight-bold text-secondary  mb-3">
                                                        Service Shops Nationwide</div>
                                                        <!-- <div class="h5 mb-0 font-weight-bold text-gray-800 count-up"></div> -->
                                                        <div class="h2 mb-0 font-weight-bold text-gray-800 count-up">380</div>
                                                    </div>

                                                    <div data-aos="fade-up" class="mt-4 col mr-2 text-center">
                                                        <i class="mb-3 fas fa-briefcase fa-3x"></i>
                                                        <div class="h5 text-xs font-weight-bold text-success  mb-3">
                                                        Local Job Openings</div>
                                                        <div class="h2 mb-0 font-weight-bold text-gray-800 count-up"><?php  echo  $completed_jobs;?></div>
                                                    </div>

                                                    <div data-aos="fade-up" class="mt-4 col mr-2 text-center ">
                                                        <i class="mb-3 fas fa-building fa-3x"></i>
                                                        <div class="h5 font-weight-bold text-danger  mb-3">
                                                        Dealer Branches Nationwide</div>
                                                        <!-- <div class="h5 mb-0 font-weight-bold text-gray-800 count-up"></div> -->
                                                        <div class="h2 mb-0 font-weight-bold text-gray-800 count-up">500</div>
                                                    </div>
                                    
                                    <!-- # of statistics end -->

            </div>

            <div class="parallax_2" style="height:60vh; background-color: blue;"></div>
 
            

            <!-----------------------scripts start-------------------------- -->
            <script src="/thesis_git/vendor/jquery/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <!-----------------------scripts end-------------------------- -->

            <script>
            AOS.init();
            </script>

            <script>
                $(function(){
		            $('.apply_btn').click(function(e){
                        var passed_id = $(this).data('id');   
                        var page_num = 0;
                        $.ajax({
                            type: 'POST',
                            url: "applicant/tools/session-tool.php",
                            data: {passed_id : passed_id , page_num : page_num},
                            success: function(data){
                                window.location.href = "applicant/applicant-page1.php";
                            },
                            error: function(data){
                            alert('Error!');
                            }
                        });
                    
                    
                    });
	            });
            </script>
            <script>
                // Y axis scroll speed
                var velocity = 0.5;

                function update(){ 
                    var pos = $(window).scrollTop(); 
                    $('#header').each(function() { 
                        var header_elem = $(this);
                        
                        if(pos > 100 ){
                            $(this).css('height','80px');
                            $(this).css('background-color','blue');
                            $(this).css('box-shadow','0px 0px 30px rgba(58, 63, 73, 0.8)');
                        }
                        else{
                            $(this).css('height','80px');
                            $(this).css('background-color','transparent');
                            $(this).css('box-shadow','0px 0px 30px rgba(127, 137, 161, 0.0)');
                        }
                        
                    }); 
                };
                

                $(window).bind('scroll', update);
            </script>

            <script>
                $(function(){
                
                    $('.count-up').each(function () {
                    var $this = $(this);
                    jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
                        duration: 2500,
                        easing: 'swing',
                        step: function () {
                        $this.text(Math.ceil(this.Counter));
                        }
                    });
                    });
                
            });
                
            </script>

        </body>

        
</html>