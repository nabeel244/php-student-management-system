<?php 
 session_start();
 if(isset($_SESSION['uid'])){
     echo "";
 }else {
     header('location: ../login.php');
 }

?>
<?php 
include('header.php');

?>
<div class="container" align="center">
<div >

    <h1>Welcome to admin Dashboard</h1>
    <h4 align="right"><a href="logout.php">Logout</a></h4>  
    </div>
    <form action="addstudent.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Roll No</th>
                <td><input type="text" name="rollno" placeholder="roll no" id=""></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><input type="text" name="name" placeholder="Name" id=""></td>
            </tr>
            <tr>
                <th>Contact No</th>
                <td><input type="text" name="pcon" placeholder="Contact No" id=""></td>
            </tr>
            <tr>
                <th>City</th>
                <td><input type="text" name="city" placeholder="City" id=""></td>
            </tr>
            <tr>
                <th>Standerd</th>
                <td><input type="number" name="std" placeholder="Standerd" id=""></td>
            </tr>
            <tr>
                <th>Image</th>
                <td> <input type="file" name="image"></td>
            </tr>
            <tr>
            
                <td colspan="2"><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>

<?php 
if(isset($_POST['submit'])){
    include('../dbcon.php');
     $rolno = $_POST['rollno'];
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
    
    $qry= "INSERT INTO `student` (`rollno`, `name`, `city`, `pcont`, `standerd`, `image`) VALUES ('$rolno', '$name', '$city', '$pcon', '$std', '$file_name')";
    $run = mysqli_query($con, $qry);
    if($run == true){
        ?>
        <script>
            alert('Data Inserted Successfull');
        </script>
        <?php
    }
    else{
        
        echo("Error description: " . $con->error);
        
       
    }
}
?>