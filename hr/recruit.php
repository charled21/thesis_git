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
        

        
        
        <div class="container">
        <h3 class="mb-4 mt-4">RECRUITMENT PAGE</h3>
        <a class="btn btn-pill btn-primary mb-4" type="button" data-toggle="modal" data-target="#job_modal">
        <span class="fas fa-plus"></span>    
        Add New Job</a>
      
        <?php 

//$row_cnt = 0;

$ft_tables="job_history";
$applicants="applicant_details";
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

                        
                        $job_id = "";
                        $job_hist_id="";
                        $app_id = "";
                        $app_job_hist = "";
                        $job_app_cnt=0;
                        $candidates = array();

                        

                        $dataQuery = "SELECT job_history_id,job_id, job_applicants, DATE_FORMAT(job_date, '%b, %d %Y') as applydate, DATEDIFF(CURDATE(),job_date) as datepassed, job_city, branch_no FROM $ft_tables WHERE job_status < 1";
                        $applicant_query = "SELECT applicant_id, job_history_id FROM $applicants WHERE app_status < 4";
                        $jobQuery = "SELECT * FROM job_req";
                        //start of display
                        //$dataQuery = "SELECT applicant_id, firstname, lastname, DATE_FORMAT(date_applied, '%a %b, %d %Y') as applydate, app_status FROM $ft_tables";

                        

                        echo "<input class=\"form-control table\" id=\"ft_tables\" type=\"text\" name=\"ft_tables\" value=\"$ft_tables\"  hidden>";

                        ?>

                                    <div id="init_display">

                                    <?php 

                        echo "<table class='col-sm-12'>
                        <tr>";
                        $result3 = mysqli_query($connect, $dataQuery);
                        
                        $app_cnt_query = mysqli_query($connect, $applicant_query);
                        
                                  while($app_cnt_row = mysqli_fetch_array($app_cnt_query))
                                    {
                                      $app_job_hist = $app_cnt_row['job_history_id']; 
                                        $candidates[] = $app_job_hist; 
                                    }

                        $result_job_id = mysqli_query($connect, $jobQuery);

                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">All Jobs";
                            echo "<span data-header=\"1\" data-item=\"0\" role=\"button\" type=\"button\" class=\"ml-2 fas fa-sort date_btn\"> </span>";
                            echo "<hr>";
                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">Candidates";
                            echo "<span data-header=\"2\" data-item=\"0\" role=\"button\" type=\"button\" class=\"ml-2 fas fa-sort date_btn\"> </span>";
                            echo "<hr>";
                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">Date Posted";
                            echo "<span data-header=\"3\" data-item=\"0\" role=\"button\" type=\"button\" class=\"ml-2 fas fa-sort date_btn\"> </span>";
                            echo "<hr>";  
                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">Days Passed";
                            echo "<span data-header=\"3\" data-item=\"0\" role=\"button\" type=\"button\" class=\"ml-2 fas fa-sort date_btn\"> </span>";
                            echo "<hr>"; 
                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">Assignment Area";
                            echo "<hr>";   
                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">Store Branch";
                            echo "<span data-header=\"6\" data-item=\"0\" role=\"button\" type=\"button\" class=\"ml-2 fas fa-sort date_btn\"> </span>";
                            echo "<hr>";                           
                            echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Actions";
                            echo "<hr>";
                        echo "</th> </tr>";

                                    

                            if($ft_tables=="job_history"){
                                while($row = mysqli_fetch_array($result3))
                                {
                                $row_num = $row['job_id'];         
                                $job_hist_id = $row['job_history_id'];
                                $job_applicants = $row['job_applicants'];
                                echo "<script>console.log('$job_hist_id');</script>";

                                //update candidate # --start
                                $candidateQuery = "UPDATE job_history SET job_applicants = (SELECT COUNT(*) FROM $applicants WHERE job_history_id= $job_hist_id AND app_status < 4) WHERE job_history_id = $job_hist_id";
                                $candidateConnect = new mysqli($hostname, $username, $password, $databaseName);
                                if ($candidateConnect->query($candidateQuery) === TRUE) {
                                } else {
                                  echo "Error updating record: " . $candidateConnect->error;
                                }
                                //update candidate # --end 
                                
                                                                
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
                                                            
                                    
                                    
                                    echo "<td>" .  "<font style=\"font-size: 14px;\" >" . $job_applicants . "</font>"."</td>";
                                    echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['applydate'] . "</font>" ."</td>";
                                    echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['datepassed'] . "</font>" ."</td>";
                                    echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['job_city'] . "</font>" ."</td>";
                                    $job_city = $row['job_city'];

                                    if($row['branch_no']==1){
                                      $branch = 'Montilla';
                                    }
                                    else if($row['branch_no']==2){
                                      $branch = 'Imadejas';
                                    }
                                    else if($row['branch_no']==3){
                                      $branch = 'Libertad';
                                    }
                                    echo "<td>" .  "<font style=\"font-size: 14px;\">" . $branch . "</font>" ."</td>";
                                    //echo "<td>" . "<a role=\"button\" type=\"submit\" class=\"btn btn-primary mb-2\" data-id=$job_hist_id data-toggle=\"modal\" data-target=\"#view_recruit\" data-title=\"$job_id\" data-city=\"$job_city\" data-branch=\"$branch\">View</a>"."</td>";
                                    echo "<td>" . "<button type=\"submit\" class=\"btn btn-danger mb-2\" data-id=$job_hist_id  >Close</button>"."</td>";
                                    echo "</tr>";

                                    
                                   
                                    
                                    } //else end
                                    
                                }// while end

                                
                            }
                            
                                echo "</table>";
                                
                                mysqli_close($connect);

                                ?> 
                                    
                                  </div>
                                    
                                    <?php
                    
                        //end of display start of original
						
                        ?>
                        <div id="cont_recruit"></div>
            

