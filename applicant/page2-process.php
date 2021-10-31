<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Part 2</title>

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


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

    <div>
        <label for="files">Select multiple files: </label>
        <input id="files" type="file" multiple/>
        <output id="result"> </output>
</div>


<button type="button" id="btn_pts">Total Pts</button>

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


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
window.onload = function(){
    var points = 0;

        if(window.File && window.FileList && window.FileReader)
        {
            var filesInput = document.getElementById("files"); 
            filesInput.addEventListener("change", function(event){ 
                var files = event.target.files; 
                var output = document.getElementById("result");
                
                for(var i = 0; i< files.length; i++)
                {
                    var file = files[i]; 
                    var file_name = file.name;
                    
                    //console.log("file = "+file.name);
                    if(!file.type.match('image'))
                      continue;
                      points += 2;
                      console.log(points);
                    var reader = new FileReader();
                    reader.addEventListener("load",function(event){
                        var file = event.target;
                        var div = document.createElement("div");
                        div.innerHTML = "<br><h5>Image:"+file_name+"</h5><img style='height: 50%; width: 50%;' id='img_id"+i+"'class='thumbnail' src='" + file.result + "'" +
                                "title='" + file_name + "'/>";
                        output.insertBefore(div,null);        

                         
                    });
                    reader.readAsDataURL(file);
                }                               
            });
        }
        else
        {
            console.log("Your browser does not support File API");
        }

        $('#btn_pts').click(function(e){
            alert("Total Points: "+points);
        });
    }
        
    </script>



</body>
</html>