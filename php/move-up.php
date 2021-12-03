<?php 
require_once('db-config.php');
 ?>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis_1";

if(isset($_POST)){
    $applicant_id = $_POST['applicant_id'];
    $add_pts = $_POST['total_pts'];
    $init_score = $_POST['init_score'];
    $job_history_id = $_POST['job_history_id'];
    $data_status = $_POST['data_status'];

//start of status = 3 -> 4

    if($add_pts == 0){
        $add_pts = 1;
    }
    $total_pts = $add_pts + $init_score;
    
    if($data_status==2){
        $job_status = 3;
    }
    else if($data_status==3){
        $job_status = 5;
    }
    else if($data_status==5){
        $job_status = 6;
    }
    

    $sql5 = "INSERT INTO app_emp_details (applicant_id,hired_date,job_history_id) VALUES (?,CURDATE(),?)";
	$stmtinsert = $db->prepare($sql5);
	$result5 = $stmtinsert->execute([$applicant_id,$job_history_id]);

    if($result5){

	}
	else{
		echo 'Error in Connection!';
	}

    $sql2 = "UPDATE applicant_details SET app_status = '$job_status' WHERE applicant_id = '$applicant_id'";
    $sql3 = "UPDATE app_add_details SET init_score = '$total_pts'  WHERE  applicant_id = '$applicant_id'";

	$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->query($sql2) === TRUE) 
    {

    } 
    else 
    {
        echo "Error updating record: " . $conn->error;
    }

    if ($conn->query($sql3) === TRUE) 
    {

    } 
    else 
    {
        echo "Error updating record: " . $conn->error;
    }
    if ($conn->query($sql4) === TRUE) 
    {

    } 
    else 
    {
        echo "Error updating record: " . $conn->error;
    }


    

}


?>

        

       
