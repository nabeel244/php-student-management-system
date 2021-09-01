<?php 

include('../dbcon.php');
if(isset($_GET['sid'])){
    $sid = $_GET['sid'];

    $sql = "SELECT * FROM `student` WHERE `id` = $sid";
    $run = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($run);
}else{
    echo "";
}


?>

<div class="container" align="center">
<div >

    <h1>Welcome to admin Dashboard</h1>
    <h4 align="right"><a href="logout.php">Logout</a></h4>  
    </div>
    <form action="updatedata.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Roll No</th>
                <td><input type="text" name="rollno" value="<?php echo $data['rollno'] ?>" id=""></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><input type="text" name="name" value="<?php echo $data['name'] ?>" id=""></td>
            </tr>
            <tr>
                <th>Contact No</th>
                <td><input type="text" name="pcon" value="<?php echo $data['pcont'] ?>" id=""></td>
            </tr>
            <tr>
                <th>City</th>
                <td><input type="text" name="city" value="<?php echo $data['city'] ?>" id=""></td>
            </tr>
            <tr>
                <th>Standerd</th>
                <td><input type="number" name="std" value="<?php echo $data['standerd'] ?>" id=""></td>
            </tr>
            <tr>
                <th>Image</th>
                <td> <input type="file" name="image"></td>
                
            </tr>
            <input type="hidden" name="id" value="<?php echo $sid; ?>">
            <tr>
              
                <td colspan="2"><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>