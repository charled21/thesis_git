<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>

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

<form method="post" action="">

<?php 


$ft_tables="questions";
if (isset($_POST['ft_tables2'])) {
    $ft_tables = $_POST['ft_tables2'];
}
else{
	
}
$ftable2 = 'questions';
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$dataQuery = "SELECT * FROM $ftable2";
$result3 = mysqli_query($connect, $dataQuery);
while($row = mysqli_fetch_array($result3))
{

$q_id = $row['q_id'];
$q_txt = $row['q_txt'];
$sect_id = $q_id;

if($q_id % 5 == 1){
    echo "<section id=\"sect_$sect_id\">";
    //echo "<script>console.log('%5 == 1 / $q_id'); </script>";   //debugger
}

else{
    
}
echo "
    <p>$q_txt</p>
    <input type=\"radio\" name=\"opt_$q_id\" value=\"2\">
    <label>Strongly-Agree</label><br>

    <input type=\"radio\" name=\"opt_$q_id\" value=\"1\">
    <label>Agree</label><br>

    <input type=\"radio\" name=\"opt_$q_id\" value=\"0\">
    <label>Neutral</label><br>
           
    <input type=\"radio\" name=\"opt_$q_id\" value=\"-1\">
    <label>Disagree</label><br>
        
    <input type=\"radio\" name=\"opt_$q_id\" value=\"-2\">
    <label>Strongly-Disagree</label><br>
";

if($q_id % 5 == 0){

    //buttons for per section / 5 items
    // echo "
    // <button id=\"back_btn\" class=\"btn btn-warning\">Back</button>
    // <button id=\"proceed_btn\" class=\"btn btn-primary\">Proceed</button>
    // ";

    echo "</section>" ;
    //echo "<script>console.log('%5 == 0 /$q_id'); </script>";   //debugger
    $sect_id = $sect_id + 1;
    
}

    

} //while loop

$answers_arr=array('cat', 'dog', 'mouse', 'bird', 'crocodile', 'wombat', 'koala', 'kangaroo');

// put the answer array in a session variable
$_SESSION['answers']=$answers_arr;
?>

<button type="submit" id="back_btn" class="btn btn-warning">Back</button>
<button type="submit" id="proceed_btn" class="btn btn-primary">Proceed</button>

</form>


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
    
        
                $("#sect_1").show();
                $("#sect_6").hide();
                $("#sect_11").hide();
                $("#sect_16").hide();
                $("#sect_21").hide();
                $("#sect_26").hide();
                $("#sect_31").hide();
                $("#sect_36").hide();
                $("#sect_41").hide();
                $("#sect_46").hide();
                $("#sect_51").hide();
                $("#sect_56").hide();
                $("#back_btn").hide();
    
        });
    
    </script>

    <script>
        $('#proceed_btn').click(function(){
            
            if (typeof(Storage) !== "undefined") {
                for(var i=1;i<6;i++){
                    var x = $("input[type='radio'][name=opt_"+i+"]:checked").val();
                    console.log(x);                    
                }
            }
        });
    </script>


</body>
</html>