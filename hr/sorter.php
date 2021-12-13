<?php 
require_once(__DIR__.'/../php/db-config.php');
 ?>

<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";
$ft_tables="job_history";
$applicants="applicant_details";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
            $sort = 0;
            $order = "";
            $header = "";
			if(isset($_POST)){
                //var_dump($_POST);
				$sort = $_POST['sort'];
                $header = $_POST['header'];
                

                if($sort == 1){
                    $order = 'ASC';
                }
                else{
                    $order = 'DESC';
                }
                if($header == 2 ){
                    $column = 'job_applicants';
                }
                else if($header == 3){
                    $column = 'job_date';
                }
                else if($header == 6){
                    $column = 'branch_no';
                }
                else{
                    $column = 'job_id';
                }
                
                
                
                $sql2 = "SELECT job_history_id,job_id, job_applicants, DATE_FORMAT(job_date, '%b, %d %Y') as applydate, DATEDIFF(CURDATE(),job_date) as datepassed, job_city, branch_no FROM $ft_tables WHERE job_status < 1 ORDER BY $column $order ";
                $jobQuery = "SELECT * FROM job_req";
                $result3 = mysqli_query($connect, $sql2);


                echo "<input class=\"form-control table\" id=\"ft_tables\" type=\"text\" name=\"ft_tables\" value=\"$ft_tables\"  hidden>";
                        echo "<div>";
                        echo "<table class='col-sm-12'>
                        <tr>";
                $result3 = mysqli_query($connect, $sql2);
                
            

                $result_job_id = mysqli_query($connect, $jobQuery);
                    echo "<th class=\"mb-4\" style=\"font-size:16px;\">All Jobs";
                    echo "<span data-header=\"1\" data-item=\"0\" role=\"button\" type=\"button\" class=\"ml-2 fas fa-sort date_btn2\"> </span>";
                    echo "<hr>";
                    echo "<th class=\"mb-4\" style=\"font-size:16px;\">Candidates";
                    echo "<span data-header=\"2\" data-item=\"0\" role=\"button\" type=\"button\" class=\"ml-2 fas fa-sort date_btn2\"> </span>";
                    echo "<hr>";
                    echo "<th class=\"mb-4\" style=\"font-size:16px;\">Date Posted";
                    echo "<span data-header=\"3\" data-item=\"0\" role=\"button\" type=\"button\" class=\"ml-2 fas fa-sort date_btn2\"> </span>";
                    echo "<hr>";  
                    echo "<th class=\"mb-4\" style=\"font-size:16px;\">Days Passed";
                    echo "<span data-header=\"3\" data-item=\"0\" role=\"button\" type=\"button\" class=\"ml-2 fas fa-sort date_btn2\"> </span>";
                    echo "<hr>"; 
                    echo "<th class=\"mb-4\" style=\"font-size:16px;\">Assignment Area";
                    echo "<hr>";   
                    echo "<th class=\"mb-4\" style=\"font-size:16px;\">Store Branch";
                    echo "<span data-header=\"6\" data-item=\"0\" role=\"button\" type=\"button\" class=\"ml-2 fas fa-sort date_btn2\"> </span>";
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
                       
                        echo "</div>";
                        } //else end
                        
                    }// while end

                    
                }
                
                    echo "</table>";
                    
                    

			}
			else{
				echo "Error";
			}

?>


<script>
    $('.date_btn2').click(function() {
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



