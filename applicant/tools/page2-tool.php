<?php 
session_start();
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
                $status = 2;
                

				$_SESSION["educ_attain"] = $educ_attain;
                $_SESSION["educ_attain_deg"] = $educ_attain_deg;
                $_SESSION["univ"] = $univ;
                $_SESSION["yr_grad"] = $yr_grad;
                $_SESSION["hs"] = $hs;
                $_SESSION["yr_grad_2"] = $yr_grad_2;
                $_SESSION["landline"] = $landline;
                $_SESSION["mobile"] = $mobile;
                $_SESSION["email"] = $email;
                $_SESSION["civil"] = $civil;
                $_SESSION["citizen"] = $citizen;
                $_SESSION["religion"] = $religion;
                $_SESSION["status"] = $status;
				
			}
			else{
				echo "Error";
			}

?>




