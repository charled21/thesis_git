<?php  
session_start();
$logged_user = $_SESSION['username'];
$priv = $_SESSION['acct_priv'];

//var_dump($_SESSION);

if(isset($logged_user)==null){
  header("Location: main.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
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
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    

<!-- <link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->

</head>
<body>

            

 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Sidebar -->
<?php 
$ft_tables="job_history";
$rec_Table = "applicant_details";
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";
$app_stat_cnt=0;
$rec_cnt=0;

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$inboxQuery = "SELECT applicant_id, app_status FROM $rec_Table";
$rec_Query = "SELECT job_history_id FROM $ft_tables WHERE job_status < 1";
$result3 = mysqli_query($connect, $rec_Query);
$inbx = mysqli_query($connect, $inboxQuery);
while($row2 = mysqli_fetch_array($inbx))
{
    
    $app_stat = $row2['app_status'];
    if($app_stat<4){
        $app_stat_cnt++;
    }
    
}
while($row = mysqli_fetch_array($result3))
{
    if($row['job_history_id']!=null){
        $rec_cnt++;
    }
    //$rec_cnt = $row['job_history_id'];
}
?>

    <?php 
    if($priv>5){
    echo"<ul class=\"navbar-nav bg-gradient-primary sidebar sidebar-dark accordion\" id=\"accordionSidebar\">";
    }
    else{
    echo "<ul class=\"navbar-nav bg-gradient-success sidebar sidebar-dark accordion\" id=\"accordionSidebar\">";
    }
    ?>

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
            <span>Userpanel</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        <!-- Interface -->
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="php/inbox.php" 
            aria-expanded="true" aria-controls="collapseInbox" target="accounts_iframe">
            <i class="fas fa-fw fa-inbox">
            </i>
            
            
            <span>Inbox</span>
            <span class="badge badge-pill badge-danger" ><?php echo $app_stat_cnt;?></span> 
            
            
            
        </a>
        
       
    </li>
    

    <li class="nav-item">
        
        <a class="nav-link collapsed" href="userpanel.php" 
            aria-expanded="true" aria-controls="collapseStatistics">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Analytics</span>
        </a>
    </li>


    <li class="nav-item">
                <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfiles"
                    aria-expanded="true" aria-controls="collapseProfiles"> -->
                <a class="nav-link collapsed" href="hr/recruit.php" target="accounts_iframe"  data-target="#collapseProfiles"
                    aria-expanded="true" aria-controls="collapseProfiles">
                <!-- <a class="nav-link collapsed" href="#" >
                    <i class="fas fa-fw fa-user"></i> -->
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Recruitment</span>
                    <span class="badge badge-pill badge-danger"><?php  echo  $rec_cnt;?></span> 
                </a>
                <!-- <div id="collapseProfiles" class="collapse" aria-labelledby="headingProfiles"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="applicant\applicant-profiles.php" target="accounts_iframe">Profiles</a>
                        <a class="collapse-item" href="#">Evaluation</a>
                    </div>
                </div> -->
            </li>

    <li class="nav-item">
        
        <a class="nav-link collapsed" href="applicant\applicant-profiles.php" target="accounts_iframe" 
            aria-expanded="true" aria-controls="collapseStatistics">
            <i class="fas fa-fw fa-user"></i>
            <span>Personnel</span>
        </a>
    </li>



    <!-- <li class="nav-item">
        
        <a class="nav-link collapsed" href="accounts/qa-init.php" 
            aria-expanded="true" aria-controls="collapseQuestion" target="accounts_iframe">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Questionnaire</span>
        </a>
    </li> -->


    <!-- questionnaire tab start  -->
    <!-- <li class="nav-item">
                <a class="nav-link collapsed"href="#" data-toggle="collapse" data-target="#collapseQuestion"
                    aria-expanded="true" aria-controls="collapseQuestion">
                    <i class="fas fa-fw fa-wrench"></i>

                    <span>Questionnaire</span>
                </a>
                
                <div id="collapseQuestion" class="collapse" aria-labelledby="headingQuestion"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Question Management</a>
                        <a class="collapse-item" href="#">Question Builder</a>
                    </div>
                </div>

    </li> -->
    <!-- questionnaire tab end  -->

    <!-- Nav Item - Utilities Collapse Menu -->

    <?php 
    if($priv<10){
    
    }
    else{
      echo "  <li class=\"nav-item\">";
      echo "  <a class=\"nav-link collapsed\" href=\"php/csv-export.php\" 
            aria-expanded=\"true\" aria-controls=\"collapseExport\" target=\"accounts_iframe\">
            <i class=\"fas fa-fw fa-save\"></i>
            <span>CSV Export</span>
            </a> ";
       
    echo "</li>";

    echo "<li class=\"nav-item\">";
    echo "    <a class=\"nav-link collapsed\" href=\"hr/gmail-send2.php\" 
            aria-expanded=\"true\" aria-controls=\"collapseExport\" target=\"accounts_iframe\">
            <i class=\"fas fa-fw fa-envelope-open-text\"></i>
            <span>Send Email</span>
        </a> ";
       
    echo "</li>";
    }
    ?>

    

   

    

    
    
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

        <div class="embed-responsive embed-responsive-16by9" style="height: 80vh">
        <iframe class="embed-responsive-item" src="accounts/accounts-panel.php" name="accounts_iframe" allowfullscreen></iframe>
        </div>


        <!-- <div class="container">
          <div class="pos-f-t ml-12" style="height: 120vh">
          <iframe frameBorder=0 height=100% width=100% src="accounts/accounts-panel.php" name="accounts_iframe">
                          
                          
             </div>                    
          </div> -->
       <!-- iframe end -->

                                       



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
    
 

    <!-- Bootstrap core JavaScript-->
    <script src="/thesis_git/vendor/jquery/jquery.min.js"></script>
    <script src="/thesis_git/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/thesis_git/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/thesis_git/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/thesis_git/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/thesis_git/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/thesis_git/js/demo/datatables-demo.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="/thesis_git/js/demo/chart-area-demo.js"></script>
    <script src="/thesis_git/js/demo/chart-pie-demo.js"></script> -->

   
</body>
</html>