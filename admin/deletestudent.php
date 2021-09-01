<?php 
include('../dbcon.php');
$id = $_GET['sid'];

 
$sql = "DELETE FROM `student` WHERE `id` = $id";
$run = mysqli_query($con, $sql);
if($run){
    header('location: admindash.php');
}else{
    echo("Error description: " . $con->error);
}

?>