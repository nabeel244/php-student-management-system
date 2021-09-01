<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h1 align="center">Admin Login</h1>
    <form action="login.php" method="post">
        <table align="center">
            <tr>
                <td>
                    Username
                </td>
                <td><input type="text" name="uname" required placeholder="username"></td>
            </tr>
            <tr>
                <td>
                    password
                </td>
                <td><input type="password" name="pass" required placeholder="password"></td>
            </tr>
            <tr>
                
                <td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php 
include('dbcon.php');

if(isset($_POST['login'])){

    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $qry = "SELECT * FROM `admin` WHERE `username` = '$username'  AND `password` = '$password'";
    $run = mysqli_query($con, $qry);
    $row = mysqli_num_rows($run);
    if($row <1){
        ?>
        <script >
            alert('Username or paswword not match');
            window.open('login.php', '__self');
         </script>
        <?php
    }
    else{
        $data = mysqli_fetch_assoc($run);
        $id = $data['id'];
        session_start();  //hr martaba session start krna perta ha chaye kuch get krain ya put
       
        $_SESSION['uid'] = $id;  //yeh uid session ke key ha
        header('location: admin/admindash.php');
    }
}
?>