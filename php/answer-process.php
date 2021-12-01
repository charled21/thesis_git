<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application 1 Process</title>

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

<div style="height: 10vh;"></div>
<div class="text-center">
    <h3>RESULTS PAGE</h3>
    <label>You result has been recorded</label><br>
    <button class="btn btn-success" type="button" id="view_result" data-toggle="collapse" href="#view_result">View Result</button>
</div>




<?php 

$opt = array();
        echo "<script>const result = []; </script>";
        for($x = 1; $x <=60; $x++){
            $opt[$x]=$_POST["opt_" . $x . ""];
            echo "<script> 
            result[$x] = ". $opt[$x]. " </script>";
        }
?>
<div class="container collapse text-center mb-4" id="view_result"> <!-- start of collapse-->

<div class="container col-md-8">

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

</div> <!-- end of progressbar container-->

<div class="container col-md-8 text-center">
<hr>
<div class="mt-4">
    <p>Your personality type is :</p>
    <h3 id="per_result"></h3>
</div>

<div class="mt-4">
    <p class="mb-2">An email will be sent to your email address after your application has been checked and verified by the person-in-charge.</p>
    <h4 class="mt-2 mb-4">Thank you and have a wonderful day!</h4>
</div>

</div>

<a href="/thesis_git/main.php" role="button" class="mt-4 btn btn-danger">Return</a>
    </div>  <!-- end of collapse-->

    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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