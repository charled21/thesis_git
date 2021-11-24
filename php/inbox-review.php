<?php
require_once('db-config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>

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

<!-- debugging start -->

<?php 
//$id =  intval($_POST['tds2']);
//echo "value: $id";
?>

<!-- debugging end -->

<!-- php connect start -->

<?php 
$id =  intval($_POST['tds2']);

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "rusty_db_01";

$fname="";
$mname="";
$lname="";
$gender="";
$birth="";
$address="";
$address2="";
$city="";
$state="";
$zip="";
$bdate_frmt="";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$table_name = "applicant_details";
$applicantQuery = "SELECT * FROM $table_name WHERE applicant_id = $id ";
$result2 = mysqli_query($connect, $applicantQuery);
while($row = mysqli_fetch_array($result2))
    {
        $fname = $row['firstname'];
        $mname = $row['middlename'];
        $lname = $row['lastname'];
        $gender = $row['gender'];
        $birth = $row['dateBirth'];
        $address = $row['address'];
        $address2 = $row['address2'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zipcode'];
    }
    $bdate_sep = sscanf($birth, '%d-%d-%d');

    //birthmonth converter start
    if($bdate_sep[1]==1){
        $bdate_sep[1]='January';
    }
    else if($bdate_sep[1]==2){
        $bdate_sep[1]='February';
    }
    else if($bdate_sep[1]=='3'){
        $bdate_sep[1]='March';
    }
    else if($bdate_sep[1]=='4'){
        $bdate_sep[1]='April';
    }
    else if($bdate_sep[1]==5){
        $bdate_sep[1]='May';
    }
    else if($bdate_sep[1]=='6'){
        $bdate_sep[1]='June';
    }
    else if($bdate_sep[1]=='7'){
        $bdate_sep[1]='July';
    }
    else if($bdate_sep[1]=='8'){
        $bdate_sep[1]='August';
    }
    else if($bdate_sep[1]=='9'){
        $bdate_sep[1]='September';
    }
    else if($bdate_sep[1]==10){
        $bdate_sep[1]='October';
    }
    else if($bdate_sep[1]=='11'){
        $bdate_sep[1]='November';
    }
    else if($bdate_sep[1]=='12'){
        $bdate_sep[1]='December';
    }

    //birthmonth converter end

//debugging
//echo "$fname+$mname+$lname+$gender+$birth+$address+$address2+$city+$state+$zip";
// var_dump ($birth);
// var_dump ($bdate_sep);
// echo $bdate_sep[0];
// echo $bdate_sep[1];
// echo $bdate_sep[2];
//echo $address;

?>

<!-- php connect end -->


        <h1 style="text-align: center;" class="mb-4 mt-4">
            <!-- applicant number display start -->
            <?php 
            echo "Applicant Number: $id";
            ?>
            <!-- applicant number display end -->
        </h1>
        <div style="height: 20px;"></div>

<div class="container">

<form id="review">
  <div class="form-row" >
    <div class="form-group col-md-4">
      <label for="firstName">Firstname</label>
      <input type="text" class="form-control" id="firstName" value="<?php echo $fname;?>" >
    </div>
    <div class="form-group col-md-3">
      <label for="middleName">Middlename</label>
      <input type="text" class="form-control" id="middleName" value="<?php echo $mname;?>" >
    </div>
    <div class="form-group col-md-4">
      <label for="lastName">Lastname</label>
      <input type="text" class="form-control" id="lastName" value="<?php echo $lname;?>" >
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-3">
    <label for="inputGender">Gender</label>
      <select id="inputGender" class="form-control" >
        <option selected><?php echo "$gender";?></option>
      </select>
    </div>
    <div class="form-group col-md-8 ml-4">  
    <label for="birthday">Birthday</label>
      <div class="form-group row">
        <select id="month" data-flip="false" class="form-control col-sm-4" >
            <option selected><?php echo "$bdate_sep[1]";?></option>
        </select>	
        <select id="day" class="form-control col-sm-2 ml-1" >
            <option selected><?php echo "$bdate_sep[2]";?></option></select>
        <select id="year" data-flip="false" class="form-control col-sm-3 ml-1" >
            <option selected><?php echo "$bdate_sep[0]";?></option></select> 
      </div>
    </div>
   
  
  </div>


  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" value="<?php echo "$address";?>" >
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2"  value="<?php echo "$address2";?>" >
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
    <label for="inputCity">City</label>
      <select id="inputCity" class="form-control" >
        <option selected><?php echo "$city";?></option>
        <option>Bayugan City</option>
        <option>Butuan City</option>
        <option>Cabadbaran City</option>
        <option>Surigao City</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected><?php echo "$state";?></option>
        <option>Agusan del Norte</option>
        <option>Agusan del Sur</option>
        <option>Surigao del Norte</option>
        <option>Surigao del Sur</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" placeholder=<?php echo "$zip";?> >
    </div>
  </div>

  
  <hr>
  <div style="height: 30px;"></div>
  
</form>
<!-- <a href="inbox.php" class="btn btn-danger" role="button">Back</a> -->
<!-- <a href="#" class="btn btn-warning" id="edit_button" name="edit_button" role="button">Edit</a> -->
    
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
$(document).ready(function(){
    var input_enabled = false;

            $("#review :input").prop("disabled", true);
            $("#inputGender").prop("disabled", true);
            $("#month").prop("disabled", true);
            $("#day").prop("disabled", true);
            $("#year").prop("disabled", true);
            $("#inputCity").prop("disabled", true);
            $("#inputState").prop("disabled", true);

    $('#edit_button').click(function(){
        if(input_enabled==false){
            input_enabled = true;
            $("#review :input").prop("disabled", false);
            $("#inputGender").prop("disabled", false);
            $("#month").prop("disabled", false);
            $("#day").prop("disabled", false);
            $("#year").prop("disabled", false);
            $("#inputCity").prop("disabled", false);
            $("#inputState").prop("disabled", false);
        }
        else{
            $("#review :input").prop("disabled", true);
            $("#inputGender").prop("disabled", true);
            $("#month").prop("disabled", true);
            $("#day").prop("disabled", true);
            $("#year").prop("disabled", true);
            $("#inputCity").prop("disabled", true);
            $("#inputState").prop("disabled", true);
            input_enabled = false;
        }
        
    });

        
    });

    
</script>
</body>
</html>