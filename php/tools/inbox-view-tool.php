<?php 
if(isset($_POST)){
    $checked_array=array();
    $checked_array = $_POST['checked_ones'];
    $passed_dropdown = $_POST['checked_ones'];

$row_cnt = 0;
$per_id_arr = array();
$app_per_id = array();
$i = 0;

//$length = count($checked_array);
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

                        $condition = "";
                        $img_cond = "(g.applicant_id = a.applicant_id AND g.img_class = 1)";
                        $condition1 = "(a.app_status < 4 AND a.app_status > 0)";
                        $condition2 = "(a.app_status = 3)";
                        $condition3 = "(a.app_status = 5)";

                        if($passed_dropdown==0){                                
                            $condition = $condition1;
                        }
                        if($passed_dropdown==1){                                
                            $condition = $condition2;
                        }
                        if($passed_dropdown==2){                                
                            $condition = $condition3;
                        }
                        if($passed_dropdown==3){                                
                            $condition = $condition1;
                        }
                        
                        // for($i=0;$i<$length;$i++){
                        //     if($checked_array[$i]==0){                                
                        //         $condition = $condition1;
                        //     }
                        //     if($checked_array[$i]==1){                                
                        //         $condition = $condition2;
                        //     }
                        //     if($checked_array[$i]==2){                                
                        //         $condition = $condition3;
                        //     }
                        //     if($checked_array[$i]==3){                                
                        //         $condition = $condition4;
                        //     }
                        // }
                        //start of display
                        $dataQuery2 = "SELECT a.applicant_id,a.firstname,a.lastname,d.init_score,e.w_score,a.app_status,a.job_history_id,c.job_name,f.emp_status_name,g.img_dir FROM $ft_tables a JOIN job_history b ON a.job_history_id = b.job_history_id JOIN job_req c ON b.job_id = c.job_id JOIN app_add_details d ON d.applicant_id = a.applicant_id JOIN personality_types e ON e.per_id = d.per_id JOIN employment_status f ON f.emp_status_id = a.app_status JOIN images g ON $img_cond WHERE $condition";

                        //previous query with image --
                        // $imgQuery = "SELECT a.applicant_id,a.firstname,a.lastname,d.init_score,e.w_score,a.app_status,a.job_history_id,c.job_name,f.emp_status_name,g.img_dir FROM applicant_details a JOIN job_history b ON a.job_history_id = b.job_history_id JOIN job_req c ON b.job_id = c.job_id JOIN app_add_details d ON d.applicant_id = a.applicant_id JOIN personality_types e ON e.per_id = d.per_id JOIN employment_status f ON f.emp_status_id = a.app_status JOIN images g ON (g.applicant_id = a.applicant_id AND g.img_class = 2) WHERE (a.app_status < 4 AND a.app_status > 0)";

                        $certQuery = "SELECT a.applicant_id,a.firstname,a.lastname,d.init_score,e.w_score,a.app_status,a.job_history_id,c.job_name,f.emp_status_name,g.img_dir FROM $ft_tables a JOIN job_history b ON a.job_history_id = b.job_history_id JOIN job_req c ON b.job_id = c.job_id JOIN app_add_details d ON d.applicant_id = a.applicant_id JOIN personality_types e ON e.per_id = d.per_id JOIN employment_status f ON f.emp_status_id = a.app_status JOIN images g ON $img_cond WHERE (a.has_cert > 0)";

                        echo "<input class=\"form-control\" id=\"ft_tables\" type=\"text\" name=\"ft_tables\" value=\"$ft_tables\"  hidden>";
                        echo "<div>";
                        echo "<table class='col-sm-12'>
                        <tr>";
                        if($passed_dropdown==4){                              
                            $dataQuery2 = $certQuery;
                        }
                        $result3 = mysqli_query($connect, $dataQuery2);

                            //criteria - checkbox -start
                            
                            
                            //criteria - checkbox - end
                            //moved the headers here
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
                                
                                mysqli_close($connect);
                    
                        //end of display start of original
						

                        
}



?>