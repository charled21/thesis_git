<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Account</title>

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

<div class="container">
    <div class="col-md-12 mt-4 mb-4">

    <a class="btn btn-pill btn-primary mb-4" type="button" data-toggle="modal" data-target="#job_modal">
        <span class="fas fa-plus"></span>    
        Add New Account</a>
    <h3 class="mt-4">Existing Accounts</h3>
    <table class="table">
      <th>Account Name</th>
      <th>Privilege</th>

        <?php 
        $rec_Table = "login_accounts";
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $databaseName = "thesis_1";

        $connect = mysqli_connect($hostname, $username, $password, $databaseName);
        $acctQuery = "SELECT username,acct_priv FROM $rec_Table";
        $accts = mysqli_query($connect, $acctQuery);
        while($row2 = mysqli_fetch_array($accts))
        {
            $admin_accts = $row2['username'];  
            $admin_priv = $row2['acct_priv'];
            if($admin_priv>5){
              $admin_priv = "Manager";
            }
            else{
              $admin_priv = "HR Personnel";
            }
            echo "<tr>";
            echo "<td>$admin_accts</td>";
            echo "<td>$admin_priv</td>";
            echo "</tr>";          
        }
        ?>

    </table>
    

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="job_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="job_modal_label">Add Admin Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


<div class="modal-body">

<form action="" method="POST">

    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Username</label>
            <input type="text" class="form-control" id="admin_user">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Password</label>
            <input type="password" class="form-control" id="admin_pass">
        </div>
    </div>

    

    <div class="form-row">
    <div class="form-group col-md-6">
    <label>Privilege</label>
      <select id="admin_priv" class="form-control">
        <option selected>Choose Privilege</option>
        <option value="10">Admin</option>
        <option value="5">HR</option>
      </select>
    </div>
  </div>


    <button class="btn btn-primary" type="submit" id="acct_sub">Add</button>

  
</form>

    
</div>
      </div>
    </div>
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

<script type="text/javascript">
	$(function(){
		$('#acct_sub').click(function(e){
			var valid = this.form.checkValidity();
			if(valid){

                admin_user = $('#admin_user').val();
                admin_pass = $('#admin_pass').val();
                admin_priv = $('#admin_priv').val();

				e.preventDefault();


				$.ajax({
					type: 'POST',
					url: "admin-acct-process.php",
					data: {admin_user : admin_user, admin_pass : admin_pass, admin_priv : admin_priv},
					success: function(data){
            alert('Account Added!');
            console.log(data);
					},
					error: function(data){
						alert('Error!');
					}
				});
				//$("form").trigger("reset");
        //setTimeout(function(){ location.reload(); }, 2000);
			}
			else{
        
			}
		});
	});
</script>

</body>
</html>