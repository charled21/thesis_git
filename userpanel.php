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
$accts_Table = "login_accounts";
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";
$app_stat_cnt=0;
$rec_cnt=0;

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$acctQuery = "SELECT email_acct,acct_priv FROM $accts_Table WHERE username = '$logged_user'";
$accts = mysqli_query($connect, $acctQuery);
while($accts_row = mysqli_fetch_array($accts))
        {
            $admin_email = $accts_row['email_acct'];
            $admin_priv = $accts_row['acct_priv'];
            if($admin_priv>9){
              $admin_priv = "Admin";
            }
            else if($admin_priv>5 && $admin_priv<10){
              $admin_priv = "Manager";
            }
            else{
              $admin_priv = "HR Personnel";
            }
        }

$inboxQuery = "SELECT applicant_id, app_status FROM $rec_Table";
$rec_Query = "SELECT job_history_id FROM $ft_tables WHERE job_status < 1";
$result3 = mysqli_query($connect, $rec_Query);
$inbx = mysqli_query($connect, $inboxQuery);
while($row2 = mysqli_fetch_array($inbx))
{
    
    $app_stat = $row2['app_status'];
    if($app_stat<4 && $app_stat>0){
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
    //   echo "  <li class=\"nav-item\">";
    //   echo "  <a class=\"nav-link collapsed\" href=\"php/csv-export.php\" 
    //         aria-expanded=\"true\" aria-controls=\"collapseExport\" target=\"accounts_iframe\">
    //         <i class=\"fas fa-fw fa-save\"></i>
    //         <span>CSV Export</span>
    //         </a> ";
       
    // echo "</li>";

    // echo "<li class=\"nav-item\">";
    // echo "    <a class=\"nav-link collapsed\" href=\"hr/gmail-send2.php\" 
    //         aria-expanded=\"true\" aria-controls=\"collapseExport\" target=\"accounts_iframe\">
    //         <i class=\"fas fa-fw fa-envelope-open-text\"></i>
    //         <span>Send Email</span>
    //     </a> ";
       
    // echo "</li>";

    echo "<li class=\"nav-item\">";
    echo "    <a class=\"nav-link collapsed\" href=\"hr/add-acct.php\" 
            aria-expanded=\"true\" aria-controls=\"collapseExport\" target=\"accounts_iframe\">
            <i class=\"fas fa-users\"></i>
            <span>Accounts</span>
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


                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        <?php 
                        echo "<div class=\"col-sm-12 minimal-text \"> $logged_user </div>";
                        ?> 
                        </span>


                        
                        <img class="dropdown img-profile rounded-circle"
                            src="img/undraw_profile_1.svg">
                          
                    </a>

                    <div class="dropdown-content">
                            
                              <a href="#" id="manage_accts" class="col-sm-8 manage-acc-button" data-toggle="modal" data-target="#manage_accounts"><p class="logout-text">MANAGE ACCOUNT</p></a>
                              <hr class="mb-1">
                              <a href="php/acct-logout.php" class="col-sm-8 logout-button"><p class="logout-text">LOGOUT</p></a>
                    </div>
                   
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- iframe -->

        <div class="embed-responsive embed-responsive-16by9" style="height: 80vh">
        <iframe class="embed-responsive-item" src="accounts/accounts-panel.php" name="accounts_iframe" id="accounts_iframe" allowfullscreen></iframe>
        </div>

        
<!-- Modal -->
<div class="modal fade" id="manage_accounts" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-white" id="job_modal_label">Change Details</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close"></a>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


<div class="modal-body">

<form action="" method="POST">

    <div class="form-row">
        <div class="form-group col-md-10">
        <label>Username</label>
            <input type="text" class="form-control" id="chng_user" value="<?php echo "$logged_user"; ?>" disabled>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-10">
        <label>Email</label>
            <input type="email" class="form-control" id="chng_email"  value="<?php echo "$admin_email"; ?>">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-10">
        <label>New Password</label>
            <input type="password" class="form-control" id="chng_pass" placeholder="*********">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-10">
        <label>Confirm New Password</label>
            <input type="password" class="form-control" id="chng_pass2" placeholder="*********">
        </div>
    </div>

    

    <div class="form-row">
    <div class="form-group col-md-10">
    <label>Privilege</label>
    <input type="text" class="form-control" id="chng_priv" value="<?php echo "$admin_priv"; ?>" disabled>
    </div>
    </div>


    <a type="button" class="btn btn-danger" type="submit" id="change_pass">Change</a>

  
</form>

    
</div>
      </div>
    </div>
  </div>
</div>
<!-- modal end-->
        

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

    <script type="text/javascript">
	$(function(){
		$('#change_pass').click(function(e){
      
      
        chng_user = $('#chng_user').val();
        chng_pass = $('#chng_pass').val();
        chng_pass2 = $('#chng_pass2').val();
        chng_email = $('#chng_email').val();
        chng_priv = $('#chng_priv').val();
        

        e.preventDefault();

        //console.log(chng_user +""+ chng_pass +""+ chng_pass2 +""+ chng_priv);

				$.ajax({
					type: 'POST',
					url: "hr/admin-change-pass.php",
					data: {chng_user : chng_user, chng_pass : chng_pass, chng_pass2 : chng_pass2, chng_email : chng_email, chng_priv : chng_priv},
					success: function(data){
            setTimeout(function(){ location.reload(); }, 1000);
					},
					error: function(data){
						alert('Error!');
					}
				});

      
			
		});
	});
</script>
   
</body>
</html>