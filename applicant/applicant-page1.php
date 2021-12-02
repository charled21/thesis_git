<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Page 1</title>

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

<?php 
$passed_id = $_SESSION['passed_id'];
?>

<div class="container">




<!-- progressbar start-->

        <div id="mp_bar">  
                    <ul id="mp_prog_bar">  
                        <li class="active" id="step1"> <h5> Personal Information </h5> </li>  
                        <li id="step2"> <h5>  </h5> </li>  
                        <li id="step3"> <h5>  </h5> </li>  
                        <li id="step4"> <h5>  </h5> </li>  
                    </ul>  
        </div> 
        <hr class="mb-4">

        

<!-- progressbar end -->



<!-- <div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div> -->

            <!-- <div class="embed-responsive embed-responsive-16by9" style="height: 100vh">
            <iframe class="embed-responsive-item" src="applicant-cv.php" name="applicant_iframe" allowfullscreen></iframe>
            </div> -->

            <div class="container">

<form class="needs-validation" action="" method="POST">
<h3><strong>Personal Information</strong></h3>
<input type="text" class="form-control" id="job_history_id" value="<?php echo "$passed_id";?>" hidden>
<div class="mb-4"></div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="firstName">Firstname</label>
      <input type="text" class="form-control" id="fname" placeholder="Firstname" required>
    </div>
    <div class="form-group col-md-3">
      <label for="middleName">Middlename</label>
      <input type="text" class="form-control" id="mname" name="mname" placeholder="Middlename" required>
    </div>
    <div class="form-group col-md-4">
      <label for="lastName">Lastname</label>
      <input type="text" class="form-control" id="lname" name="lname" placeholder="Lastname" required>
    </div>
    <!-- <div class="form-group col-md-1">
      <label for="suffix">Suffix</label>
      <input type="text" class="form-control" id="suffix" placeholder="Jr,Sr, etc.">
    </div> -->
  </div>


  <div class="form-row">
    <div class="form-group col-md-3">
    <label for="inputGender">Gender</label>
      <select id="gender" name="gender" class="form-control" required>
        <option selected>Choose Gender</option>
        <option>Male</option>
        <option>Female</option>
        <option>Others</option>
      </select>
    </div>
    <div class="form-group col-md-8 ml-4">  
    <label for="birthday">Birthday</label>
      <div class="form-group row">
        <select id="month" name="month" data-flip="false" class="form-control col-sm-4" required></select>									
        <select id="day"  name="day" class="form-control col-sm-2 ml-1" required></select>
        <select id="year"  name="year" data-flip="false" class="form-control col-sm-3 ml-1" required></select> 
      </div>
    </div>
   
  
  </div>


  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="address1" name="address1" placeholder="Street / Block No." required>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment, studio, or floor" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
    <label for="inputCity">City</label>
      <select id="city" name="city" class="form-control" required>
        <option selected>Choose City</option>
        <option data-zip="8600" data-state="Agusan del Norte" value="Butuan City" >Butuan City</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="state" name="state" class="form-control" required>
        <option selected>Choose State</option>
        <option>Agusan del Norte</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip" >Zip</label>
      <input type="text" class="form-control" id="zip" name="zip" placeholder="ex: 8800" required>
    </div>
  </div>
  
  <hr>
  <div style="height: 30px;"></div>
  <!-- <a href="applicant-page2.php" role="button" class="btn btn-primary">Submit</a> -->
  <button type="submit" class="btn btn-primary" id="sub_btn" data-id=<?php echo $passed_id ?>>Submit</button>
</form>

    
</div>

<hr>
<!-- <a href="/thesis_git/main.php" class="btn btn-danger" role="button">BACK</a>
<a href="applicant-page2.php" class="btn btn-info" role="button">PROCEED</a> -->

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

      $("#city").change(function () {
      city_z = $(this).children(':selected').data('zip');
      city_state = $(this).children(':selected').data('state');
      //console.log(city_z);
     
      $("#zip").val(city_z);   
      $("#zip").prop('disabled',true);
      $("#state").val(city_state);  
      $("#state").prop('disabled',true);  
      });

   
		$('#done').click(function(e){
				var month = $('#month').val();
				var day = $('#day').val();
				var year = $('#year').val();
				alert(month+"-"+day+"-"+year);
		});
	});
</script>

<script type="text/javascript" src="/thesis_git/js/calendar-reg.js"></script>

<script type="text/javascript">
	$(function(){
		$('#sub_btn').click(function(e){

			var valid = this.form.checkValidity();
			if(valid){

        passed_id = $('#sub_btn').data('id');
				fname = $('#fname').val();
				mname = $('#mname').val();
        lname = $('#lname').val();

        gender = $('#gender').val();

        month = $('#month').val();
        day = $('#day').val();
        year = $('#year').val();

        address1 = $('#address1').val();
        address2 = $('#address2').val();

        city = $('#city').val();
        state = $('#state').val();
        zip = $('#zip').val();
        page_num = 1;
        
        console.log(passed_id);

				e.preventDefault();


				$.ajax({
					type: 'POST',
					url: "tools/session-tool.php",
					data: {fname: fname, mname: mname, lname: lname, gender : gender, month : month, day : day, year : year, address1 : address1, address2: address2, city: city, state: state, zip: zip, page_num : page_num},
					success: function(data){
						//console.log("data= "+data);
            alert('Successful - Proceed to Next Step!');
					},
					error: function(data){
            alert('Error in session ajax - page 1');
					}
				});

        $.ajax({
					type: 'POST',
					url: "reg-process.php",
					data: {fname: fname, mname: mname, lname: lname, gender : gender, month : month, day : day, year : year, address1 : address1, address2: address2, city: city, state: state, zip: zip, page_num : page_num, passed_id : passed_id},
					success: function(data){
						//console.log("data= "+data);
					},
					error: function(data){
            alert('Error in reg-process ajax - page 1');
            console.log(data);
					}
				});


				//test if true displays all data from fields-----tester
				//alert('true');
				//alert(firstname+lastname+course);
        
				//$("form").trigger("reset");
                window.location.href = "/thesis_git/applicant/applicant-page2.php";
			}
			else{
        
			}
		});
	});
</script>

</body>
</html>