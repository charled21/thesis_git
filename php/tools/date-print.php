<?php
    //date print start
    $data = isset($_REQUEST['myData'])?$_REQUEST['myData']:"";

        $con=mysqli_connect("localhost","root","","thesis_1");
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $attendance_query = "SELECT DATE_FORMAT(eval_datetime,'%W - %M %d, %Y - %r') AS logindatetime,eval_status FROM eval_details where applicant_id='$data';";
        $resultData = mysqli_query($con,$attendance_query);

        //var_dump($resultData);
        echo "<div>";
        echo "<table>
        <tr>
        <th>DATE</th> <th>STATUS</th> 
            </tr>";

        while($row = mysqli_fetch_array($resultData))
        {
        $emp_att = $row['eval_status'];
        

        echo "<tr>";
        echo "<td>" .  "<font>" . $row['logindatetime'] . "</font>" ."</td>";

        if($emp_att==1){
            $emp_att = 'ON TIME';
        }
        else{
            $emp_att = 'LATE';
        }

        echo "<td>" .  "<font>" . $emp_att . "</font>" ."</td>";
        echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        mysqli_close($con);

        //date print end
    ?>