<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant CV</title>

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
    

<!-- Topbar -->
<!-- <nav class="navbar navbar-expand navbar-primary bg-white topbar mb-4 static-top shadow"> -->

<!-- <nav style="height: 60px; background: #4169e1;" class="navbar navbar-primary mb-4 static-top shadow">
<img style="height: 80%; width:15%;" src="/thesis1/img/logo-2.png">
</nav> -->
        <!-- End of Topbar -->
        <!-- <div class="col-md-6">
          <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
            aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
              <i class="fas fa-search"></i>
            </span>
          </div>
        </div> -->
        
        <div style="height: 60px;"></div>

<div class="container">

<form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="firstName">Firstname</label>
      <input type="text" class="form-control" id="fname" placeholder="Firstname">
    </div>
    <div class="form-group col-md-3">
      <label for="middleName">Middlename</label>
      <input type="text" class="form-control" id="mname" name="mname" placeholder="Middlename">
    </div>
    <div class="form-group col-md-4">
      <label for="lastName">Lastname</label>
      <input type="text" class="form-control" id="lname" name="lname" placeholder="Lastname">
    </div>
    <!-- <div class="form-group col-md-1">
      <label for="suffix">Suffix</label>
      <input type="text" class="form-control" id="suffix" placeholder="Jr,Sr, etc.">
    </div> -->
  </div>


  <div class="form-row">
    <div class="form-group col-md-3">
    <label for="inputGender">Gender</label>
      <select id="gender" name="gender" class="form-control">
        <option selected>Choose Gender</option>
        <option>Male</option>
        <option>Female</option>
        <option>Others</option>
      </select>
    </div>
    <div class="form-group col-md-8 ml-4">  
    <label for="birthday">Birthday</label>
      <div class="form-group row">
        <select id="month" name="month" data-flip="false" class="form-control col-sm-4"></select>									
        <select id="day"  name="day" class="form-control col-sm-2 ml-1"></select>
        <select id="year"  name="year" data-flip="false" class="form-control col-sm-3 ml-1"></select> 
      </div>
    </div>
   
  
  </div>


  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="address1" name="address1" placeholder="Street / Block No.">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
    <label for="inputCity">City</label>
      <select id="city" name="city" class="form-control">
        <option selected>Choose City</option>
        <option data-zip="8502" value="Bayugan City">Bayugan City</option>
        <option data-zip="8600" value="Butuan City">Butuan City</option>
        <option data-zip="8605" value="Cabadbaran City">Cabadbaran City</option>
        <option data-zip="8400" value="Surigao City">Surigao City</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="state" name="state" class="form-control">
        <option selected>Choose State</option>
        <option>Agusan del Norte</option>
        <option>Agusan del Sur</option>
        <option>Surigao del Norte</option>
        <option>Surigao del Sur</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip" >Zip</label>
      <input type="text" class="form-control" id="zip" name="zip" placeholder="ex: 8600">
    </div>
  </div>
  
  <hr>
  <div style="height: 30px;"></div>
  <button type="submit" class="btn btn-primary" id="reg_btn">Submit</button>
</form>

    
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


<script type="text/javascript">
	$(function(){

      $("#city").change(function () {
      city_z = $(this).children(':selected').data('zip');
      //console.log(city_z);
     
      $("#zip").val(city_z);    
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
		$('#reg_btn').click(function(e){

			var valid = this.form.checkValidity();
			if(valid){

				// fname = $('#fname').val();
				// mname = $('#mname').val();
        // lname = $('#lname').val();

        // gender = $('#gender').val();

        // month = $('#month').val();
        // day = $('#day').val();
        // year = $('#year').val();

        // address1 = $('#address1').val();
        // address2 = $('#address2').val();

        // city = $('#city').val();
        // state = $('#state').val();
        // zip = $('#zip').val();

				// e.preventDefault();


				// $.ajax({
				// 	type: 'POST',
				// 	url: "reg-process.php",
				// 	data: {fname: fname, mname: mname, lname: lname, gender : gender, month : month, day : day, year : year, address1 : address1, address2: address2, city: city, state: state, zip: zip},
				// 	success: function(data){
        //     alert('Registration Successful!');
				// 	},
				// 	error: function(data){
				// 		alert('Error!');
				// 	}
				// });

        
				//test if true displays all data from fields-----tester
				//alert('true');
				//alert(firstname+lastname+course);
				$("form").trigger("reset");
			}
			else{
        
			}
		});
	});
</script>

</body>
</html>