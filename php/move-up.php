<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Move Up</title>

    <!-- Custom fonts for this template-->
    <link href="/thesis_git/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
 
     <link href="/thesis_git/css/main.css" rel="stylesheet">
 
     <!-- Custom styles for this template-->
     <link href="/thesis_git/css/sb-admin-2.min.css" rel="stylesheet">
     <link href="/thesis_git/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body>

<?php 

$opt = array();
        echo "<script>const result = []; </script>";
        for($x = 1; $x <=60; $x++){
            $opt[$x]=$_POST["opt_" . $x . ""];
            echo "<script> 
            result[$x] = ". $opt[$x]. " </script>";
        }
?>

<div class="d-flex justify-content-between">
    <p id="mind_per">Mind Bar</p>
    <p id="mind_per2">Mind Bar</p>
</div>
<div id="mindBar" class="progress"></div>
<div class="d-flex justify-content-between">
    <p id="ener_per">Energy Bar</p>
    <p id="ener_per2">Energy Bar</p>
</div>
<div id="enerBar" class="progress"></div>
<div class="d-flex justify-content-between">
    <p id="nat_per">Nature Bar</p>
    <p id="nat_per2">Nature Bar</p>
</div>
<div id="natBar" class="progress"></div>
<div class="d-flex justify-content-between">
    <p id="tact_per">Tactics Bar</p>
    <p id="tact_per2">Tactics Bar</p>
</div>
<div id="tactBar" class="progress"></div>

<label for="identBar" hidden>Identity Bar</label>
<div id="identBar" class="progress" hidden></div>

<hr>
<div>
    <h3>PERSONALITY TYPE</h3>
</div>
<div>
    <p>Your personality type is :</p>
    <h4 id="per_result"></h4>
    <a href="/thesis_git/main.php" role="button" class="btn btn-success">Main Page</a>
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

<script type="text/javascript" src="/thesis_git/js/ans-process.js"></script>

</body>
</html>