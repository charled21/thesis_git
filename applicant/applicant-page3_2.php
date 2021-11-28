<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Page 3</title>

    <!-- Custom fonts for this template-->
    <link href="/thesis_git/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="/thesis_git/css/main.css" rel="stylesheet">
    <link href="/thesis_git/css/multistep-process-bar.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/thesis_git/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/thesis_git/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body>
<?php 

$db_tables="images";
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";

$con = mysqli_connect($hostname, $username, $password, $databaseName);

?>
 <!-- Topbar -->
    

 <nav style="height: 100%; width : 100%; background: #4169e1;" class="navbar navbar-primary mb-4 static-top shadow">
<img style="height: 80%; width:15%;" src="/thesis_git/img/logo-2.png">
</nav>

        <!-- End of Topbar -->

<div class="container">

<!-- progressbar start-->

        <div id="mp_bar">  
                    <ul id="mp_prog_bar">  
                        <li class="active" id="step1">  <h5> Personal Information </h5>  </li>  
                        <li class="active" id="step2"> <h5> Educational Attainment </h5> </li>  
                        <li class="active" id="step3"> <h5> Certificates and Seminars </h5> </li>  
                        <li id="step4"> <h5>  </h5> </li>  
                    </ul>  
        </div> 

        <?php print_r($_SESSION);?>
<!-- progressbar end -->
<div class="container mb-4">
  <button class="btn btn-primary" type="button" id="prof_pic" data-toggle="collapse" href="#prof_pic_collapse">Add Certificate</button>
</div>

<!-- collapse -->
<div class="container collapse" id="prof_pic_collapse">

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image:
  <input class="btn btn-success" type="file" name="img_file" id="img_file">
  <input class="btn btn-primary" type="submit" value="Upload Image" name="submit" id="upload_img">
</form>

<div class="container" id="img_content"></div>


<?php 

  ?>

</div>


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
    

</body>
</html>