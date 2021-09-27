<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
<link rel="stylesheet" type="text/css" href="/mywebsite/css/acct-main.css">
<link rel="stylesheet" type="text/css" href="/mywebsite/css/bootstrap.min.css">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body style="background-color: transparent;">
<h3>ACCOUNTS PANEL</h3>
                    <div class="d-flex">
                        
                        <div class="mid-box1 box-texts mx-2 my-2 mt-5">
                              <p>Current Balance</p>
                                <hr class="mb-1">
                                <p>0.00</p>
                                </div>
                                
                                <div class="mid-box1 box-texts mx-2 my-2 mt-5">
                                    <div>
                                    <p>Total Orders</p>
                                    <hr class="mb-1">
                                    <p>0</p>
                                    </div>
                                </div>
                                <div class="mid-box1 box-texts  mx-2 my-2 mt-5">
                                    <div>
                                    <p>Pending Transactions</p>
                                    <hr class="mb-1">
                                    <p>0</p>
                            </div>
                        </div>
                    </div>


    <script src="js/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="package/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>