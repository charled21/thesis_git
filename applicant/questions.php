<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>

    <!-- Custom fonts for this template-->
    <link href="/thesis_git/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
 
     <link href="/thesis_git/css/main.css" rel="stylesheet">
 
     <!-- Custom styles for this template-->
     <link href="/thesis_git/css/sb-admin-2.min.css" rel="stylesheet">
     <link href="/thesis_git/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body>

<form method="post" action="/thesis_git/php/answer-process.php">

<?php 


$ft_tables="questions";
if (isset($_POST['ft_tables2'])) {
    $ft_tables = $_POST['ft_tables2'];
}
else{
	
}
$ftable2 = 'questions';
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$dataQuery = "SELECT * FROM $ftable2";
$result3 = mysqli_query($connect, $dataQuery);
while($row = mysqli_fetch_array($result3))
{

$q_id = $row['q_id'];
$q_txt = $row['q_txt'];
$sect_id = $q_id;



if($q_id % 5 == 1){
    echo "<section id=\"sect_$sect_id\">";
    //echo "<script>console.log('%5 == 1 / $q_id'); </script>";   //debugger
}

else{
    
}
echo "
    <p>Question $q_id : $q_txt</p>
    <input type=\"radio\" name=\"opt_$q_id\" value=\"2\">
    <label>Strongly-Agree</label><br>

    <input type=\"radio\" name=\"opt_$q_id\" value=\"1\">
    <label>Agree</label><br>

    <input type=\"radio\" name=\"opt_$q_id\" value=\"0\">
    <label>Neutral</label><br>
           
    <input type=\"radio\" name=\"opt_$q_id\" value=\"-1\">
    <label>Disagree</label><br>
        
    <input type=\"radio\" name=\"opt_$q_id\" value=\"-2\">
    <label>Strongly-Disagree</label><br>
    <hr>
";

if($q_id % 5 == 0){

    //buttons for per section / 5 items
    // echo "
    // <button id=\"back_btn\" class=\"btn btn-warning\">Back</button>
    // <button id=\"proceed_btn\" class=\"btn btn-primary\">Proceed</button>
    // ";

    echo "</section>" ;
    //echo "<script>console.log('%5 == 0 /$q_id'); </script>";   //debugger
    $sect_id = $sect_id + 1;
    
}

    

} //while loop

?>


<button type="submit" id="proceed_btn" class="btn btn-primary">Submit</button>
</form>

<hr>
<h5>Dev Tools</h5>
<button type="submit" id="reset_btn" class="btn btn-warning">Reset</button>
<button type="submit" id="auto_radio" class="btn btn-success">AutoFill</button>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
    $(document).ready(function(){
                // $("#sect_1").show();
                // $("#sect_6").hide();
                // $("#sect_11").hide();
                // $("#sect_16").hide();
                // $("#sect_21").hide();
                // $("#sect_26").hide();
                // $("#sect_31").hide();
                // $("#sect_36").hide();
                // $("#sect_41").hide();
                // $("#sect_46").hide();
                // $("#sect_51").hide();
                // $("#sect_56").hide();
                // $("#back_btn").hide();
        });
    
    </script>


    <script>
    //function that autochecks random radio boxes on button (auto_radio) click -- because im lazy AF
    $('#auto_radio').click(function(){
        for(var i=1;i<=60;i++){
            //randomizer for variation of radio box choices
            var randomized = Math.random() < 0.5 ? -2 : 0;  
            //end of randomizer
            $('input[name=opt_'+i+'][value='+randomized+']').attr('checked', true); 
        }
    });

    //function that resets the form on button (reset_btn) click
    $('#reset_btn').click(function(){
        window.location.href = window.location.href;  
        $("form").trigger("reset");
    });
    </script>

    <script>
        //sending data to another page

        $('#proceed_btn').click(function(){
        var valid = this.form.checkValidity();
			if(valid){

                answer = [];
                choices = [];

                for(var i=1;i<=60;i++){
                    answer[i] = $("input[type='radio'][name=opt_"+i+"]:checked").val();
                    //outputs all of the values / answer pts 
                    //console.log("questions_answer_val["+i+"]= "+answer[i]);    
                    
                    //choice saver
                    if(answer[i]==2){
                        choices[i]=1;
                    }
                    else if(answer[i]==1){
                        choices[i]=2;
                    }
                    else if(answer[i]==0){
                        choices[i]=3;
                    }
                    else if(answer[i]==-1){
                        choices[i]=4;
                    }
                    else if(answer[i]==-2){
                        choices[i]=5;
                    }
                    //outputs all of the choices made / radio buttons clicked
                    //console.log("choice_array["+i+"]= "+choices[i]);                             
                }


                var s = {
                    "message_pri": message_pri,
                    "follow_pri": follow_pri,
                    "post_pri": post_pri,
                    "check": check7
                }

                $.ajax({
                type: "POST",
                data: {answer:answer},
                url: "/thesis_git/php/answer-process.php",
                success: function(answer){
                    console.log(answer);
                }
                });

                //resets form and radio buttons checked
				//$("form").trigger("reset");
			}
			else{
        
			}
		});

    </script>


</body>
</html>