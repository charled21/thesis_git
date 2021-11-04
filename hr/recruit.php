<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment</title>

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

    <div class="col-sm-12">
        <h3 class="mb-4 mt-4">Recruitment Page</h3>

        
        
        <div class="container">
        <a class="btn btn-pill btn-primary mb-4" type="button" data-toggle="modal" data-target="#exampleModal">
        <span class="fas fa-plus"></span>    
        Add New Job</a>
        
        <form action="" method="post">
        <?php 

//$row_cnt = 0;

$ft_tables="job_history";
$ftable2 = 'job_history';
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

                        
                        $job_id = "";
                        //start of display
                        //$dataQuery = "SELECT applicant_id, firstname, lastname, DATE_FORMAT(date_applied, '%a %b, %d %Y') as applydate, app_status FROM $ft_tables";
                        $dataQuery = "SELECT job_history_id,job_id, job_applicants, DATE_FORMAT(job_date, '%b, %d %Y') as applydate, DATEDIFF(CURDATE(),job_date) as datepassed, job_city FROM $ft_tables";
                        echo "<input class=\"form-control\" id=\"ft_tables\" type=\"text\" name=\"ft_tables\" value=\"$ft_tables\"  hidden>";
                        echo "<div>";
                        echo "<table class='col-sm-12'>
                        <tr>";
                        $result3 = mysqli_query($connect, $dataQuery);

                        $jobQuery = "SELECT * FROM job_req";
                        $result_job_id = mysqli_query($connect, $jobQuery);

                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">All Jobs";
                            echo "<hr>";
                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">Applicants";
                            echo "<hr>";
                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">Date Posted";
                            echo "<hr>";  
                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">Days Passed";
                            echo "<hr>"; 
                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">Assignment Area";
                            echo "<hr>";                           
                            echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Actions";
                            echo "<hr>";
                        echo "</th> </tr>";

                            
                            if($ft_tables=="job_history"){
                                while($row = mysqli_fetch_array($result3))
                                {
                                $row_num = $row['job_id'];                             

                                
                                if($row['job_history_id']<0){
                                    
                                }
                                else{
                                    
                                    //$row_cnt++;
                                    echo "<tr>";   

                                    if($row_num==1){
                                        $job_id='Manager';
                                    }
                                    else if($row_num==2)
                                    {
                                        $job_id='Mechanic';
                                    }
                                    else if($row_num==3)
                                    {
                                        $job_id='Treasury Staff';
                                    }
                                    else if($row_num==4)
                                    {
                                        $job_id='IT Staff';
                                    }
                                    else if($row_num==5)
                                    {
                                        $job_id='Cost Engineer';
                                    }
                                    else if($row_num==6)
                                    {
                                        $job_id='HR Staff';
                                    }
                                    else if($row_num==7)
                                    {
                                        $job_id='Store Clerk';
                                    }
                                    echo "<td>" .  "<font style=\"font-size: 14px;\" >" . $job_id . "</font>"."</td>";                             
                                    echo "<td>" .  "<font style=\"font-size: 14px;\" >" . $row['job_applicants'] . "</font>"."</td>";
                                    echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['applydate'] . "</font>" ."</td>";
                                    echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['datepassed'] . "</font>" ."</td>";
                                    echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['job_city'] . "</font>" ."</td>";
                                    echo "<td>" . "<button type=\"submit\" class=\"btn btn-primary mb-2\" value=$row_num id=\"tds2\" name=\"tds2\" >View</button>"."</td>";
                                    echo "</tr>";
                                   
                                
                                    
                                    } //else end
                                }
                                
                            }
                            
                                echo "</table>";
                                
                                mysqli_close($connect);
                    
                        //end of display start of original
						
                        ?>
            

</form>
</div> <!-- container end-->

    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Create a Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         

<form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="jobTitle">Job Title</label>
      <input type="text" class="form-control" id="job_title" placeholder="ex. Manager">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="jobCity">City</label>
      <input type="text" class="form-control" id="job_city" name="job_city" placeholder="ex. Butuan">
    </div>
  </div>


 
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="empTerm">Employment Term</label>
      <select id="empTerm" name="empTerm" class="form-control">
        <option selected>Choose Term</option>
        <option value="Permanent">Permanent</option>
        <option value="Contract">Contract</option>
        <option value="Season">Season</option>
      </select>
    </div>
    <div class="form-group col-md-6">
    <label for="empType">Employment Type</label>
      <select id="empType" name="empType" class="form-control">
        <option selected>Choose Type</option>
        <option value="Permanent">Full-time</option>
        <option value="Contract">Part-time</option>
      </select>
    </div>
    </div>
    <label for="jobDesc">Job Description</label><br>
    <textarea name="jobDesc" id="jobDesc" cols="50" rows="5"></textarea>
    <div class="mb-4"></div>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" id="save_btn">Save</button>
  
  
  
  
  
</form>

    
</div>
      </div>
    </div>
  </div>
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

    <!-- Page level custom scripts -->
    <script src="/thesis_git/js/demo/chart-area-demo.js"></script>
    <script src="/thesis_git/js/demo/chart-pie-demo.js"></script>

  

</body>
</html>