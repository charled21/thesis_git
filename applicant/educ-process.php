<?php 
require_once(__DIR__.'/../php/db-config.php');
 ?>

<?php 
			if(isset($_POST)){
                
				$educ_attain = $_POST['educ_attain'];
                $educ_attain_deg = $_POST['educ_attain_deg'];
                $univ = $_POST['univ'];
                $yr_grad = $_POST['yr_grad'];
                $hs = $_POST['hs'];
				$yr_grad_2 = $_POST['yr_grad_2'];
				$landline = $_POST['landline'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];
                $civil = $_POST['civil'];
                $citizen = $_POST['citizen'];
                $religion = $_POST['religion'];
                $recent_id = $_POST['recent_id'];
                

				$educ_sql = "INSERT INTO app_educ_bg (educ_attain,educ_deg,educ_univ,educ_univ_yr,educ_hs,educ_hs_grad,applicant_id) VALUES (?,?,?,?,?,?,?)";
				$stmtinsert = $db->prepare($educ_sql);
				$result = $stmtinsert->execute([$educ_attain, $educ_attain_deg, $univ, $yr_grad, $hs,$yr_grad_2,$recent_id]);

                if($result){

				}
				else{
					echo 'Error in Connection!';
				}

                $add_info_sql = "INSERT INTO app_add_details (app_email,app_religion,app_citizenship,app_civil_status,app_landline,app_mobile,applicant_id) VALUES (?,?,?,?,?,?,?)";
				$stmtinsert2 = $db->prepare($add_info_sql);
				$add_info_result = $stmtinsert2->execute([$email, $religion, $citizen, $civil, $landline,$mobile,$recent_id]);

                if($add_info_result){

				}
				else{
					echo 'Error in Connection!';
				}
				
			}
			else{
				echo "Error";
			}

?>




