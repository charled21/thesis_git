<?php session_start();
$row_cnt = 0;
$ft_tables="applicant_details";
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$dataQuery2 = "SELECT a.applicant_id,a.firstname,a.lastname,d.init_score,e.w_score,a.app_status,a.job_history_id,c.job_name,f.emp_status_name,g.img_dir FROM $ft_tables a JOIN job_history b ON a.job_history_id = b.job_history_id JOIN job_req c ON b.job_id = c.job_id JOIN app_add_details d ON d.applicant_id = a.applicant_id JOIN personality_types e ON e.per_id = d.per_id JOIN employment_status f ON f.emp_status_id = a.app_status JOIN images g ON (g.applicant_id = a.applicant_id AND g.img_class = 1)  WHERE (a.app_status < 6 AND a.app_status > 0)";

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox Display</title>
    

    <!-- Custom fonts for this template-->
    <link href="/thesis_git/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    

    <!-- Custom styles for this template-->
    <link href="/thesis_git/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/thesis_git/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="/thesis_git/css/main.css" rel="stylesheet">

</head>
<body>


<div class="container">
    <h3 class="mt-4 mb-4">INBOX</h3>

<div class="d-flex mb-4 col-md-10">
  <?php $priv = $_SESSION['acct_priv'];

if($priv > 5){
    echo "<div class=\"mr-2\"><b>Filters:</b></div>";
    echo "<div class=\"mr-2 form group-row\">";
    echo "<select id=\"records_view\">";
    echo "<option value=\"0\" selected>All Pending</option>" ;      
    echo "<option value=\"1\">Awaiting Interview</option>";        
    echo "<option value=\"2\">Accepted Applicants</option>";      
    echo "<option value=\"3\">Rejected Applicants</option>";  
    echo "</select>";  
    echo "</div>";

    echo "<div class=\"form group-row\">";
    echo "<a role=\"button\" class=\"btn btn-info\" id=\"view_btn\">View</a>   ";
    echo "</div>";
          
}
else{
    
    
}
  ?>
  </div>

    <form action="" method="POST">
    <div id="passed_content"> 
    <?php 
    if($priv <10){
        echo "<input class=\"form-control\" id=\"ft_tables\" type=\"text\" name=\"ft_tables\" value=\"$ft_tables\"  hidden>";
        echo "<div>";
        echo "<table class='col-sm-12'>
        <tr>";
        $result3 = mysqli_query($connect, $dataQuery2);
        echo "<th class=\"mb-4\" style=\"font-size:16px;\">Profile Pic";
                            echo "<hr>";
                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">Applicant No.";
                            echo "<hr>";
                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">Applicant ID";
                            echo "<hr>";
                            echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Position Applied";
                            echo "<hr>";
                            echo "<th class=\"mb-4\" style=\"font-size:16px;\">Firstname";
                            echo "<hr>";
                            echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Lastname";
                            echo "<hr>";
                            echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Rating";
                            echo "<hr>";
                            echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Status";
                            echo "<hr>";
                            
                            echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Actions";
                            echo "<hr>";
                        echo "</th> </tr>";

                            if($ft_tables=="applicant_details"){
                                while($row = mysqli_fetch_array($result3))
                                {
                                
                                $row_num = $row['applicant_id'];
                                

                                    $max_score = 25;
                                    $row_cnt++;
                                    $init_score = $row['init_score'];
                                    $add_score = ($init_score / $max_score)*100;
                                    echo "<script>console.log('addscore = $add_score');</script>";
                                    $per_score = $row['w_score'];                                    
                                    $percentage = ($per_score / $max_score)*100;
                                    echo "<script>console.log('% = $percentage');</script>";
                                    $total_score = $percentage + $add_score;
                                    if($total_score>100){
                                        $total_score = 100;
                                    }
                                    echo "<script>console.log('total = $total_score');</script>";
                                    echo "<tr>";   
                                    //echo $row['img_dir'];
                                    echo "<td>" . "<img src=\""  . $row['img_dir'] . "\" style=\"height: 40px; width: 40px;\">" . "</font>"."</td>";   
                                    echo "<td>" .  "<font style=\"font-size: 14px;\" >" . $row_cnt . "</font>"."</td>";                             
                                    echo "<td>" .  "<font style=\"font-size: 14px;\" >" . "00".$row['applicant_id'] . "</font>"."</td>";
                                    echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['job_name'] . "</font>" ."</td>";
                                    echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['firstname'] . "</font>" ."</td>";
                                    echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['lastname'] . "</font>" ."</td>";
    
                                    //rating part
                                    if($total_score > 80){
                                        echo "<td>" .  "<font style=\"font-size: 14px; color: green;\"><b>" . $total_score ."%" ."</b></font>" ."</td>";
                                    }
                                    else if($total_score >50 && $total_score < 81){
                                        echo "<td>" .  "<font style=\"font-size: 14px; color: orange;\"><b>" . $total_score ."%" ."</b></font>" ."</td>";
                                    }
                                    else if($total_score >0 && $total_score < 51){
                                        echo "<td>" .  "<font style=\"font-size: 14px; color: red;\"><b>" . $total_score ."%" ."</b></font>" ."</td>";
                                    }
                                    else {

                                    }
                                    //rating end
    
                                    echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['emp_status_name'] . "</font>" ."</td>";

                                    
                                    echo "<td>" . "<button type=\"button\" class=\"btn btn-primary mb-2\" data-id=$row_num data-toggle=\"modal\" data-target=\"#myModal\" onclick=\"review(this);\">Review</button>"."</td>";
                                    echo "</tr>";
                                    
                                }
                                
                            }
                            
                                echo "</table>";
    } 
    else{

    }
    ?>

    </div>
            

