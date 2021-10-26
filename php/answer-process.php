<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application 1 Process</title>
</head>
<body>

<?php 

$opt = array();
        echo "<script>const result = []; </script>";
        for($x = 1; $x <=60; $x++){
            $opt[$x]=$_POST["opt_" . $x . ""];
            
            echo "<script> 
            
            result[$x] = ". $opt[$x]. " </script>";
        }

        // $opt_1 = $_POST['opt_1'];
        // $opt_2 = $_POST['opt_2'];
        // $opt_3 = $_POST['opt_3'];
        // $opt_4 = $_POST['opt_4'];
        // $opt_5 = $_POST['opt_5'];
        // echo "
        // <script>
        // opt_1=$opt1;
        // opt_2=$opt2;
        // opt_3=$opt3;
        // opt_4=$opt4;
        // opt_5=$opt5;
        // </script>";

        //print_r("Q1: $opt1 <br>Q2: $opt2 <br>Q3: $opt3 <br>Q4: $opt4 <br>Q5: $opt5");
    
?>

<script>


for(let i = 1; i <= 60; i++){
    console.log(result[i]);
}
    


</script>
</body>
</html>