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
<div>

    <h1>Welcome to admin Dashboard</h1>
    <h4 align="right"><a href="logout.php">Logout</a></h4>  
    </div>
    <table>
        <form action="updatestudent.php" method="post" enctype="multipart/form-data">
         <tr>
            <th>Enter Standerd <td>
                <input type="number" name="std"  id="" required></td></th>
         </tr>
         <tr>
            <th>Enter Student Name <td>
                <input type="text" name="stuname"  id="" required></td></th>
         </tr>
         <td colspan="2"><input type="submit" name="submit"  value="search"></td>
    </form>
    </table>
    <table align="center" border="1px">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Rollno</th>
            <th>Edit</th>
        </tr>
        <?php 
if(isset($_POST['submit'])){
    include('../dbcon.php');
  $standerd = $_POST['std'];
  $name = $_POST['stuname'];
    $sql = "SELECT * FROM `student` WHERE `standerd` = '$standerd' and `name` = '$name'";
  
    $run = mysqli_query($con, $sql);

    if(mysqli_num_rows($run) < 1){
     echo "<tr><td colspan='5'>NO Record Found</td></tr>";
    }else{
        $count = 1;
        while($data=mysqli_fetch_assoc($run)){
            ?>
            <tr>
            <td><?php echo $count++; ?></td>
            <td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width: 100px;" /></td>
            <td><?php echo  $data['name'] ?></td>
            <td><?php echo $data['rollno'] ?></td>
            <td><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</a>
            <a href="deletestudent.php?sid=<?php echo $data['id']; ?>">Dlete</a></td>
            </tr>
            <?php
        }
    }
}
?>
    </table>
    </div>
</body>
</html>

