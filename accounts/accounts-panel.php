<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body style="background-color: transparent;">

 <!-- Begin Page Content -->
 <div class="container-fluid">

<?php 
$ft_tables="job_history";
$rec_Table = "applicant_details";
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";
$app_stat_cnt=0;
$total_no_applicants = 0;
$pending_req = 0;
$completed_jobs = 0;

$update_per_type_query="UPDATE personality_types SET per_choose_count = (SELECT COUNT(*) FROM app_add_details WHERE app_add_details.per_id = personality_types.per_id) WHERE per_id = per_id";
$per_type_Connect = new mysqli($hostname, $username, $password, $databaseName);
if ($per_type_Connect->query($update_per_type_query) === TRUE) {
} else {
  echo "Error updating record: " . $per_type_Connect->error;
}

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$inboxQuery = "SELECT applicant_id, app_status FROM $rec_Table";
$rec_Query = "SELECT job_history_id, job_status, DATE_FORMAT(job_date, '%c') as job_month FROM $ft_tables";
$per_Query = "SELECT * FROM personality_types";
$per_result = mysqli_query($connect, $per_Query);
$result3 = mysqli_query($connect, $rec_Query);
$inbx = mysqli_query($connect, $inboxQuery);
while($row2 = mysqli_fetch_array($inbx))
{
    
    
    $app_stat = $row2['app_status'];
    if($app_stat<4){
        $total_no_applicants++;
    }
    if($app_stat>3){
        $app_stat_cnt++;
    }
    else if($app_stat<4){
        $pending_req++;
    }
    
}
$month_data = array('0','0','0','0','0','0','0','0','0','0','0','0');
while($row = mysqli_fetch_array($result3))
{
    $rec_cnt = $row['job_history_id'];
    $job_status = $row['job_status'];
    $job_month = $row['job_month'];
    //echo "<script>console.log('$job_month');</script>";
    if($job_month==1){
        $month_data[0]++;
    }
    else if($job_month==2){
        $month_data[1]++;
    }
    else if($job_month==3){
        $month_data[2]++;
    }
    else if($job_month==4){
        $month_data[3]++;
    }
    else if($job_month==5){
        $month_data[4]++;
    }
    else if($job_month==6){
        $month_data[5]++;
    }
    else if($job_month==7){
        $month_data[6]++;
    }
    else if($job_month==8){
        $month_data[7]++;
    }
    else if($job_month==9){
        $month_data[8]++;
    }
    else if($job_month==10){
        $month_data[9]++;
    }
    else if($job_month==11){
        $month_data[10]++;
    }
    else if($job_month==12){
        $month_data[11]++;
    }
    
    if($job_status>0){
        $completed_jobs++;
    }
    
}
//echo "<script>console.log('$month_data[9]');</script>";
$json_month_data = json_encode($month_data);

$personalities = array();
$per_cnt = array();
while($per_row = mysqli_fetch_array($per_result))
{
    $row_array = $per_row['per_name'];
    $row_array2 = $per_row['per_choose_count'];
    array_push($personalities,$row_array);
    array_push($per_cnt,$row_array2);
}
$per_data= json_encode($personalities);
$per_cnt_data= json_encode($per_cnt);
//echo($per_data);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DATA ANALYTICS</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Phase-2 Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "$pending_req";?></div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                    </div> 
                </div>
                <div class="progress progress-sm mr-2 mt-2">
                    <div class="progress-bar bg-info" role="progressbar"
                        style="width: 30%" aria-valuenow="10" aria-valuemin="0"
                        aria-valuemax="100">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Completed</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "$completed_jobs";?></div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                    </div>
                </div>
                <div class="col">
                    <div class="progress progress-sm mr-2 mt-2">
                        <div class="progress-bar bg-info" role="progressbar"
                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Number of Applicants
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo "$total_no_applicants";?></div>
                            </div>
                            <!-- <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Number of Accepted Applicants</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "$app_stat_cnt";?></div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Rate of Applicants</h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> Personality Types</h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <!-- <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> ESFP
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> ISTP
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> INTJ
                    </span>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        

       
    
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
<div class="copyright text-center my-auto">
    <span>Copyright &copy; HRIS SubSystem 2021</span>
</div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
<a class="btn btn-primary" href="login.html">Logout</a>
</div>
</div>
</div>
</div>


<!-- <h3>ACCOUNTS PANEL</h3>
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
                    </div> -->
                   

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
    <script src="/thesis_git/vendor/chart.js/Chart.min.js"></script>

                    
    

    <!-- Page level custom scripts -->

    <script>
        var personality_data = <?php echo $per_data; ?>;
        var personality_cnt_data = <?php echo $per_cnt_data; ?>;

        console.log(personality_data);
        console.log(personality_cnt_data);

Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: personality_data,
    datasets: [{
      data: personality_cnt_data,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#010645','#008000','#f27fa5','#cc3300','#dd22dd','#996600','#a783b5','#5b77a8','#bbc6cb','#d8ab9f','#9fd8d7','#ff5263','#fffc42'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  // data: {
  //   labels: ["INTJ", "ISTP", "ESFP"],
  //   datasets: [{
  //     data: [30, 30, 40],
  //     backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
  //     hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
  //     hoverBorderColor: "rgba(234, 236, 244, 1)",
  //   }],
  // },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});



    </script>

    <script>
        var json_month_data = <?php echo $json_month_data; ?>;
        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Applicants",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: json_month_data,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ' : ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

    </script>


    
</body>
</html>