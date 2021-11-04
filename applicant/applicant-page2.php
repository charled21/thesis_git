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

<form action="" method="POST">
<div class="container">

<div class="form-row">
    <div class="form-group col-md-4">
      <label>Educational Attainment</label>
      <input type="text" class="form-control" id="educ_attain" placeholder="ex. College Graduate">
    </div>
    <div class="form-group col-md-4">
      <label>Degree Received</label>
      <input type="text" class="form-control" id="educ_attain_deg" name="educ_attain_deg" placeholder="ex. Cum Laude">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
      <label>University / School</label>
      <input type="text" class="form-control" id="univ" placeholder="ex. Father Saturnino Urios University">
    </div>
    <div class="form-group col-md-4">
      <label>Year Graduated</label>
      <input type="text" class="form-control" id="yr_grad" name="yr_grad_3" placeholder="ex. 1988">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
      <label>Secondary Education</label>
      <input type="text" class="form-control" id="hs" placeholder="ex. Agusan National High School">
    </div>
    <div class="form-group col-md-4">
      <label>Year Graduated</label>
      <input type="text" class="form-control" id="yr_grad_2" name="yr_grad_2" placeholder="ex. 1984">
    </div>
</div>

<hr class="mb-4 mt-4">

<h5>Contact Details</h5>
<div class="form-row">
    <div class="form-group col-md-3">
      <label>Telephone / Landline</label>
      <input type="text" class="form-control" id="landline" placeholder="ex. 341-4111">
    </div>
    <div class="form-group col-md-3">
      <label>Cellphone / Mobile No.</label>
      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="ex. 0999-999-9999">
    </div>
    <div class="form-group col-md-3">
      <label>Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="ex. email@sample.com">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
      <label>Civil Status</label>
      <input type="text" class="form-control" id="civil" placeholder="ex. Married">
    </div>
    <div class="form-group col-md-3">
      <label>Citizenship</label>
      <input type="text" class="form-control" id="citizen" name="citizen" placeholder="ex. Filipino">
    </div>
    <div class="form-group col-md-3">
      <label>Religion</label>
      <input type="text" class="form-control" id="religion" name="religion" placeholder="ex.Roman Catholic">
    </div>
</div>


</div>


</form>


<hr>
<a href="applicant-page1.php" class="btn btn-danger" role="button">BACK</a>
<a href="applicant-page3.php" class="btn btn-success" role="button" id="sub_btn">SUBMIT</a>



</div>

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

    <script>

$(function(){
		$('#sub_btn').click(function(e){

			var valid = this.form.checkValidity();
			if(valid){

				
				e.preventDefault();


				$.ajax({
					type: 'POST',
					url: "reg-process.php",
					data: { info : info},
					success: function(data){

                    alert('Registration Successful!');
					},
					error: function(data){
						alert('Error!');
					}
				});
				$("form").trigger("reset");
                window.location.href = "/thesis_git/applicant/applicant-page3.php";
			}
			else{
        
			}
		});
	});

    </script>


</body>
</html>