</form>

<!-- email details -start -->
<form id="myForm" action="" method="POST">
        <input type="text" id="name" value="Motor Trade Butuan" hidden>
        <input type="text" id="email" value="no-reply@motortrade.com.ph" hidden>
        <input type="text" id="subject" value="Job Application - Phase 3" hidden>
        <input type="text" id="email2" value="ralph.alfaras@urios.edu.ph" hidden>
        <textarea id="body" cols="30" rows="5" hidden></textarea>
        </form>
<!-- email details -end -->

<!-- Modal -->
<div class="modal fade  come-from-modal right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Applicant Data</h4>
            </div>
            <div class="modal-body">
                
            <div id="modal_content"></div>
            
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel">
     <div class="modal-dialog" role="document">
          <div class="modal-content">

               <div id="image_modal_content" class="d-flex justify-content-center"></div>
               
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
          </div>
     </div>
     </div>


<?php $interview_date=Date('D M d,Y', strtotime('+7 days'));?>
</div>

<!-- Bootstrap core JavaScript-->
<script src="/thesis_git/vendor/jquery/jquery.min.js"></script>
    <script src="/thesis_git/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/thesis_git/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/thesis_git/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/thesis_git/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/thesis_git/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/thesis_git/js/demo/datatables-demo.js"></script>

    <script>
        function review(val) {
            var tds2 =$(val).data('id');
            //alert(tds2);
            $.ajax({
					type: 'POST',
					url: "data-fetch.php",
					data: {tds2 : tds2},
					success: function(data){
                        $('#modal_content').html(data);  
                        $('#myModal').modal('show');
					},
					error: function(data){
						alert('Error!');
					}
				});
        }
    </script>


<script>

    function move_record() {
            var applicant_id =$('#move_up').val();
            var job_history_id =$('#move_up').data('id');
            var init_score =$('#move_up').data('score');
            var firstname = $('#move_up').data('user');
            var data_status = $('#move_up').data('status');
        $("#body").html("Hi "+firstname+"!<br><br>You are scheduled for an interview on <?php echo "$interview_date"; ?> 09:00AM.<br><br>Your token is Y3YY.<br><br>To join the video meeting, click this link: https://meet.google.com/xxx-xxxx-xxx<br>Otherwise, to join by phone, dial +1 999-999-9999 and enter this PIN: 999 999 999#");

        if (confirm('Are you sure you want to promote this employee to the next step?')) {
            alert('Applicant has been moved!');
            //setTimeout(parent.location.reload(true),2000);
            setTimeout(location.reload(true),2000);
        }
                name = $('#name').val();
				email = $('#email').val();
                subject = $('#subject').val();
                body = $('#body').val();
                email2 = $('#email2').val();
            total_pts = 0;
            
           



            $('input:checkbox:checked').each(function(){ 
                        total_pts += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
                    });  

                    $.ajax({
					type: 'POST',
					url: "move-up.php",
					data: {total_pts : total_pts , applicant_id : applicant_id, job_history_id : job_history_id , init_score : init_score, data_status : data_status},
					success: function(data){

					},
					error: function(data){
						alert('Error!');
					}
                    
				    });

                    $.ajax({
					type: 'POST',
					url: "/thesis_git/hr/sendEmail.php",
					data: {name : name, email : email, subject : subject, body : body, email2 : email2},
					success: function(data){
						console.log("data= "+data);
                    alert('Email Sent!');
					},
					error: function(data){
						alert('Something went wrong!');
					}
				    });


    }
</script>

<script>
    
        function del_record() {
            var job_id =$('#del_btn').val();
            $.ajax({
					type: 'POST',
					url: "inbox-drop-record.php",
					data: {job_id :job_id},
					success: function(data){
                        setTimeout(function(){ window.parent.location.reload(); }, 2000);
					},
					error: function(data){
						alert('Error!');
					}
				});
                
        }

    
</script>

<script>
$(function(){
    checked_ones = $('#records_view').val();
        
        $.ajax({
        type: "POST",
        url: "tools/inbox-view-tool.php",
        data: {checked_ones :checked_ones},
        success: function (data) {
            $('#passed_content').html(data);
            console.log(data);
            }        
        });
        
    $('#view_btn').click(function(){
        // checked_ones = [];
        // $('input:checkbox:checked').each(function(){
        //     checked_ones.push($(this).data('id'));            
        // });  
        checked_ones = $('#records_view').val();
        
        $.ajax({
        type: "POST",
        url: "tools/inbox-view-tool.php",
        data: {checked_ones :checked_ones},
        success: function (data) {
            $('#passed_content').html(data);
            console.log(data);
            }        
        });
    });
});
</script>




        

</body>
</html>