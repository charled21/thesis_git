<?php 
require_once('db-config.php');
 ?>

<?php 


			if(isset($_POST)){
				
				$username = $_POST['username'];
				$password = sha1($_POST['password']);
				$confirmpassword = sha1($_POST['confirmPassword']);
				$email = $_POST['email'];
				var_dump ($username,$password,$confirmpassword,$email);
				
				$sql = "INSERT INTO login_accounts (username,password,confirmpassword,email_acct) VALUES (?,?,?,?)";
				$stmtinsert = $db->prepare($sql);
				$result = $stmtinsert->execute([$username, $password, $confirmpassword, $email]);

				if($result){
					//echo "<script type='text/javascript'>alert('$messageAlert');</script>";
					//echo 'Successfully Added to Database!';
				}
				else{
					echo 'Error in Connection!';
				}
			//echo $firstname , " " , $middlename , " " , $lastname;
			}
			else{
				echo "Error";
			}

?>




