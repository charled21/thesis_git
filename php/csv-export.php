<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Export</title>
</head>
<body>
    <h1>CSV Export</h1>
    
    <form action="" method="post">
    <select  id="csv_opt" name="csv_opt" class="form-control">
        <option selected>Choose Option</option>
        <option value="1">Applicants</option>
        <option value="2">Employee Probation</option>
        <option value="3">Attendance</option>
      </select>

    <button type="submit" id="view_btn">View</button>
    </form>

    <div id="content"></div>
    <div id="app_id"></div>
    
    
    <script src="/thesis_git/vendor/jquery/jquery.min.js"></script>

<script>
    $(function(){
		$('#view_btn').click(function(e){

            csv_opt = $('#csv_opt').val();
            e.preventDefault();
            var myVar = csv_opt;
            var attend_data = 10;

            if(csv_opt==1){

            $.ajax({
            url: "tools/probation-print.php",
            type: "POST",
            data:{"myData":myVar}
            }).done(function(data) {
                console.log(data);
                $('#content').html(data);
            });

            }

            else if(csv_opt==2){

            $.ajax({
            url: "tools/probation-print.php",
            type: "POST",
            data:{"myData":myVar}
            }).done(function(data) {
                console.log(data);
                $('#content').html(data);
            });

            }

            else if(csv_opt==3){

            $.ajax({
            url: "tools/date-print.php",
            type: "POST",
            data:{"myData":attend_data}
            }).done(function(data) {
                console.log(data);
                $('#content').html(data);
            });

            }


        });
	});
</script>

</body>
</html>