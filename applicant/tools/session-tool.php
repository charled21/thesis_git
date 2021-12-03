<?php 
session_start();
$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "thesis_1";
    
    $db = new PDO('mysql:host=localhost;dbname='. $databaseName .';charset=utf8', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST)){
  $page_num = $_POST['page_num'];
  if($page_num==0){
    $passed_id = $_POST['passed_id'];
  
    $_SESSION['passed_id'] = $passed_id;
  }
  else if($page_num==1){
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
  else if($page_num==2){
    $id_fetch_sql = "SELECT MAX(applicant_id) as recent_id FROM applicant_details";
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $id_fetch_result = mysqli_query($connect, $id_fetch_sql);
    while($id_row = mysqli_fetch_array($id_fetch_result))
                                {
                                  $recent_id = $id_row['recent_id'];
                                }

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
                $status = 1;
                
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
                $_SESSION['recent_id'] = $recent_id;
  }
  else if($page_num==4){
    
    $id_fetch_sql = "SELECT MAX(applicant_id) as recent_id FROM applicant_details";
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $id_fetch_result = mysqli_query($connect, $id_fetch_sql);
    while($id_row = mysqli_fetch_array($id_fetch_result))
                                {
                                  $recent_id = $id_row['recent_id'];
                                }
                $status = 2;
                

                $fname = $_SESSION["fname"];
                $mname = $_SESSION["mname"];
                $lname = $_SESSION["lname"];
                $gender = $_SESSION["gender"];
                $month = $_SESSION["month"];
                $day = $_SESSION["day"];
                $year = $_SESSION["year"];
                $address1 = $_SESSION["address1"];
                $address2 = $_SESSION["address2"];
                $city = $_SESSION["city"];
                $state = $_SESSION["state"];
                $zip = $_SESSION["zip"];

                $educ_attain = $_SESSION["educ_attain"];
                $educ_attain_deg = $_SESSION["educ_attain_deg"];
                $univ = $_SESSION["univ"];
                $yr_grad = $_SESSION["yr_grad"];
                $hs = $_SESSION["hs"];
                $yr_grad_2 = $_SESSION["yr_grad_2"];
                $landline = $_SESSION["landline"];
                $mobile = $_SESSION["mobile"];
                $email = $_SESSION["email"];
                $civil = $_SESSION["civil"];
                $citizen = $_SESSION["citizen"];
                $religion = $_SESSION["religion"];

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

                $update_sql = "UPDATE applicant_details SET firstname = '$fname', middlename = '$mname', lastname = '$lname', gender = '$final_gender', address = '$address1', address2 = '$address2', city = '$city', state = '$state', zipcode = $zip, app_status = $status WHERE applicant_id = $recent_id";
                $conn = new mysqli($hostname, $username, $password, $databaseName);
                if ($conn->query($update_sql) === TRUE) {

                } else {
                  echo "Error deleting record: " . $conn->error;
                }

                $educ_sql = "INSERT INTO app_educ_bg (educ_attain,educ_deg,educ_univ,educ_univ_yr,educ_hs,educ_hs_grad,applicant_id) VALUES (?,?,?,?,?,?,?)";
                $stmtinsert = $db->prepare($educ_sql);
                $result = $stmtinsert->execute([$educ_attain, $educ_attain_deg, $univ, $yr_grad, $hs,$yr_grad_2,$recent_id]);

                if($result){
                  
                }
                else{
                  echo 'Error in Connection!';
                }

                $add_info_sql = "INSERT INTO app_add_details (app_email,app_religion,app_citizenship,app_civil_status,app_landline,app_mobile,applicant_id) VALUES (?,?,?,?,?,?,?)";
                $stmtinsert2 = $db->prepare($add_info_sql);
                $add_info_result = $stmtinsert2->execute([$email, $religion, $citizen, $civil, $landline,$mobile,$recent_id]);

                if($add_info_result){

                }
                else{
                  echo 'Error in Connection!';
                }

  }

  else if($page_num==5){
    $text = $_POST['text'];
    $per_fetch_sql = "SELECT per_id FROM personality_types WHERE per_name = '$text'";
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $per_fetch_result = mysqli_query($connect, $per_fetch_sql);
    while($per_row = mysqli_fetch_array($per_fetch_result))
                                {
                                  $per_fetch = $per_row['per_id'];
                                }   

    $id_fetch_sql = "SELECT MAX(applicant_id) as recent_id FROM applicant_details";
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $id_fetch_result = mysqli_query($connect, $id_fetch_sql);
    while($id_row = mysqli_fetch_array($id_fetch_result))
                                {
                                  $recent_id = $id_row['recent_id'];
                                }                            
                                $init_score = 1;
    $insert_per_sql = "UPDATE app_add_details SET per_id = '$per_fetch', init_score = '$init_score' WHERE applicant_id = $recent_id";
    $conn = new mysqli($hostname, $username, $password, $databaseName);
                if ($conn->query($insert_per_sql) === TRUE) {

                } else {
                  echo "Error deleting record: " . $conn->error;
                }
                
  }
  
}
else{
  echo "Error";
}
?>