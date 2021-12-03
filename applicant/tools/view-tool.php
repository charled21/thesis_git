<?php 
			if(isset($_POST)){
                $checked_array=array();
                $checked_array = $_POST['checked_ones'];
                $dropdown = $_POST['dropdown'];
                $length = count($checked_array);
                $condition1 = 'WHERE a.app_status = 6';
                $condition2 = 'WHERE a.app_status < 6';
                $select_syntax = '';
                $original_syntax = "SELECT a.applicant_id,a.firstname,a.lastname,a.gender,a.city,DATE_FORMAT(a.dateBirth,'%b %d, %Y') as birthday,a.zipcode,d.app_mobile,d.app_email,f.religion_name,g.app_civil_name,c.job_name,b.job_city,e.per_name,d.init_score,e.w_score,h.emp_status_name";
                $employed_syntax = "SELECT a.applicant_id,a.firstname,a.lastname,a.gender,a.city,DATE_FORMAT(a.dateBirth,'%b %d, %Y') as birthday,a.zipcode,d.app_mobile,d.app_email,f.religion_name,g.app_civil_name,c.job_name,b.job_city,e.per_name,d.init_score,e.w_score,h.emp_status_name,DATE_FORMAT(i.hired_date, '%b %d %Y') as date_hired";
                $join_syntax= "";
                $employed_join = "JOIN app_emp_details i ON i.applicant_id = a.applicant_id";
                if($dropdown == 2){
                    $condition = $condition1;
                    $select_syntax = $employed_syntax;
                    $join_syntax = $employed_join;
                }
                else if ($dropdown == 3){
                    $condition = $condition2;
                    $select_syntax = $original_syntax;
                    $join_syntax = "";
                }
                else {
                    $condition = '';
                    $select_syntax = $original_syntax;
                    $join_syntax = "";
                }
                for($i=0;$i<$length;$i++){
                    //echo $checked_array[$i];
                }

                $ftable2 = 'applicant_details';
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $databaseName = "thesis_1";

                $connect = mysqli_connect($hostname, $username, $password, $databaseName);

                $query2 = "$select_syntax FROM applicant_details a JOIN job_history b ON a.job_history_id = b.job_history_id JOIN job_req c ON c.job_id = b.job_id JOIN app_add_details d ON a.applicant_id = d.applicant_id JOIN personality_types e ON e.per_id = d.per_id JOIN religion f on f.app_religion_id = d.app_religion JOIN civil_status g ON g.app_civil_status = d.app_civil_status JOIN employment_status h ON h.emp_status_id = a.app_status $join_syntax $condition";
                $result = mysqli_query($connect, $query2);

                echo "<div>";
                echo "<table class='col-sm-12' border=\"0px\">
                <tr>";
                for($i=0;$i<$length;$i++){
                
                if($checked_array[$i]==1){
                    echo "<th>Fullname";
                    echo "<hr>";
                }
                if($checked_array[$i]==2){
                    echo "<th>Gender";
                    echo "<hr>"; 
                }
                if($checked_array[$i]==3){
                    echo "<th>City";
                    echo "<hr>";
                }
                if($checked_array[$i]==4){
                    echo "<th>Birthday";
                    echo "<hr>";
                }
                if($checked_array[$i]==5){
                    echo "<th>Zipcode";
                    echo "<hr>";
                }
                if($checked_array[$i]==6){
                    echo "<th>Mobile No.";
                    echo "<hr>";
                }
                if($checked_array[$i]==7){
                    echo "<th>Email";
                    echo "<hr>";
                }
                if($checked_array[$i]==8){
                    echo "<th>Religion";
                    echo "<hr>";
                }
                if($checked_array[$i]==9){
                    echo "<th>Civil Status";
                    echo "<hr>";
                }
                if($checked_array[$i]==10){
                    echo "<th>Position Applied";
                    echo "<hr>";
                }
                if($checked_array[$i]==11){
                    echo "<th>City Assigned";
                    echo "<hr>";
                }
                if($checked_array[$i]==12){
                    echo "<th>Personality Type";
                    echo "<hr>";
                }
                if($checked_array[$i]==13){
                    echo "<th>Total Score";
                    echo "<hr>";
                }
                if($checked_array[$i]==14){
                    echo "<th>Employment Status";
                    echo "<hr>";
                }
                if($checked_array[$i]==15){
                    echo "<th>Date Hired";
                    echo "<hr>";
                }
                
                
                               
                

                } //for loop - end

                echo "</th> </tr>";

				            while($row = mysqli_fetch_array($result))
                                {
                                $fullname = $row['firstname'] ." ". $row['lastname'];
                                $row_num = $row['applicant_id'];
                                echo "<tr>";     
                                for($i=0;$i<$length;$i++){
                                    if($checked_array[$i]==1){
                                        echo "<td>" .  "<font>" . $fullname . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==2){
                                        echo "<td>" .  "<font>" . $row['gender'] . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==3){
                                        echo "<td>" .  "<font>" . $row['city'] . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==4){
                                        echo "<td>" .  "<font>" . $row['birthday'] . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==5){
                                        echo "<td>" .  "<font>" . $row['zipcode'] . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==6){
                                        echo "<td>" .  "<font>" . $row['app_mobile'] . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==7){
                                        echo "<td>" .  "<font>" . $row['app_email'] . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==8){
                                        echo "<td>" .  "<font>" . $row['religion_name'] . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==9){
                                        echo "<td>" .  "<font>" . $row['app_civil_name'] . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==10){
                                        echo "<td>" .  "<font>" . $row['job_name'] . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==11){
                                        echo "<td>" .  "<font>" . $row['job_city'] . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==12){
                                        echo "<td>" .  "<font>" . $row['per_name'] . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==13){
                                        $w_score = $row['w_score'];
                                        $init_score = $row['init_score'];
                                        $tempScore1 = ($w_score + $init_score)/25;
                                        $tempScore2 = $tempScore1 * 100;
                                        echo "<td>" .  "<font>" . $tempScore2 . "%". "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==14){
                                        echo "<td>" .  "<font>" . $row['emp_status_name'] . "</font>" ."</td>";
                                    }
                                    if($checked_array[$i]==15){
                                        echo "<td>" .  "<font>" . $row['date_hired'] . "</font>" ."</td>";
                                    }
                                }
                               
                                
                                
                                
                                
                                echo "</tr>";
                                }
			}
			else{
				echo "Error";
			}

?>




