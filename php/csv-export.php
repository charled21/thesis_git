<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Export</title>

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
    <div class="col-sm-12">
    <h1 class="mt-4">CSV Export</h1>
    
    <div class="col-sm-4">
    <form action="" method="post">
    <select  id="csv_opt" name="csv_opt" class="form-control">
        <option selected>Choose Option</option>
        <option value="1">Applicants</option>
        <option value="2">Employee Probation</option>
        <option value="3">Attendance</option>
      </select>

    <button type="submit" class="btn btn-info mt-4" id="view_btn">View</button>
    </form>
    </div>

    <div id="content">
    </div>
    <div class="col-sm-4">
    <button id="exp_csv" class="mt-4 btn btn-success">Export to CSV</button>
    </div>
    
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
                //console.log(data);
                $('#content').html(data);
            });

            }

            else if(csv_opt==2){

            $.ajax({
            url: "tools/probation-print.php",
            type: "POST",
            data:{"myData":myVar}
            }).done(function(data) {
                //console.log(data);
                $('#content').html(data);
            });

            }

            else if(csv_opt==3){

            $.ajax({
            url: "tools/date-print.php",
            type: "POST",
            data:{"myData":attend_data}
            }).done(function(data) {
                //console.log(data);
                $('#content').html(data);
            });

            }


        });
	});
</script>

<script>
    document.getElementById("exp_csv").addEventListener("click", function () {
	var html = document.querySelector("table").outerHTML;
	htmlToCSV(html, "records.csv");
});
</script>

<script>
function htmlToCSV(html, filename) {
        var data = [];
        var rows = document.querySelectorAll("table tr");
                
        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll("td, th");
                    
            for (var j = 0; j < cols.length; j++) {
                    row.push(cols[j].innerText);
            }
                    
            data.push(row.join(",")); 		
        }

        downloadCSVFile(data.join("\n"), filename);
    }

</script>

<script>

    function downloadCSVFile(csv, filename) {
	var csv_file, download_link;

	csv_file = new Blob([csv], {type: "text/csv"});

	download_link = document.createElement("a");

	download_link.download = filename;

	download_link.href = window.URL.createObjectURL(csv_file);

	download_link.style.display = "none";

	document.body.appendChild(download_link);

	download_link.click();
}


</script>
</body>
</html>