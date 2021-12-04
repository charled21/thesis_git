<?php  
 $connect = mysqli_connect("localhost", "root", "", "thesis_1"); 
 $id =  intval($_POST['tds2']); 
 echo "<script>console.log($id);</script>";
 if(isset($_POST["tds2"]))  
 {  
      $img_table = "images";
      $hasCertificate = 0;
      $img_class_query = "SELECT img_dir FROM $img_table WHERE applicant_id = $id AND img_class = 2";
      $img_class_result = mysqli_query($connect, $img_class_query);
      $img_query = "SELECT img_dir,img_class FROM $img_table WHERE applicant_id = $id";
      $img_result = mysqli_query($connect, $img_query);
      while($img_class_row = mysqli_fetch_array($img_class_result)){
           $file_class_dest = $img_class_row['img_dir'];
           if($file_class_dest != NULL){
               $hasCertificate = 1;
           }
           else{
               $hasCertificate = 0;
           }
      }
      while($img_row = mysqli_fetch_array($img_result)){
          $file_dest = $img_row['img_dir'];
          $img_class = $img_row['img_class'];
          //echo "$file_dest";
          if($img_class == 1){
               echo "<img src=\"$file_dest\" alt=\"Profile Pic\" width=\"150\" height=\"150\">";
          }
          
      }

      $table_name = "applicant_details";
      $query = "SELECT a.firstname,a.middlename,a.lastname,a.gender,DATE_FORMAT(a.dateBirth,'%b %d %Y') as birthday,a.address,a.address2,a.city,a.state,a.zipcode,a.app_status,DATEDIFF(CURDATE(),a.date_applied) as pending_days,b.init_score,c.job_history_id FROM $table_name a JOIN app_add_details b ON a.applicant_id = b.applicant_id JOIN job_history c ON a.job_history_id = c.job_history_id WHERE a.applicant_id = $id ";  
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
          $init_score = $row['init_score'];
          $job_history_id  =$row['job_history_id'];
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
     else if($status==4){
          echo "<hr>";
          echo "<p><b>Status:</b></p>". "<p style=\"color: red\"> <b>Rejected</b></p>";
     }
     else{
          echo "<hr>";
          echo "<p><b>Status:</b></p>". "<p style=\"color: green\"> <b>Passed</b></p>";
     }
     echo "<hr>";
     if($hasCertificate == 1){
          echo "<a role=\"button\" data-toggle=\"collapse\" href=\"#cert_collapse\" class=\"btn btn-success\" id=\"see_cert\" >See Certificates</a>";
     }
     else{
          echo "<p>Has (0) Certificates Submitted<p>";
     }
    
     ?>

     <div class="container collapse" id="cert_collapse">
     
          <div class="mt-4 mb-4">
     <?php 
          $img_class_query = "SELECT img_dir FROM $img_table WHERE applicant_id = $id AND img_class = 2";
          $img_class_result = mysqli_query($connect, $img_class_query);
          while($img_class_row = mysqli_fetch_array($img_class_result)){
          $file_class_dest = $img_class_row['img_dir'];
          echo "<img class=\"mt-2 data-fetch-img\" src=\"$file_class_dest\" alt=\"Profile Pic\" width=\"150\" height=\"150\">";
          echo "<input type=\"checkbox\" name=\"approval_checkbox\" class=\"ml-4\" value=\"5\">";
          }
     
     ?>
          </div>

     </div>

     
     

     <?php 
     echo "<hr>";
     if($status>4){
          echo "<button class=\"btn btn-primary\" id=\"move_up\" value=$id data-id=$job_history_id data-score=$init_score data-user=$fname  data-status=$status onclick=\"move_record()\">Employ</button>";
     }
     else{
          echo "<button class=\"btn btn-success\" id=\"move_up\" value=$id data-id=$job_history_id data-score=$init_score data-user=$fname data-status=$status onclick=\"move_record()\">Move Up</button>";
     }
     
     echo "<button class=\"ml-2 btn btn-danger\" id=\"del_btn\" value=$id onclick=\"del_record()\" >Reject</button>";
     
 }  
 ?>

<script>
    $(document).ready(function(){
    $("img").click(function(){
          image_dest = $(this).attr('src');
          image_resized = '<img class="mt-2 data-fetch-img" src="'+ image_dest+ '" alt="Profile Pic" width="400" height="400">';
          $('#image_modal_content').html(image_resized);
          $('#imageModal').modal('show');  
    });
    });
</script>

