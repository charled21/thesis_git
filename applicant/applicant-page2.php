<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Page 2</title>

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
$rec_Table = "applicant_details";
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$last_id_query = "SELECT applicant_id FROM $rec_Table WHERE app_status < 4 ORDER BY applicant_id DESC LIMIT 1;";
$result3 = mysqli_query($connect, $last_id_query);
while($last_id_row = mysqli_fetch_array($result3))
{
    
    $recent_id = $last_id_row['applicant_id'];
}
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
                        <li id="step3"> <h5>  </h5> </li>  
                        <li id="step4"> <h5>  </h5> </li>  
                    </ul>  
        </div> 


<!-- progressbar end -->

<!-- <div class="embed-responsive embed-responsive-16by9" style="height: 25vh">
        <iframe class="embed-responsive-item" src="upload-prof.php" name="accounts_iframe" id="accounts_iframe" allowfullscreen></iframe>
        </div> -->

<!-- upload picture -->

<div class="container mb-4">
  <button class="btn btn-success" type="button" id="prof_pic" data-toggle="collapse" href="#prof_pic_collapse">Add Profile Picture</button>
</div>

<!-- collapse -->
<div class="container collapse" id="prof_pic_collapse">

<form action="" method="post" enctype="multipart/form-data">
  Select image:
  <input class="btn btn-info" type="file" name="img_file" id="img_file" onchange="preview(this);">


<div class="container" id="img_content">
  <img id="img_prev" src="#" alt="profile_pic_preview" style="height: 140px; width: 140px;" hidden />
</div>

</div>

</form>

<!-- upload picture end -->


        

<!-- collapse -->

<hr>
<form action="" method="post">

<div class="container">
  <input type="text" class="form-control" id="recent_id" name="recent_id" value="<?php echo $recent_id; ?>" hidden>

  


<div class="form-row">
    <div class="form-group col-md-4">
    <label>Highest Educational Attainment</label>
      <select id="educ_attain" name="educ_attain" class="form-control" required>
        <option selected>Choose Option</option>
        <option value="7">Doctorate</option>
        <option value="6">Masters Degree</option>
        <option value="5">Bachelors Degree</option>
        <option value="4">Technical Vocational</option>
        <option value="3">College Level</option>
        <option value="2">High School Graduate</option>
        <option value="1">Elementary Graduate</option>
      </select>
    </div>
    <div class="form-group col-md-4">
    <label>Educational Achievement</label>
      <select id="educ_attain_deg" name="educ_attain_deg" class="form-control" required>
        <option selected>Choose Achievement</option>
        <option value="4">Summa Cum Laude</option>
        <option value="3">Magna Cum Laude</option>
        <option value="2">Cum Laude</option>
        <option value="1">None</option>
      </select>
    </div>

</div>

<div class="form-row">
    <div class="form-group col-md-4">
      <label>University / School</label>
      <input type="text" class="form-control" id="univ" name="univ"  required>
    </div>
    <div class="form-group col-md-4">
      <label>Year Graduated</label>
      <input type="text" class="form-control" id="yr_grad" name="yr_grad" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
      <label>Secondary Education</label>
      <input type="text" class="form-control" id="hs" required>
    </div>
    <div class="form-group col-md-4">
      <label>Year Graduated</label>
      <input type="text" class="form-control" id="yr_grad_2" name="yr_grad_2"  required>
    </div>
</div>

<hr class="mb-4 mt-4">

<h5>Contact Details</h5>
<div class="form-row">
    <div class="form-group col-md-3">
      <label>Telephone / Landline</label>
      <input type="text" class="form-control" id="landline"  required>
    </div>
    <div class="form-group col-md-3">
      <label>Cellphone / Mobile No.</label>
      <input type="text" class="form-control" id="mobile" name="mobile" required>
    </div>
    <div class="form-group col-md-3">
      <label>Email</label>
      <input type="email" class="form-control" id="email" name="email"  required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
    <label>Civil Status</label>
      <select id="civil" name="civil" class="form-control" required>
        <option selected>Choose Civil Status</option>
        <option value="1">Single</option>
        <option value="2">Married</option>
        <option value="3">Divorced</option>
        <option value="4">Widowed</option>
      </select>
    </div>
    <div class="form-group col-md-3">
    <label>Citizenship</label>
      <select id="citizen" name="citizen" class="form-control" required>
        <option selected>Choose Citizenship</option>
        <option value="1">Filipino</option>
        <option value="2">Others</option>
      </select>
    </div>
    <div class="form-group col-md-3">
    <label>Religion</label>
      <select id="religion" name="religion" class="form-control" required>
        <option selected>Choose Religion</option>
        <option value="1">Roman Catholic</option>
        <option value="2">Born Again Christian</option>
        <option value="3">Protestant</option>
        <option value="4">Islam</option>
      </select>
    </div>
</div>



</div>

<a href="applicant-page1.php" class="btn btn-danger" role="button">BACK</a>
<a href="#" class="btn btn-success" role="button" id="sub_btn">SUBMIT</a>
</form>


<hr>




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

    <script type="text/javascript">

$(function(){
		$('#sub_btn').click(function(e){
        file_data = $('#img_file').prop('files')[0];
        form_data = new FormData();
        form_data.append("img_file", file_data);

        //alert(form_data);

        educ_attain = $('#educ_attain').val();
        educ_attain_deg = $('#educ_attain_deg').val();
        univ = $('#univ').val();
        yr_grad = $('#yr_grad').val();
        hs = $('#hs').val();
        yr_grad_2 = $('#yr_grad_2').val();
        landline = $('#landline').val();
        mobile = $('#mobile').val();
        email = $('#email').val();
        civil = $('#civil').val();
        citizen = $('#citizen').val();
        religion = $('#religion').val();
        page_num = 2;

        

        //console.log(recent_id +educ_attain + educ_attain_deg + univ + yr_grad + hs + yr_grad_2 + landline + mobile + email + civil + citizen + religion);
				
				e.preventDefault();
        
				$.ajax({
					type: 'POST',
					url: "tools/session-tool.php",
					data: {educ_attain : educ_attain, educ_attain_deg : educ_attain_deg , univ : univ, yr_grad : yr_grad, hs : hs, yr_grad_2 : yr_grad_2, landline : landline, mobile : mobile, email : email, civil : civil, citizen : citizen, religion : religion, page_num : page_num},
					success: function(data){
            console.log(data);
                    alert('Successful - Proceed to Next Step!');
					},
					error: function(data){
						alert('Error!');
					}
				});


        $.ajax({
        url: 'prof-pic-upload.php',
        type: 'POST',
        data: form_data,
        async: false,
        success: function (data) {
            console.log(data);
        },
        cache: false,
        contentType: false,
        processData: false
        });

				$("form").trigger("reset");
                window.location.href = "/thesis_git/applicant/applicant-page3.php";
		});

    
	});

    </script>

    <script>
      $('#upload_img').click(function(e){
      
    });
    </script>

    <script>
      function preview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $("#img_prev").prop('hidden',false);
            reader.onload = function (e) {
                $('#img_prev').attr('src', e.target.result);
                
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>


</body>
</html>