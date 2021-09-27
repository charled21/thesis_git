<?php 
session_start();
require_once('db-config.php');

 if(isset($_SESSION['username'])!=null){
    $logged_user = $_SESSION['username'];

    
    $sql = "INSERT INTO login_history (username,login_datetime) VALUES (?,CURRENT_TIMESTAMP())";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$logged_user]);
    if($result){
        //do something something something
    }
    else{
        echo 'Error in Connection!';
    }
 }
 else{

 }

?>
