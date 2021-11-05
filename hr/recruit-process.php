<?php 
require_once(__DIR__.'/../php/db-config.php');
 ?>

<?php 

			if(isset($_POST)){
				$job_title = $_POST['job_title'];
                $job_city = $_POST['job_city'];
                $empBranch = $_POST['empBranch'];
                $empTerm = $_POST['empTerm'];
                $empType = $_POST['empType'];
				$jobDesc = $_POST['jobDesc'];
                $minrate = 0;
                $job_applicants = 0;
                $maxrate = 0;
				$sql = "INSERT INTO job_history (job_id,job_applicants,job_date,job_city,branch_no,emp_type,emp_term,min_rate,max_rate) VALUES (?,?,CURRENT_TIMESTAMP(),?,?,?,?,?,?)";
				$stmtinsert = $db->prepare($sql);
				$result = $stmtinsert->execute([$job_title, $job_applicants, $job_city, $empBranch,$empType,$empTerm,$minrate,$maxrate]);

				if($result){

				}
				else{
					echo 'Error in Connection!';
				}
			}
			else{
				echo "Error";
			}

?>




