<?php 
/**
 * Php version 7.2.10
 * 
 * @category Components
 * @package  Packagename
 * @author   Sumit kumar Pandey <pandeysumit399@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/php%20mysql%20task1/register/signup.php
 */
session_start();
 require 'config.php';
 $error = array();

if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $roles = isset($_POST['roles'])?$_POST['roles']:'';
    if (sizeof($error)==0) {
        $sql= 'SELECT * FROM user WHERE 
        `username`="'.$username.'" AND `role`="'.$roles.'" AND 
        `password`="'.$password.'"' ;
         $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["userdata"]=array('username' => $row['username'],
                'userid'=>$row['userid']);
                if ($roles== "Admin") {
                    header("Location:index.php");
                } else {
                    header("Location:../index.php");
                }              
            } 
        } else {
            $error = array('input'=>'form','msg'=>'Invalid User Detail!'
            );               
        }
    }
        $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Login
</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="wrapper">
<div id="login-form">
<form action="" method="POST">
<div class="logo"><span>Login</span></div>
<p>
<label for="roles">Login As: 
<select id="roles" name="roles">
<option value="Admin">Admin</option>
<option value="User">User</option>
</Select></label>
</p>
<p class="input">
<label for="username">Username: 
<input type="text" name="username"  required></label>
</p>
<p class="input">
<label for="password">Password: 
<input type="password" name="password"  required></label>
</p>
<p class="submit"> 
<input type="submit" name="submit" value="Submit">
</p>
<span id='bottom'>Need a account? <a href="signup.php">Sign Up</a> </span>
<div id="errordiv">
<?php if (sizeof($error)>0) : ?>
<ul>
<?php foreach ($error as $value) : ?>
<li><?php echo $error['msg'] ;break ?></li>
<?php endforeach; ?>
</ul>
<?php endif ; ?> 
</div>
</form>
</div>
</div>
</body>
</html>