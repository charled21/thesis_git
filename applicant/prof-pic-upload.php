<?php
session_start();
require_once(__DIR__.'/../php/db-config.php');

$target_dir = __DIR__.'/../img/uploads/prof-pics/';
$valid_dir = '/thesis_git/img/uploads/prof-pics/';
$newfilename= "prof-pic-".str_replace(" ", "", basename($_FILES["img_file"]["name"]));
$target_file = $target_dir . $newfilename;
//var_dump($_FILES);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if ($_FILES["img_file"]["size"] > 500000) {
  echo "<script>alert('Sorry, your file is too large.');</script>";
  $uploadOk = 0;
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
    
//store to db --start
                $img_class = 1;
                $recent_id = $_SESSION['recent_id'];
                $img_name = $_FILES["img_file"]["name"];
                $img_dir =  $valid_dir . $newfilename;;
                $img_sql = "INSERT INTO images (img_name,img_dir,img_class,applicant_id) VALUES (?,?,?,?)";
				        $stmtinsert = $db->prepare($img_sql);
				        $result = $stmtinsert->execute([$img_name, $img_dir, $img_class, $recent_id]);

                if($result){
                    
				}
				else{
					echo 'Error in Connection!';
				}

//store to db --end


  } else {
    echo "Sorry, there was an error uploading your file.";
    header("Location: ../applicant/applicant-page2.php");
    die();
  }
}
?>
