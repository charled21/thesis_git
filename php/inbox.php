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

  




    <form action="" method="POST">
        <?php 

$row_cnt = 0;
$per_id_arr = array();
$app_per_id = array();
$i = 0;

$length = count($per_id_arr);
$ft_tables="applicant_details";
if (isset($_POST['ft_tables2'])) {
    $ft_tables = $_POST['ft_tables2'];
}
else{
	
}
$ftable2 = 'applicant_service';
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);


                        $schemaQuery = "SELECT COLUMN_NAME FROM
                        INFORMATION_SCHEMA.COLUMNS 
                        WHERE TABLE_NAME = '$ft_tables'";
                        //start of display
                        $dataQuery2 = "SELECT a.applicant_id,a.firstname,a.lastname,d.init_score,e.w_score,a.app_status,a.job_history_id,c.job_name FROM $ft_tables a JOIN job_history b ON a.job_history_id = b.job_history_id JOIN job_req c ON b.job_id = c.job_id JOIN app_add_details d ON d.applicant_id = a.applicant_id JOIN personality_types e ON e.per_id = d.per_id WHERE a.app_status < 4";
                        echo "<input class=\"form-control\" id=\"ft_tables\" type=\"text\" name=\"ft_tables\" value=\"$ft_tables\"  hidden>";
                        echo "<div>";
                        echo "<table class='col-sm-12'>
                        <tr>";
                        $result3 = mysqli_query($connect, $dataQuery2);
                        $result2 = mysqli_query($connect, $schemaQuery);
                            $th2 = "";

                            //moved the headers here
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
                                

                                if($row['app_status']>3){
                                    
                                }
                                else{
                                    $max_score = 25;
                                    $row_cnt++;
                                    $init_score = $row['init_score'];
                                    $add_score = ($init_score / $max_score)*100;
                                    echo "<script>console.log('addscore = $add_score');</script>";
                                    $per_score = $row['w_score'];                                    
                                    $percentage = ($per_score / $max_score)*100;
                                    echo "<script>console.log('% = $percentage');</script>";
                                    $total_score = $percentage + $add_score;
                                    echo "<script>console.log('total = $total_score');</script>";
                                    echo "<tr>";   
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

                                    //status changer start
                                    $current_status="";
                                        if($row['app_status']==1){
                                            $current_status = "Missing Personal Info";
                                        }
                                        else if($row['app_status']==2){
                                            $current_status = "Lacking Examination";
                                        }
                                        else if($row['app_status']==3){
                                            $current_status = "Awaiting Interview";
                                        }
                                    //status changer end
    
                                    echo "<td>" .  "<font style=\"font-size: 14px;\">" . $current_status . "</font>" ."</td>";

                                    
                                    echo "<td>" . "<button type=\"button\" class=\"btn btn-primary mb-2\" data-id=$row_num data-toggle=\"modal\" data-target=\"#myModal\">Review</button>"."</td>";
                                    echo "</tr>";
                                    }
                                }
                                
                            }
                            
                                echo "</table>";
                                
                                mysqli_close($connect);
                    
                        //end of display start of original
						
                        ?>
            

</form>

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



</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
         

<script>
    $('button').click(function() {
        // var row = $(this).closest("tr");
        // var tds2 = row.find("td:nth-child(1)").val();
        var tds2 =$(this).data('id');
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
    });
</script>

<script>

    function move_record() {
            total_pts = 0;
            var job_id =$('#move_up').val();
            $('input:checkbox:checked').each(function(){ 
                        total_pts += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
                    });  

                    $.ajax({
					type: 'POST',
					url: "move-up.php",
					data: {total_pts : total_pts},
					success: function(data){
                        alert('Applicant Moved To Next Phase! Total pts = '+total_pts);
					},
					error: function(data){
						alert('Error!');
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




        

</body>
</html>