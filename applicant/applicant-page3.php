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

<!-- progressbar end -->
<!-- outside collapse -->
<div class="container mb-4">
  <label>Do you want to add certificate(s)?</label><br>
  <button class="btn btn-info" type="button" id="outside_collapse_btn" data-toggle="collapse" href="#outside_collapse">Yes</button>
  <a href="applicant-page4.php" role="button" type="button" class="btn btn-danger" id="skip_btn" >Skip</a>
</div>

<div class="container collapse" id="outside_collapse">

<form action="" method="post" enctype="multipart/form-data">


        <div>
        <label for="files">Select file: </label>
        <input id="files" type="file" multiple/>
      <button type="button" id="clear">Clear</button>
        <output id="result" >
        </div>

        <div>
        <a role="button" class="btn btn-primary" type="submit" id="upload_all">Upload</a>
        </div>
        
</form>

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

    
    <script>
      window.onload = function(){   
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        $('#files').on("change", function(event) {
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            for(var i = 0; i< files.length; i++)
            {
                
                var file = files[i];
                //file_data = $('#files').prop('files')[i];
                


                //Only pics
                // if(!file.type.match('image'))
                if(file.type.match('image.*')){
                    if(this.files[0].size < 2097152){    
                  // continue;
                    var picReader = new FileReader();
                    picReader.addEventListener("load",function(event){
                        var picFile = event.target;
                        var div = document.createElement("div");
                        div.innerHTML = "<img style='height: 140px; width: 140px;' class='thumbnail' src='" + picFile.result + "'" +
                                "title='preview image'/>";
                        output.insertBefore(div,null);            
                    });
                    //Read the image
                    $('#clear, #result').show();
                    picReader.readAsDataURL(file);
                    }else{
                        alert("Image Size is too big. Minimum size is 2MB.");
                        $(this).val("");
                    }
                }else{
                alert("You can only upload image file.");
                $(this).val("");
            }
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}

   $('#upload_all').on("click", function() {
              // file_data = $('#files').prop('files')[0];
              // form_data = new FormData();
              // form_data.append("img_file", file_data);

              file_data = $('#files').prop('files')[0];
              form_data = new FormData();
              form_data.append("img_file", file_data);

                

                    $.ajax({
                    url: 'upload.php',
                    type: 'POST',
                    data: form_data,
                    async: false,
                    success: function (data) {
                        console.log("data="+data);
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                    });
                
        // $('.thumbnail').parent().remove();
        // $('result').hide();
        // $(this).val("");
    });

    $('#clear').on("click", function() {
        $('.thumbnail').parent().remove();
        $('#result').hide();
        $('#files').val("");
        $(this).hide();
    });

    </script>
    

</body>
</html>