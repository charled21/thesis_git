<?php  
session_start();
$logged_user = $_SESSION['username'];
//var_dump($_SESSION);

if(isset($logged_user)==null){
  header("Location: main.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rusty Devs | Dashboard</title> -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

            <title>HRIS Subsystem</title>
    

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="css/main.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    

<!-- <link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->

</head>
<body>

            

 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="main.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">HRIS SUBSYSTEM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link text-center" href="userpanel.php">
            <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
            <span>Guestpanel</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        <!-- Interface -->
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        
        <a class="nav-link collapsed" href="userpanel.php" 
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Statistics</span>
        </a>
    </li>

    <li class="nav-item">
        
        <a class="nav-link collapsed" href="accounts/qa-init.php" 
            aria-expanded="true" aria-controls="collapseTwo" target="accounts_iframe">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Questionnaire</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" 
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-save"></i>
            <span>Export to CSV</span>
        </a>
       
    </li>

    
    
    <hr class="sidebar-divider d-none d-md-block">

    

    

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

        

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- <i class="fas fa-bell fa-fw"></i> -->
                        <!-- Counter - Alerts -->
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 12, 2019</div>
                                <span class="font-weight-bold">A new monthly report is ready to download!</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-donate text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 7, 2019</div>
                                $290.29 has been deposited into your account!
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 2, 2019</div>
                                Spending Alert: We've noticed unusually high spending for your account.
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </li>

                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                    alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                    problem I've been having.</div>
                                <div class="small text-gray-500">Emily Fowler · 58m</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                    alt="...">
                                <div class="status-indicator"></div>
                            </div>
                            <div>
                                <div class="text-truncate">I have the photos that you ordered last month, how
                                    would you like them sent to you?</div>
                                <div class="small text-gray-500">Jae Chun · 1d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                    alt="...">
                                <div class="status-indicator bg-warning"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Last month's report looks great, I am very happy with
                                    the progress so far, keep up the good work!</div>
                                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                    alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                    told me that people say this to all dogs, even if they aren't good...</div>
                                <div class="small text-gray-500">Chicken the Dog · 2w</div>
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        <?php 
                        echo "<div class=\"col-sm-12 minimal-text \"> $logged_user </div>";
                        ?> 
                        </span>

                        <!-- <div class="dropdown">
                          <div class="justify-content-between">
                          <button class="thumbnail-pic ml-3"></button>
                          </div>
                        
                            
                        </div> -->

                        
                        <img class="dropdown img-profile rounded-circle"
                            src="img/undraw_profile.svg">
                          
                    </a>

                    <div class="dropdown-content">
                            
                              <a href="#" class="col-sm-8 manage-acc-button"><p class="logout-text">MANAGE ACCOUNT</p></a>
                              <hr class="mb-1">
                              <a href="php/acct-logout.php" class="col-sm-8 logout-button"><p class="logout-text">LOGOUT</p></a>
                    </div>
                   
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- iframe -->
        <div class="container">
          <div class="pos-f-t ml-12" style="height: 120vh">
          <iframe frameBorder=0 height=100% width=100% src="accounts/accounts-panel.php" name="accounts_iframe">
                          
                          
             </div>                    
          </div>
       <!-- iframe end -->

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

<!-- ########################## old page  #############################3 -->

<!-- <div class="pos-f-t">
  <div class="col-md-12 color-title top-header">
    <div class="row col-sm-12 d-flex justify-content-between">

        <div class="col-sm-4 mt-3 row">
          <h3 class="logo-header-text">HRIS</h3><h3 class="logo-header-text-two">SUB-SYSTEM</h3><p class="logo-header-text-two">&reg;</p>
          </div>

          <div class="col-sm-8  row justify-content-end">
                <div class="column  justify-content-center">
                  
                </div>

            <div class="dropdown">
              <div class="justify-content-between">
              <button class="thumbnail-pic ml-3"></button>
              </div>
            
                <div class="dropdown-content">
                <button class="profile-pic"></button> -->
                <?php 
                //echo "<div class=\"col-sm-12 minimal-text \"> Username: $logged_user </div>";
                ?>
                  <!-- <a href="manageaccounts.php" class="col-sm-10 manage-acc-button">Manage Accounts</a>
                  <hr class="mb-1">
                  <a href="php/acct-logout.php" class="col-sm-10 logout-button"><p class="logout-text">Logout</p></a>
                </div>
            </div>
          </div>
    </div>
  </div>
</div> -->

<!-- <div class="col-md-12 row">
<div class="col-md-2 sidebar-panel row">
        <div class="col-md-2 mr-2">
        
        </div>

        <div class="col-md-1">
        <hr class="mb-2">
        <div class="sidebar-subs"><a class="link-color" href="main.php" style="text-decoration:none;"><p class="ss-text"><br>Home</p></a></div>
        <div class="sidebar-subs"><a class="link-color" href="accounts/accounts-panel.php" style="text-decoration:none;" target="accounts_iframe"><p class="ss-text"><br>Accounts</p></div> -->
        <!-- <div class="sidebar-subs"><a class="link-color" href="accounts/inventory.php" style="text-decoration:none;" target="accounts_iframe"><p class="ss-text"><br>Inventory</p></a></div> -->
        <!-- <div class="sidebar-subs"><a class="link-color" href="accounts/logs.php" style="text-decoration:none;" target="accounts_iframe"><p class="ss-text"><br>Logs</p></a></div>
        <hr class="my-6">
        <div class="sidebar-subs"><a class="link-color" href="accounts/sample1.html" style="text-decoration:none;" target="accounts_iframe"><p class="ss-text"><br>Questionnaire</p></a></div>
        <div class="sidebar-subs"><a class="link-color" href="tools/cpuinserter.php" style="text-decoration:none;" target="accounts_iframe"><p class="ss-text"><br>CPUTools</p></a></div>
        <div class="sidebar-subs"><a class="link-color" href="tools/gpuinserter.php" style="text-decoration:none;" target="accounts_iframe"><p class="ss-text"><br>GPUTools</p></a></div>
        </div>
</div>
        <div class="col-md-10">
          <div class="pos-f-t ml-4" style="height: 100%">
          <iframe frameBorder=0 height=100% width=100% src="accounts/accounts-panel.php" name="accounts_iframe">
                          
                          
             </div>                    
          </div> -->
         
                          
                       
                          
                                 
          
         <!--add php file in include to run-->
         <!-- include "php/history-display.php"; -->
                        



<!-- <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-info p-4">
              <h4 class="text-white">Genres</h4>
              <span class="text-white">Details about certain genres.</span>
            </div>
</div> -->



      <!-- history modal start -->
<!-- <div class="modal fade" id="gameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="gameModalLabel">Bored Are We?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="first-text"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
      </div>
    </div>
  </div>
</div> -->
      <!--  history modal end -->


    
    <!-- <div class="col-sm-4">

      <h3 class="position-absolute text-primary">OPTIONS</h3>
      <hr class="mt-5 mb-0">
      <div class="row justify-content-center">
          <div class="contents_style">
              <div class="mt-5  mx-5 content-boxes" onclick="box1()" id="box1">
              <p id="box1-text">CPU</p>
              </div>
          </div> 
      </div>
      <div class="row justify-content-center">
          <div class="contents_style">
               <div class="mt-5  mx-5 content-boxes" id="box3"></div>
          </div> 
      </div>
    </div> -->

    <!-- <div class="col-sm-4">
      <p class="position-absolute"></p>
      <hr class="mt-5 mb-0">
      <div class="row justify-content-center">
          <div class="contents_style">
            <div class="mt-5  mx-5 content-boxes" id="box2" onclick="box2()">
            <p id="box2-text">Video Card</p></div>
          </div> 
      </div>
      <div class="row justify-content-center">
           <div class="contents_style">
              <div class="mt-5  mx-5 content-boxes" id="box4"></div>
           </div> 
      </div>
    </div> -->
    
 
    <script src="js/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



</body>
</html>