<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
</head>
<body>
<h3 align="right" style="margin-right:20px"><a href="login.php">Admin Login</a></h3>
    <h1 align="center">Welcome</h1>

    <form action="index.php" method="post">
    <table style="width: 30%;padding:5px" align="center" border="1">
        <tr>
            <td>Chose standerd</td>
            <td align="left">
                <select name="std" id="">
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="3">3rd</option>
                    <option value="4">4th</option>
                    <option value="5">5th</option>
                    <option value="6">6th</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="left">Enter Rollno</td>
            <td><input type="text" name="rollno" required></td>
        </tr>
        <tr>
            <td align="center" colspan="2"><input type="submit" name="submit" value="Show Info"></td>
        </tr>
    </table>
    </form>
</body>
</html>

<?php
 require('dbcon.php');
 if(isset($_POST['submit'])){
     $standerd = $_POST['std'];
     $rollno = $_POST['rollno'];
     $qry = "SELECT * FROM `student` WHERE `rollno` = '$rollno' and `standerd` = '$standerd'";
    
      $run = mysqli_query($con, $qry);
     $data = mysqli_fetch_assoc($run);
      
     if($data < 1){
         echo '<td>No Record Found </td>';
     }
     else{
        ?>
        <table border="1px">
            <tr>
                <th colspan="3">Student Detail</th>
            </tr>
            <tr>
                <td colspan="5"><img src="dataimg/<?php echo $data['image']; ?>" style="max-width: 150px;" alt=""></td>
            </tr>
            <tr>
            <th >Roll No</th>
            <td><?php echo $data['rollno'] ?></td>
            </tr>
            <tr>
            <th >Name</th>
            <td><?php echo $data['name'] ?></td>
            </tr>
            <tr>
            <th >Standerd</th>
            <td><?php echo $data['standerd'] ?></td>
            </tr>
            
        </table>
        <?php
     }
 } 
?>