</div> <!-- container end-->

    </div>

    

<!-- Modal -->
<!-- <div class="modal fade" id="view_recruit" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-white" id="job_modal_label">Edit Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


<div class="modal-body">

<form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="chng_title">Job Title</label>
      <select id="chng_title" class="form-control">
        <option selected>Choose Position</option>
        <option value="1">Manager</option>
        <option value="2">Mechanic</option>
        <option value="3">Treasury Staff</option>
        <option value="4">IT Staff</option>
        <option value="5">Cost Engineer</option>
        <option value="6">HR Staff</option>
        <option value="7">Store Clerk</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    
    <div class="form-group col-md-6">
    <label>City</label>
      <select id="chng_city" class="form-control">
        <option selected>Choose City</option>
        <option value="Butuan City">Butuan City</option>
        <option value="Cabadbaran City">Cabadbaran City</option>
        <option value="Surigao City">Surigao City</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label>Branch</label>
      <select id="chng_empBranch" name="chng_empBranch" class="form-control">
        <option selected>Choose Branch</option>
        <option value="1">Montilla</option>
        <option value="2">Imadejas</option>
        <option value="3">Libertad</option>
      </select>
    </div>
  </div>


 
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="chng_empTerm">Employment Term</label>
      <select id="chng_empTerm" name="chng_empTerm" class="form-control">
        <option selected>Choose Term</option>
        <option value="1">Permanent</option>
        <option value="2">Contract</option>
        <option value="3">Season</option>
      </select>
    </div>
    <div class="form-group col-md-6">
    <label for="chng_empType">Employment Type</label>
      <select id="chng_empType" name="chng_empType" class="form-control">
        <option selected>Choose Type</option>
        <option value="Full-time">Full-time</option>
        <option value="Part-time">Part-time</option>
      </select>
    </div>
    </div>
    <label for="chng_jobDesc">Job Description</label><br>
    <textarea name="chng_jobDesc" id="chng_jobDesc" cols="52" rows="3"></textarea>
    <div class="mb-4"></div>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" id="chng_save_btn">Save</button>
   -->
  <!-- End Change Modal -->


<!-- Modal -->
<div class="modal fade" id="job_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="job_modal_label">Create a Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


<div class="modal-body">

