<?php  
 $connect = mysqli_connect("localhost", "root", "", "thesis_1"); 
 $id =  intval($_POST['tds2']); 
 echo "<script>console.log($id);</script>";
 if(isset($_POST["tds2"]))  
 {  
      $table_name = "applicant_details";
      $query = "SELECT firstname,middlename,lastname,gender,dateBirth,address,address2,city,state,zipcode,app_status FROM $table_name WHERE applicant_id = $id ";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_array($result))
     {
          $fname = $row['firstname'];
          $mname = $row['middlename'];
          $lname = $row['lastname'];
          $gender = $row['gender'];
          $birth = $row['dateBirth'];
          $address = $row['address'];
          $address2 = $row['address2'];
          $city = $row['city'];
          $state = $row['state'];
          $zip = $row['zipcode'];
          $status = $row['app_status'];
     }
     echo "<p>Firstname: $fname</p>";
     echo "<p>Middlename: $mname</p>";
     echo "<p>Lastname: $lname</p>";
     echo "<p>gender: $gender</p>";
     echo "<p>birthday: $birth</p>";
     echo "<p>add: $address</p>";
     echo "<p>add2: $address2</p>";
     echo "<p>City: $city</p>";
     echo "<p>State: $state</p>";
     echo "<p>Zip: $zip</p>";
     if($status<4){
          echo "<p>Status:</p><p style=\"color: red\"> Ongoing</p>";
     }
     else{
          echo "<p>Status:</p><p style=\"color: green\"> Passed</p>";
     }
     
 }  
 ?>