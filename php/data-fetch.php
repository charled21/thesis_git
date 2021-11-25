<?php  
 $connect = mysqli_connect("localhost", "root", "", "thesis_1"); 
 $id =  intval($_POST['tds2']); 
 echo "<script>console.log($id);</script>";
 if(isset($_POST["tds2"]))  
 {  
      $img_table = "images";
      $img_query = "SELECT img_dir FROM $img_table WHERE applicant_id = $id";
      $img_result = mysqli_query($connect, $img_query);
      while($img_row = mysqli_fetch_array($img_result)){
          $file_dest = $img_row['img_dir'];
          //echo "$file_dest";
          echo "<img src=\"$file_dest\" alt=\"Profile Pic\" width=\"150\" height=\"150\">";
      }

      $table_name = "applicant_details";
      $query = "SELECT firstname,middlename,lastname,gender,DATE_FORMAT(dateBirth,'%b %d %Y') as birthday,address,address2,city,state,zipcode,app_status,DATEDIFF(CURDATE(),date_applied) as pending_days FROM $table_name WHERE applicant_id = $id ";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_array($result))
     {
          $fname = $row['firstname'];
          $mname = $row['middlename'];
          $lname = $row['lastname'];
          $gender = $row['gender'];
          $birth = $row['birthday'];
          $address = $row['address'];
          $address2 = $row['address2'];
          $city = $row['city'];
          $state = $row['state'];
          $zip = $row['zipcode'];
          $status = $row['app_status'];
          $pending_days = $row['pending_days'];
     }
     echo "<p><b>Fullname:</b> $fname"." $mname"." $lname</p>";
     echo "<p><b>Gender:</b> $gender</p>";
     echo "<p><b>Birthday:</b> $birth</p>";
     echo "<p><b>Home Address:</b> $address</p>";
     echo "<p><b>Present Address:</b> $address2</p>";
     echo "<p><b>City:</b> $city</p>";
     echo "<p><b>State:</b> $state</p>";
     echo "<p><b>Zip:</b> $zip</p>";
     if($status<4){
          echo "<hr>";
          echo "<p><b>Status:</b></p>". "<p style=\"color: red\"> <b>Ongoing</b></p>";
          echo "<hr>";
          echo "<p><b>Pending:</b></p><p style=\"color: red\"> <b>$pending_days day(s)</b></p>";
     }
     else{
          echo "<p>Status:</p><p style=\"color: green\"> Passed</p>";
     }
     echo "<button class=\"btn btn-success\" id=\"move_up\" value=$id onclick=\"move_record()\">Move Up</button>";
     echo "<button class=\"ml-2 btn btn-danger\" id=\"del_btn\" value=$id onclick=\"del_record()\" >Delete</button>";
     
 }  
 ?>