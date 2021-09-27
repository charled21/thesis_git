<?php  
session_start();
$logged_user = $_SESSION['username'];
//var_dump($_SESSION);

if(isset($logged_user)==null){
  header("Location: main.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rusty Devs | Dashboard</title>

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
<div class="pos-f-t">
  <div class="col-md-12 color-title top-header">
    <div class="row col-sm-12 d-flex justify-content-between">

        <div class="col-sm-4 mt-3 row">
          <h3 class="logo-header-text">HRIS</h3><h3 class="logo-header-text-two">SUB-SYSTEM</h3><p class="logo-header-text-two">&reg;</p>
          </div>

          <div class="col-sm-8  row justify-content-end">
                <div class="column  justify-content-center">
                  
                </div>

            <div class="dropdown">
              <div class="justify-content-between">
              <button class="thumbnail-pic ml-3"></button>
              </div>
            
                <div class="dropdown-content">
                <button class="profile-pic"></button>
                <?php 
                echo "<div class=\"col-sm-12 minimal-text \"> Username: $logged_user </div>";
                ?>
                  <a href="manageaccounts.php" class="col-sm-10 manage-acc-button">Manage Accounts</a>
                  <hr class="mb-1">
                  <a href="php/acct-logout.php" class="col-sm-10 logout-button"><p class="logout-text">Logout</p></a>
                </div>
            </div>
          </div>
    </div>
  </div>
</div>

<div class="col-md-12 row">
<div class="col-md-2 sidebar-panel row">
        <div class="col-md-2 mr-2">
        
        </div>

        <div class="col-md-1">
        <hr class="mb-2">
        <div class="sidebar-subs"><a class="link-color" href="main.php" style="text-decoration:none;"><p class="ss-text"><br>Home</p></a></div>
        <div class="sidebar-subs"><a class="link-color" href="accounts/accounts-panel.php" style="text-decoration:none;" target="accounts_iframe"><p class="ss-text"><br>Accounts</p></div>
        <!-- <div class="sidebar-subs"><a class="link-color" href="accounts/inventory.php" style="text-decoration:none;" target="accounts_iframe"><p class="ss-text"><br>Inventory</p></a></div> -->
        <div class="sidebar-subs"><a class="link-color" href="accounts/logs.php" style="text-decoration:none;" target="accounts_iframe"><p class="ss-text"><br>Logs</p></a></div>
        <hr class="my-6">
        <div class="sidebar-subs"><a class="link-color" href="accounts/settings.php" style="text-decoration:none;" target="accounts_iframe"><p class="ss-text"><br>Settings</p></a></div>
        <div class="sidebar-subs"><a class="link-color" href="tools/cpuinserter.php" style="text-decoration:none;" target="accounts_iframe"><p class="ss-text"><br>CPUTools</p></a></div>
        <div class="sidebar-subs"><a class="link-color" href="tools/gpuinserter.php" style="text-decoration:none;" target="accounts_iframe"><p class="ss-text"><br>GPUTools</p></a></div>
        </div>
</div>
        <div class="col-md-10">
          <div class="pos-f-t ml-4" style="height: 100%">
          <iframe frameBorder=0 height=100% width=100% src="accounts/accounts-panel.php" name="accounts_iframe">
                          
                          
             </div>                    
          </div>
         
                          
                       
                          
                                 
          
         <!--add php file in include to run-->
         <!-- include "php/history-display.php"; -->
                        



<div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-info p-4">
              <h4 class="text-white">Genres</h4>
              <span class="text-white">Details about certain genres.</span>
            </div>
</div>



      <!-- history modal start -->
<div class="modal fade" id="gameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="gameModalLabel">Bored Are We?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="first-text"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
      </div>
    </div>
  </div>
</div>
      <!--  history modal end -->


    
    <!-- <div class="col-sm-4">

      <h3 class="position-absolute text-primary">OPTIONS</h3>
      <hr class="mt-5 mb-0">
      <div class="row justify-content-center">
          <div class="contents_style">
              <div class="mt-5  mx-5 content-boxes" onclick="box1()" id="box1">
              <p id="box1-text">CPU</p>
              </div>
          </div> 
      </div>
      <div class="row justify-content-center">
          <div class="contents_style">
               <div class="mt-5  mx-5 content-boxes" id="box3"></div>
          </div> 
      </div>
    </div> -->

    <!-- <div class="col-sm-4">
      <p class="position-absolute"></p>
      <hr class="mt-5 mb-0">
      <div class="row justify-content-center">
          <div class="contents_style">
            <div class="mt-5  mx-5 content-boxes" id="box2" onclick="box2()">
            <p id="box2-text">Video Card</p></div>
          </div> 
      </div>
      <div class="row justify-content-center">
           <div class="contents_style">
              <div class="mt-5  mx-5 content-boxes" id="box4"></div>
           </div> 
      </div>
    </div> -->
    
 
    <script src="js/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="package/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript">
  var box1count=0;
  var btn = document.createElement("button");
  var textfield = document.createElement("input");
  function box1(){
    box1count++;
    if(box1count==1){
      document.getElementById('box1-text').innerHTML = "You Clicked CPU Again!";
    }
    if(box1count==2){
      document.getElementById('box1-text').innerHTML = "Stop Clicking me!";
    }
    if(box1count==3){
      document.getElementById('box1-text').innerHTML = "I told you to stop clicking me!";
    }
    if(box1count>3 && box1count<7){
      document.getElementById('box1-text').innerHTML = "Your loss... i will ignore you now..";
    }
    if(box1count==7){
      document.getElementById('box1-text').innerHTML = "Not Tired Yet???";
    }
    if(box1count==10){
      //document.getElementById('box1-text').innerHTML = "Really??";

      btn.innerHTML="Dont Click Me!";
      document.body.appendChild(btn);
      btn.onclick = function(){
          alert('You are one stubborn person!');
          //window.location.href = "profilepage.php";
        box1count++;
        }
        
    }
    if(box1count > 10){
      document.body.removeChild(btn);
      document.getElementById('box1-text').innerHTML = "I'm assuming by now you are already tired!? No?!?!";
      
      textfield.placeholder = "Type in here your name";
      textfield.id = "textfield";
      var btn2 = document.createElement("button");
      btn2.innerHTML="Submit Text";
      btn2.onclick= function(){
        var input = document.getElementById("textfield").value;
        alert('I knew it! You are'+' '+input);
        window.location.href = "profilepage.php";
        box1count++;
      }
      document.body.appendChild(btn2);
      document.body.appendChild(textfield);
      
    }

  }

</script>


<!--GPU LISTED doughnut-->
<!-- <script type="text/javascript">

 var ctx = document.getElementById("doughnutChart").getContext('2d');

 var myDoughnutChart = new Chart(ctx, {
 type: 'doughnut',
 data: {
 labels: ["AMD", "Nvidia", "Intel"],
 datasets: [{
 data: [12, 7, 2],
 backgroundColor: ["#a10205", "#009100", "#00028f"],
 hoverBackgroundColor: ["#ff0006", "#00ff00", "#0004ff"]
 }]
 },
 options: {
 responsive: true
 }
 });

</script> -->


</body>
</html>