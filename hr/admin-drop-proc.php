<?php 
require_once(__DIR__.'/../php/db-config.php');
 ?>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis_1";

			if(isset($_POST)){
				$job_id = $_POST['job_id'];
                var_dump($job_id);
				$sql = "DELETE FROM login_accounts WHERE username = '$job_id'";
				$conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->query($sql) === TRUE) {

                  } else {
                    echo "Error deleting record: " . $conn->error;
                  }

			}
			else{
				echo "Error";
			}

?>




