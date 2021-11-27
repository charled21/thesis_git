<?php 
require_once(__DIR__.'/../php/db-config.php');
 ?>

<?php 

			if(isset($_POST)){
				$admin_user = $_POST['admin_user'];
                $admin_pass = sha1($_POST['admin_pass']);
                $admin_pass2 = sha1($_POST['admin_pass2']);;
                $admin_email = $_POST['admin_email'];
                $admin_priv = $_POST['admin_priv'];
				$sql = "INSERT INTO login_accounts (username,password,confirmpassword,email_acct,acct_priv) VALUES (?,?,?,?,?)";
				$stmtinsert = $db->prepare($sql);
				$result = $stmtinsert->execute([$admin_user, $admin_pass, $admin_pass2,$admin_email,$admin_priv]);

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