<form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="job_title">Job Title</label>
      <select id="job_title" class="form-control">
        <option selected>Choose Position</option>
        <option value="1">Manager</option>
        <option value="2">Mechanic</option>
        <option value="3">Treasury Staff</option>
        <option value="4">IT Staff</option>
        <option value="5">Cost Engineer</option>
        <option value="6">HR Staff</option>
        <option value="7">Store Clerk</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    
    <div class="form-group col-md-6">
    <label>City</label>
      <select id="job_city" class="form-control">
        <option selected>Choose City</option>
        <option value="Butuan City">Butuan City</option>
        <option value="Cabadbaran City">Cabadbaran City</option>
        <option value="Surigao City">Surigao City</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label>Branch</label>
      <select id="empBranch" name="empBranch" class="form-control">
        <option selected>Choose Branch</option>
        <option value="1">Montilla</option>
        <option value="2">Imadejas</option>
        <option value="3">Libertad</option>
      </select>
    </div>
  </div>


 
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="empTerm">Employment Term</label>
      <select id="empTerm" name="empTerm" class="form-control">
        <option selected>Choose Term</option>
        <option value="1">Permanent</option>
        <option value="2">Contract</option>
        <option value="3">Season</option>
      </select>
    </div>
    <div class="form-group col-md-6">
    <label for="empType">Employment Type</label>
      <select id="empType" name="empType" class="form-control">
        <option selected>Choose Type</option>
        <option value="Full-time">Full-time</option>
        <option value="Part-time">Part-time</option>
      </select>
    </div>
    </div>
    <label for="jobDesc">Job Description</label><br>
    <textarea name="jobDesc" id="jobDesc" cols="52" rows="3"></textarea>
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



<script type="text/javascript">
	$(function(){
		$('#save_btn').click(function(e){

			var valid = this.form.checkValidity();
			if(valid){

				job_title = $('#job_title').val();
				job_city = $('#job_city').val();
        empBranch = $('#empBranch').val();
        empTerm = $('#empTerm').val();
        empType = $('#empType').val();
        jobDesc = $('#jobDesc').val();


				e.preventDefault();


				$.ajax({
					type: 'POST',
					url: "recruit-process.php",
					data: {job_title : job_title, job_city : job_city, empBranch : empBranch, empTerm : empTerm, empType : empType , jobDesc : jobDesc},
					success: function(data){
            alert('Job Posted!');
            console.log(data);
					},
					error: function(data){
						alert('Error!');
					}
				});
				$("form").trigger("reset");
        setTimeout(function(){ location.reload();window.top.location.reload(); }, 2000);
			}
			else{
        
			}
		});
	});
</script>

<script>
    $('button').click(function() {
        var job_id =$(this).data('id');

        // var title =$(this).data('title');
        // var city =  $(this).data('city');
        // var branch = $(this).data('branch');
        // alert(title);
        // $('#chng_title').val(title);
        // $('#chng_title').prop('disabled', true);
        // $('#chng_city').val(city);
        // $('#chng_city').prop('disabled', true);
        // $('#chng_empBranch').val(branch);
        // $('#chng_empBranch').prop('disabled', true);

        //alert("Firing!");
        $.ajax({
					type: 'POST',
					url: "recruit-drop-proc.php",
					data: {job_id :job_id},
					success: function(data){
            setTimeout(function(){ location.reload();window.top.location.reload(); }, 2000);
					},
					error: function(data){
						alert('Error!');
					}
				});
    });
</script>

<script>  
        $('.date_btn').click(function() {
          header = $(this).data('header');
          sort = $('.date_btn').data('item');
          //alert(header);
          if(sort==0){
            $('.date_btn').data('item',1);
          }
          else{
            $('.date_btn').data('item',0);
          }
          
          $.ajax({
					type: 'POST',
					url: "sorter.php",
					data: {sort : sort, header : header},
					success: function(data){
            console.log(data);
            $('#cont_recruit').html(data);
            $('#init_display').attr("hidden",true);
            //setTimeout(function(){ location.reload();window.top.location.reload(); }, 2000);
					},
					error: function(data){
						alert('Error!');
					}
				});
          
        });

</script>
  

</body>
</html>