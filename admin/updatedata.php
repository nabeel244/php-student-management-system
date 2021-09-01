<?php 
 include('../dbcon.php');
 $rolno = $_POST['rollno'];
 $id = $_POST['id'];
 $name = $_POST['name'];
 $city = $_POST['city'];
 $pcon = $_POST['pcon'];
 $std = $_POST['std'];
 if(isset($_FILES['image'])){
     $errors = array();
     $file_name = $_FILES['image']['name'];
     $file_size = $_FILES['image']['size'];
     $file_tmp = $_FILES['image']['tmp_name'];
     $file_type = $_FILES['image']['type'];
     $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
  $extensions = array('jpeg', 'jpg', 'png');
  if(in_array($file_ext, $extensions) === false){
      $errors[] = 'extension not allowed please chose jpg or png file';
   
    }
  if($file_size > 2097152){
      $errors[] = "File size must be exactly 2 MB";
     
  }
  if(empty($errors) == true){
      move_uploaded_file($file_tmp,'../dataimg/'.$file_name);
  }
    }
    $qry=  "UPDATE `student` SET `rollno`='$rolno',`name`='$name',`city`='$city',`pcont`='$pcon',`standerd`='$std',`image`='$file_name' WHERE `id` = $id";

$run = mysqli_query($con, $qry);
if($run == true){
    ?>
    <script>
        alert('Data Inserted Successfull');
      window.open('updateform.php?sid= <?php echo $id ?>', '__self');
    </script>
    <?php
}
else{
    
    echo("Error description: " . $con->error);
    
   
}
?>