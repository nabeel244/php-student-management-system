<?php
 
 session_start();
 if(isset($_SESSION['uid']))
 {
     
 }else{
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
    <div class="dashboard">
        <table>
            <tr>
                <td>
                   1.
                </td><td><a href="addstudent.php">Insert Student Detail</a></td>
            </tr>
            <tr>
                <td>
                   2.
                </td><td><a href="updatestudent.php">Update Student Detail</a></td>
            </tr>
            <tr>
                <td>
                   3.
                </td><td><a href="deletestudent.php">Delete Student Detail</a></td>
            </tr>
        </table>
    </div>
    </div>
</body>
</html>