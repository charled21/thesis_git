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
?>

<script type="text/javascript" src="/thesis_git/js/ans-process.js"></script>

</body>
</html>