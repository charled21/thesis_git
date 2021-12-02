<?php 
require_once(__DIR__.'/../php/db-config.php');
 ?>

<?php 
			if(isset($_POST)){
				$fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $lname = $_POST['lname'];
                $gender = $_POST['gender'];
                $month = $_POST['month'];
				$day = $_POST['day'];
				$year = $_POST['year'];
                $address1 = $_POST['address1'];
                $address2 = $_POST['address2'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $zip = $_POST['zip'];
				$passed_id = $_POST['passed_id'];
				$status = 1;
				
				if($gender=='Male'){
					$final_gender='M';
				}
				else if($gender=='Female'){
					$final_gender='F';
				}
				else{
					$final_gender='U';
				}
				$final_month=intval($month)+1;
				$birthday = "$year-$final_month-$day";

				$sql = "INSERT INTO applicant_details (firstname,middlename,lastname,gender,dateBirth,address,address2,city,state,zipcode,app_status,date_applied,job_history_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,CURDATE(),?)";
				$stmtinsert = $db->prepare($sql);
				$result = $stmtinsert->execute([$fname, $mname, $lname, $final_gender, $birthday,$address1,$address2,$city,$state,$zip,$status,$passed_id]);

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




