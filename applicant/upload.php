<?php
require_once(__DIR__.'/../php/db-config.php');

$target_dir = __DIR__.'/../img/uploads/';
$valid_dir = '/thesis_git/img/uploads';
$newfilename= date('Y-m-d')."-".str_replace(" ", "", basename($_FILES["img_file"]["name"]));
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

if (file_exists($target_file)) {
  echo "<script>alert('Sorry, file already exists.');</script>";
  $uploadOk = 0;
}

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
    //echo "The file ". htmlspecialchars( basename( $_FILES["img_file"]["name"])). " has been uploaded.";
    
//store to db --start
                $img_name = $_FILES["img_file"]["name"];
                $img_dir =  $valid_dir . $newfilename;;
                $img_sql = "INSERT INTO images (img_name,img_dir) VALUES (?,?)";
				$stmtinsert = $db->prepare($img_sql);
				$result = $stmtinsert->execute([$img_name, $img_dir]);

                if($result){
                    echo "<script>alert('Image Successfully Added to Database!');</script>";
				}
				else{
					echo 'Error in Connection!';
				}

//store to db --end


  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
