<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Pic</title>

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
    
<div class="container mb-4">
  <button class="btn btn-success" type="button" id="prof_pic" data-toggle="collapse" href="#prof_pic_collapse">Add Profile Picture</button>
</div>

<!-- collapse -->
<div class="container collapse" id="prof_pic_collapse">

<form action="prof-pic-upload.php" method="post" enctype="multipart/form-data">
  Select image:
  <input class="btn btn-info" type="file" name="img_file" id="img_file">
  <input class="btn btn-dark" type="submit" value="Upload Image" name="submit" id="upload_img">
</form>

<div class="container" id="img_content"></div>

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