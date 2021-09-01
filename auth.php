<?php
    session_start();
    if(isset($_SESSION['uid'])){
        header('location: admin/admindash.php');
     
    }else{
        // header('location: login.php');
    }
    
?>