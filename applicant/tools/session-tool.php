<?php 
session_start();
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
                $recent_id = $_POST['recent_id'];
                $status = 2;
                

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
  }
  
}
else{
  echo "Error";
}
?>