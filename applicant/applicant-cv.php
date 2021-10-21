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
        <div class="col-md-6">
          <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
            aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
              <i class="fas fa-search"></i>
            </span>
          </div>
      </div>
        
        <h1 style="text-align: center;" class="mb-4 mt-4">APPLICANT #</h1>
        <div style="height: 20px;"></div>

<div class="container">

<form>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="firstName">Firstname</label>
      <input type="text" class="form-control" id="firstName" placeholder="Firstname">
    </div>
    <div class="form-group col-md-3">
      <label for="middleName">Middlename</label>
      <input type="text" class="form-control" id="middleName" placeholder="Middlename">
    </div>
    <div class="form-group col-md-4">
      <label for="lastName">Lastname</label>
      <input type="text" class="form-control" id="lastName" placeholder="Lastname">
    </div>
    <div class="form-group col-md-1">
      <label for="suffix">Suffix</label>
      <input type="text" class="form-control" id="suffix" placeholder="Jr,Sr, etc.">
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-3">
    <label for="inputGender">Gender</label>
      <select id="inputGender" class="form-control">
        <option selected>Choose Gender</option>
        <option>Male</option>
        <option>Female</option>
        <option>Others</option>
      </select>
    </div>
    <div class="form-group col-md-8 ml-4">  
    <label for="birthday">Birthday</label>
      <div class="form-group row">
        <select id="month" data-flip="false" class="form-control col-sm-4"></select>									
        <select id="day" class="form-control col-sm-2 ml-1"></select>
        <select id="year" data-flip="false" class="form-control col-sm-3 ml-1"></select> 
      </div>
    </div>
   
  
  </div>


  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Street / Block No.">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
    <label for="inputCity">City</label>
      <select id="inputCity" class="form-control">
        <option selected>Choose City</option>
        <option>Bayugan City</option>
        <option>Butuan City</option>
        <option>Cabadbaran City</option>
        <option>Surigao City</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose State</option>
        <option>Agusan del Norte</option>
        <option>Agusan del Sur</option>
        <option>Surigao del Norte</option>
        <option>Surigao del Sur</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" placeholder="ex: 8600">
    </div>
  </div>
  
  <hr>
  <div style="height: 30px;"></div>
  <button type="submit" class="btn btn-primary">Proceed</button>
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
		$('#done').click(function(e){

				var month = $('#month').val();
				var day = $('#day').val();
				var year = $('#year').val();

				alert(month+"-"+day+"-"+year);
			
			
		});

		
	});

</script>



<script type="text/javascript">
	
	$(document).ready(function() {


		const monthNames = ["January", "February", "March", "April", "May", "June",
		  "July", "August", "September", "October", "November", "December"
		];
		
		  var qntYears = 40;
		  var selectYear = $("#year");
		  var selectMonth = $("#month");
		  var selectDay = $("#day");
		  var currentYear = new Date().getFullYear();


		  for (var y = 0; y < qntYears; y++){
			let date = new Date(currentYear);
			var yearElem = document.createElement("option");
			yearElem.value = currentYear 
			yearElem.textContent = currentYear;
			selectYear.append(yearElem);
			currentYear--;
		  } 
		
		  for (var m = 0; m < 12; m++){
			  let monthNum = new Date(2020, m).getMonth()
			  let month = monthNames[monthNum];
			  var monthElem = document.createElement("option");
			  monthElem.value = monthNum; 
			  monthElem.textContent = month;
			  selectMonth.append(monthElem);
			}
		
			var d = new Date();
			var month = d.getMonth();
			var year = d.getFullYear();
			var day = d.getDate();
		
			selectYear.val(year); 
			selectYear.on("change", AdjustDays);  
			selectMonth.val(month);    
			selectMonth.on("change", AdjustDays);
		
			AdjustDays();
			selectDay.val(day)
			
			function AdjustDays(){
			  var year = selectYear.val();
			  var month = parseInt(selectMonth.val());
			  selectDay.empty();
			  
			  if(m==1){
			   	var febDays = new Date(year, month, 28).getDate();

			   	for (var d = 1; d <= febDays; d++){
				 var dayElem = document.createElement("option");
				 dayElem.value = d; 
				 dayElem.textContent = d;
				 selectDay.append(dayElem);
			   	}
			   }

			  var fullDays = new Date(year, month, 0).getDate(); 
			  
			  
			  for (var d = 1; d <= fullDays; d++){
				var dayElem = document.createElement("option");
				dayElem.value = d; 
				dayElem.textContent = d;
				selectDay.append(dayElem);
			  }

			}    
		});
		
		</script>

</body>
</html>