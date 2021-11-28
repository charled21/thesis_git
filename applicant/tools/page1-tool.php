<?php 
session_start();

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
				$status = 1;

                $_SESSION["fname"] = $fname;
                $_SESSION["mname"] = $mname;
                $_SESSION["lname"] = $lname;
                $_SESSION["gender"] = $gender;
                $_SESSION["month"] = $month;
                $_SESSION["day"] = $day;
                $_SESSION["year"] = $year;
                $_SESSION["address1"] = $address1;
                $_SESSION["address2"] = $address2;
                $_SESSION["city"] = $city;
                $_SESSION["state"] = $state;
                $_SESSION["zip"] = $zip;
                $_SESSION["status"] = $status;
				
				
			}
			else{
				echo "Error";
			}

?>




