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
                
				$sql = "DELETE FROM applicant_details WHERE applicant_id = $job_id";
				$conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->query($sql) === TRUE) {
					header('Location: '.$_SERVER['REQUEST_URI']);
                  } else {
                    echo "Error deleting record: " . $conn->error;
                  }

			}
			else{
				echo "Error";
			}

?>




