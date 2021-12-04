<?php
require_once(__DIR__.'/../php/db-config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Profiles</title>

    <!-- Custom fonts for this template-->
    <link href="/thesis_git/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->

    <link href="/thesis_git/css/main.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/thesis_git/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/thesis_git/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body>



<div class="container">
    <div class="row mt-4">

        <div class="col">
        <h3 class="mt-4 mb-4">APPLICANT RECORDS</h3>
        </div>

        <div class="col-md-4">
        <div class="mt-4 mb-4 input-group rounded">
        <!-- <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
        aria-describedby="search-addon" id="search_bar" />
        <span class="ml-2 input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i> -->
        </span>
        </div>

    </div>

</div>
    

    <div class="form-group-row d-flex justify-content-between">

        <!-- dropdown start-->
        <div class="col-md-6 mb-2">
            <select id="records_view">
            <option value="1" >All Records</option>
            <option value="2">Employed</option>
            <option value="3">Ongoing Application</option>
            </select>
            <a role="button" class="btn btn-primary" id="view_btn">View</a>   
        </div>

        <div class="col-md-6 mb-2">
            <a role="button" id="exp_csv" class="btn btn-success align-items-right" hidden>Export to CSV</a> 
        </div>

    </div>
    


    <div class="mb-4 col-md-12">
        <a class="btn btn-success" role="button" type="button" id="criteria" data-toggle="collapse" href="#criteria_collapse"> Criterias</a>
    </div>

    <!-- collapse start -->
    <div class="container collapse" id="criteria_collapse">

    <div class="d-flex justify-content-between mb-4">
        <div class="form group-row"><input type="checkbox" id="fullname" name="fullname" value="1" checked disabled> Fullname</div>
        <div class="form group-row"><input type="checkbox" id="gender" name="gender" value="2" checked> Gender</div>
        <div class="form group-row"><input type="checkbox" id="city" name="city" value="3" checked> City</div>
        <div class="form group-row"><input type="checkbox" id="bday" name="bday" value="4"> Birthday</div>
        <div class="form group-row"><input type="checkbox" id="zip" name="zip" value="5"> Zip</div>
        <div class="form group-row"><input type="checkbox" id="mobile_no" name="mobile_no" value="6" checked> Mobile No.</div>
        <div class="form group-row"><input type="checkbox" id="email_chkbox" name="email_chkbox" value="7"> Email</div>
        <div class="form group-row"><input type="checkbox" id="religion_chkbox" name="religion_chkbox" value="8"> Religion</div>
        <div class="form group-row"><input type="checkbox" id="civ_status_chkbox" name="civ_status_chkbox" value="9"> Civil Status</div>
        
        
    
    </div>
    <hr>
    <div class="d-flex justify-content-between mb-4">
        <div class="form group-row"><input type="checkbox" id="position_applied" name="position_applied" value="10" checked> Position Applied</div>
        <div class="form group-row"><input type="checkbox" id="assign_city" name="assign_city" value="11" checked> City Assigned</div>
        <div class="form group-row"><input class="" type="checkbox" id="per_chkbox" name="per_chkbox" value="12"> Personality type</div>
        <div class="form group-row"><input type="checkbox" id="score_chkbox" name="score_chkbox" value="13"> Total Score</div>
        <div class="form group-row"><input type="checkbox" id="emp_status" name="emp_status" value="14"> Employment Status</div>
        <div class="form group-row"><input type="checkbox" id="date_hired" name="date_hired" value="15" disabled> Date Hired</div>
    </div>

    </div>
    <!-- collapse end -->
    
    <!-- dropdown end -->


    <form action="inbox-review.php" method="post">
        <?php 

$ft_tables="applicant_details";
if (isset($_POST['ft_tables2'])) {
    $ft_tables = $_POST['ft_tables2'];
}
else{
	
}
$ftable2 = 'applicant_details';
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";
$display = 0;

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

                        $employeeQuery = "SELECT COLUMN_NAME FROM
                        INFORMATION_SCHEMA.COLUMNS 
                        WHERE TABLE_NAME = '$ft_tables'";

                        //start of display
                        //$schemaQuery = "SELECT * FROM $ft_tables";
                        //DATE_FORMAT((dateBirth),'%b %d, %Y')
                        $schemaQuery = "SELECT a.applicant_id, a.firstname, a.middlename, a.lastname, a.gender,  DATE_FORMAT(a.dateBirth,'%b %d, %Y') as birthday, a.address, a.address2, a.city, a.state, a.zipcode FROM $ft_tables a";
                        echo "<input class=\"form-control\" id=\"ft_tables\" type=\"text\" name=\"ft_tables\" value=\"$ft_tables\"  hidden>";
                        echo "<div>";
                        echo "<table class='col-sm-12' border=\"0px\">
                        <tr>";
                        $result3 = mysqli_query($connect, $schemaQuery);
                        $result2 = mysqli_query($connect, $employeeQuery);
                            $th2 = "";
                            

                            //moved headers here
                            if($display == 1){
                                echo "<th>Fullname";
                                echo "<hr>";
                                echo "<th>Gender";
                                echo "<hr>";
                                echo "<th>Birthday";
                                echo "<hr>";
                                echo "<th>City";
                                echo "<hr>";
                                echo "<th>Province";
                                echo "<hr>";
                                echo "<th>Zipcode";
                                echo "<hr>";
                            }
                            else{

                            }
                            

                            //moved headers here end

                        echo "</th> </tr>";

                            
                            if($display == 1){
                                while($row = mysqli_fetch_array($result3))
                                {
                                $fullname = $row['firstname'] ." ". $row['lastname'];
                                $row_num = $row['applicant_id'];
                                echo "<tr>";     
                                echo "<td>" .  "<font>" . $fullname . "</font>" ."</td>";
                                echo "<td>" .  "<font>" . $row['gender'] . "</font>" ."</td>";
                                echo "<td>" .  "<font>" . $row['birthday'] . "</font>" ."</td>";
                                echo "<td>" .  "<font>" . $row['city'] . "</font>" ."</td>";
                                echo "<td>" .  "<font>" . $row['state'] . "</font>" ."</td>";
                                echo "<td>" .  "<font>" . $row['zipcode'] . "</font>" ."</td>";
                                echo "</tr>";
                                }
                            }
                            else{

                            }
                            
                                echo "</table>";
                                
                                mysqli_close($connect);
                    
                        //end of display start of original
						
                        ?>
            

</form>



</div>

<div id="passed_content"></div>



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

    <script src="/thesis_git/js/csv-export.js"></script>


<script type="text/javascript">
$(document).ready(function(){

    $('button').click(function() {
    let xhr = new XMLHttpRequest();
    let url = new URL('https://localhost/thesis_git/php/inbox-review.php');
    var row = $(this).closest("tr");
    var tds2 = row.find("td:nth-child(1)").text();

    //alert("You have clicked "+ tds2 +"!");

    
    $.ajax({
        type: "POST",
        url: "inbox-review.php",
        data: {tds2 : tds2},
        success: function (data) {
            console.log(data);
                    xhr.open('GET', url);
                    
            }        
        });
    });
});
</script>

<script>
    $('#view_btn').click(function(){
        checked_ones = [];
        dropdown = $('#records_view').val();
        
        if(dropdown == 2){
            $('#date_hired').removeAttr("disabled"); 
            $('#exp_csv').prop("hidden",false);           
        }
        else{
            $('#date_hired').prop("checked",false);
            $('#date_hired').attr("disabled",true);
            $('#exp_csv').prop("hidden",true);    
        }
        $('input:checkbox:checked').each(function(){
            checked_ones.push($(this).val());
            
        });  
        $.ajax({
        type: "POST",
        url: "tools/view-tool.php",
        data: {checked_ones :checked_ones , dropdown : dropdown},
        success: function (data) {
            $('#passed_content').html(data);
            }        
        });
    });
</script>

<script>
    // $('#search-addon').click(function(){
    //     search_text = $('#search_bar').val();
    //     alert('firing!');
    //     //alert(search_text);
    // });
</script>
        

</body>
</html>