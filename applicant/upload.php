<?php
session_start();
require_once(__DIR__.'/../php/db-config.php');

$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "thesis_1";

var_dump($_FILES);
$target_dir = __DIR__.'/../img/uploads/certificates/';
$valid_dir = '/thesis_git/img/uploads/certificates/';
$img_class = 2;
$newfilename= "cert-".date('Y-m-d')."-".str_replace(" ", "", basename($_FILES["img_file"]["name"]));

$target_file = $target_dir . $newfilename;
//var_dump($_FILES);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["img_file"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "<script>alert('File is not an image.');</script>";
    $uploadOk = 0;
  }
}



if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "<script>alert('Sorry, your file was not uploaded.');</script>";

} else {
  if (move_uploaded_file($_FILES["img_file"]["tmp_name"], $target_file)) {
      //var_dump($target_file);
    //echo "The file ". htmlspecialchars( basename( $_FILES["img_file"]["name"])). " has been uploaded.";
    
//store to db --start
                $img_name = $_FILES["img_file"]["name"];
                $recent_id = $_SESSION['recent_id'];
                $img_dir =  $valid_dir . $newfilename;;
                $img_sql = "INSERT INTO images (img_name,img_dir,img_class,applicant_id) VALUES (?,?,?,?)";
				        $stmtinsert = $db->prepare($img_sql);
				        $result = $stmtinsert->execute([$img_name, $img_dir, $img_class, $recent_id]);

                if($result){
                }
                else{
                  echo 'Error in Connection!';
                }

                $init_score = 1;
                $init_pt_sql = "UPDATE app_add_details SET init_score = '$init_score' WHERE applicant_id = $recent_id";
                $conn = new mysqli($hostname, $username, $password, $databaseName);
                if ($conn->query($init_pt_sql) === TRUE) {

                } else {
                  echo "Error deleting record: " . $conn->error;
                }

//store to db --end


  } else {
    echo "Sorry, there was an error uploading your file.";
    header("Location: ../applicant/applicant-page3.php");
    die();
  }
}
?>
