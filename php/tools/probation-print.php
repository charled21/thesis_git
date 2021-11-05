

<?php


$data = isset($_REQUEST['myData'])?$_REQUEST['myData']:"";
//echo $data;

//$emp_query = "SELECT applicant_id, firstname, lastname, gender, city FROM applicant_details WHERE status = 4;";


if($data==1){
    $emp_query = "SELECT applicant_id, firstname, lastname, gender, city FROM applicant_details WHERE app_status < 4;";
}
else if($data==2){
    $emp_query = "SELECT applicant_id, firstname, lastname, gender, city FROM applicant_details WHERE app_status = 4;";
}

    //probation employees print start

        $con=mysqli_connect("localhost","root","","thesis_1");
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        
        $resultData = mysqli_query($con,$emp_query);

        //var_dump($resultData);
        echo "<div>";
        echo "<table class='col-sm-12'>
        <tr>
        <th>Applicant ID</th> <th>Firstname</th>   <th>Lastname</th>   <th>Gender</th>    <th>City</th>    
            </tr>";

        while($row = mysqli_fetch_array($resultData))
        {
        echo "<tr>";
        echo "<td>" .  "<font>" . $row['applicant_id'] . "</font>" ."</td>";
        //echo "</tr>";

        //echo "<tr>";
        echo "<td>" .  "<font>" . $row['firstname'] . "</font>" ."</td>";
        //echo "</tr>";

        //echo "<tr>";
        echo "<td>" .  "<font>" . $row['lastname'] . "</font>" ."</td>";
        //echo "</tr>";

        //echo "<tr>";
        echo "<td>" .  "<font>" . $row['gender'] . "</font>" ."</td>";
        //echo "</tr>";

        //echo "<tr>";
        echo "<td>" .  "<font>" . $row['city'] . "</font>" ."</td>";
        echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        mysqli_close($con);
        //probation employees print end
    ?>