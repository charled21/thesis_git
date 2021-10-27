<?php 
require_once('/thesis1/php/db-config.php');
 ?>

<?php 

//fname: fname, mname: mname, lname: lname, gender : gender, birthday : birthday, address1 : address1, address2: address2, city: city, state: state, zip: zip, init_status: init_status

			if(isset($_POST)){
				echo "<script>console.log(\"inside isset post\"); </script>";
				$fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $lname = $_POST['lname'];
                $gender = $_POST['gender'];
                $birthday = $_POST['birthday'];
                $address1 = $_POST['address1'];
                $address2 = $_POST['address2'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $zip = $_POST['zip'];
                $init_status = $_POST['init_status'];
                echo "<script>console.log('$fname'+'$mname'+'$lname'+'$gender'+'$birthday'+'$address1'+'$address2'+'$city'+'$state'+'$zip'+'$init_status')</script>";
				//var_dump ($fname,$mname,$lname,$gender,$birthday,$address1,$address2,$city,$state,$zip,$init_status);
				
				// $sql = "INSERT INTO login_accounts (username,password,confirmpassword,email_acct) VALUES (?,?,?,?)";
				// $stmtinsert = $db->prepare($sql);
				// $result = $stmtinsert->execute([$username, $password, $confirmpassword, $email]);

				// if($result){

                    /*

					echo "<script type='text/javascript'>alert('$messageAlert');</script>";
					echo 'Successfully Added to Database!';

                    */
				// }
				// else{
				// 	echo 'Error in Connection!';
				// }
			//echo $firstname , " " , $middlename , " " , $lastname;
			}
			else{
				echo "Error";
			}

?>




