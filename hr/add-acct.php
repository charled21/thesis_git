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
    <h3 class="mt-4">EXISTING ACCOUNTS</h3>
    <table class="table">
      <th>Account Name</th>
      <th>Account Email</th>
      <th>Privilege</th>
      <th>Actions</th>

        <?php 
        $rec_Table = "login_accounts";
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $databaseName = "thesis_1";

        $connect = mysqli_connect($hostname, $username, $password, $databaseName);
        $acctQuery = "SELECT id,username,email_acct,acct_priv FROM $rec_Table";
        $accts = mysqli_query($connect, $acctQuery);
        while($row2 = mysqli_fetch_array($accts))
        {
            $admin_id = $row2['id'];
            $admin_accts = $row2['username'];    
            $admin_email = $row2['email_acct'];          
            $admin_priv = $row2['acct_priv'];
            $admin_priv2 = $admin_priv;
            if($admin_priv>9){
              $admin_priv = "Admin";
            }
            else if($admin_priv>5 && $admin_priv<10){
              $admin_priv = "Manager";
            }
            else{
              $admin_priv = "HR Personnel";
            }
            echo "<tr>";
            echo "<td>". $admin_accts ."</td>";
            echo "<td>". $admin_email ."</td>";
            echo "<td>". $admin_priv ."</td>";
            echo "<td>" . "<button role=\"button\" class=\"btn btn-pill btn-success \" value=$admin_priv2 data-id=$admin_accts data-email=$admin_email type=\"button\" data-toggle=\"modal\" data-target=\"#pass_modal\">  
            Edit</button>" . "</td>";
            echo "<td>" . "<button role=\"button\" class=\"btn btn-pill btn-danger \" value=$admin_priv2 data-id=$admin_accts data-email=$admin_email type=\"button\" id=\"del_btn\" onclick='del_record(this);'>  
            Remove</button>" . "</td>";
            echo "</tr>";          
        }
        mysqli_close($connect);
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
        <label>Email</label>
            <input type="text" class="form-control" id="admin_email">
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
        <label>Confirm Password</label>
            <input type="password" class="form-control" id="admin_pass2">
        </div>
    </div>

    

    <div class="form-row">
    <div class="form-group col-md-6">
    <label>Privilege</label>
      <select id="admin_priv" class="form-control">
        <option selected>Choose Privilege</option>
        <option value="10">Admin</option>
        <option value="5">HR Personnel</option>
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


<!-- Change Password Modal -->
<div class="modal fade" id="pass_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white" id="job_modal_label">Change Password</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close"></a>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


<div class="modal-body">

<form action="" method="POST">

    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Username</label>
            <input type="text" class="form-control" id="chng_user" disabled>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Email</label>
            <input type="text" class="form-control" id="chng_email">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
        <label>New Password</label>
            <input type="password" class="form-control" id="chng_pass">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Confirm New Password</label>
            <input type="password" class="form-control" id="chng_pass2">
        </div>
    </div>

    

    <div class="form-row">
    <div class="form-group col-md-6">
    <label>Privilege</label>
      <select id="chng_priv" class="form-control">
        <option value="10">Admin</option>
        <option value="5">HR Personnel</option>
      </select>
    </div>
  </div>


    <a type="button" class="btn btn-danger" type="submit" id="change_pass">Change</a>

  
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
                admin_pass2 = $('#admin_pass2').val();
                admin_email = $('#admin_email').val();
                admin_priv = $('#admin_priv').val();
                

				e.preventDefault();


				$.ajax({
					type: 'POST',
					url: "admin-acct-process.php",
					data: {admin_user : admin_user, admin_pass : admin_pass, admin_pass2 : admin_pass2, admin_email : admin_email , admin_priv : admin_priv},
					success: function(data){
            setTimeout(function(){ location.reload(); }, 1000);
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

<script type="text/javascript">
	$(function(){
		$('#change_pass').click(function(e){
      
      
        chng_user = $('#chng_user').val();
        chng_pass = $('#chng_pass').val();
        chng_pass2 = $('#chng_pass2').val();
        chng_priv = $('#chng_priv').val();
        chng_email = $('#chng_email').val();

        e.preventDefault();

        //console.log(chng_user +""+ chng_pass +""+ chng_pass2 +""+ chng_priv);

				$.ajax({
					type: 'POST',
					url: "admin-change-pass.php",
					data: {chng_user : chng_user, chng_pass : chng_pass, chng_pass2 : chng_pass2, chng_email : chng_email, chng_priv : chng_priv},
					success: function(data){
            setTimeout(function(){ location.reload(); }, 1000);
					},
					error: function(data){
						alert('Error!');
					}
				});

      
			
		});

	});
</script>


<script type="text/javascript">
$('button').click(function() {
  var tds2 =$(this).attr("data-id");
  var priv2 =  $(this).val();
  var email2 = $(this).attr("data-email");
  $('#chng_user').val(tds2);
  $('#chng_priv').val(priv2);
  $('#chng_email').val(email2);

  });
</script>

<script>
  function del_record(val){
    job_id = $(val).data("id");
    if (confirm('Are you sure you want to remove this account?')) {
            alert('Account has been removed!');
        }
    $.ajax({
					type: 'POST',
					url: "admin-drop-proc.php",
					data: {job_id :job_id},
					success: function(data){
            setTimeout(function(){ location.reload();window.top.location.reload(); }, 2000);
					},
					error: function(data){
						alert('Error!');
					}
				});
  }
</script>

</body>
</html>