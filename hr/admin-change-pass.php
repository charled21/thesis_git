<?php 
require_once(__DIR__.'/../php/db-config.php');
 ?>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis_1";

			if(isset($_POST)){
				$chng_user = $_POST['chng_user'];
                $chng_pass = sha1($_POST['chng_pass']);
                $chng_pass2 = sha1($_POST['chng_pass2']);
                $chng_priv = $_POST['chng_priv'];
                $chng_email = $_POST['chng_email'];
                //echo "<script>console.log('$chng_user');</script>";
                
                $sql2 = "UPDATE login_accounts SET password = '$chng_pass', confirmpassword = '$chng_pass2', acct_priv = '$chng_priv',email_acct = '$chng_email' WHERE username = '$chng_user'";

				$conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->query($sql2) === TRUE) {
                  } else {
                    echo "Error updating record: " . $conn->error;
                  }

			}
			else{
				echo "Error";
			}

?>


