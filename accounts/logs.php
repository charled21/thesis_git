<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs Page</title>

    <link rel="stylesheet" type="text/css" href="/mywebsite/css/acct-main.css">
    <link rel="stylesheet" type="text/css" href="/mywebsite/css/bootstrap.min.css">

</head>
<body style="background-color: transparent;">
<h3>Login History</h3>
    <div class="box-texts mid-box-logs">
    <?php 
    include "../php/history-display.php";
    ?>
    </div>
</body>
</html>