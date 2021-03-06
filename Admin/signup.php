<!DOCTYPE html>
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

require 'config.php' ;
$error=array();

if (isset($_POST['submit'])) {

    $username=isset($_POST['username'])?$_POST['username']:'';
    $email=isset($_POST['email'])?$_POST['email']:'';
    $sql_username = "SELECT * FROM user WHERE username='$username'";
    $sql_email = "SELECT * FROM user WHERE email='$email'";
    $res_username = mysqli_query($conn, $sql_username);
    $res_email = mysqli_query($conn, $sql_email);

    if (mysqli_num_rows($res_username) > 0) {
        $error = array('input'=>'form','msg'=>'UserName Already Exist!');
    } else if (mysqli_num_rows($res_email) > 0) {
        $error = array('input'=>'form','msg'=>'Email Is Already Taken!');
    }
    $username=isset($_POST['username'])?$_POST['username']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';
    $repassword=isset($_POST['password'])?$_POST['repassword']:'';
    $email=isset($_POST['email'])?$_POST['email']:'';
    if ($password != $repassword) {
        $error=array('input'=>'password','msg'=>'password doesnt match');
    }
    if (sizeof($error) == 0) {
        $sql = 'INSERT INTO user(`username`,`password`,`email`) 
    VALUES ("'.$username.'", "'.$password.'", "'.$email.'")';

        if ($conn->query($sql) === true) {
            $error=array('input'=>'form','msg'=>"1 Row Upload");
        } else {
            $error=array('input'=>'form','msg'=>$conn->error);
        }
        $conn->close();
    }
}
?>
<html>
<head>
<title>
    Register
</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="wrapper">
    <div id="signup-form">    
        <form action="signup.php" method="POST">
        <div class="logo"><span>Sign Up</span></div>
        
            <p class="input">
                <label for="username">Username: 
                    <input type="text" name="username" required>
                </label>
            </p>
            <p class="input">
                <label for="password">Password: 
                    <input type="password" name="password" required>
                </label>
            </p>
            <p class="input">
                <label for="repassword">Re-Password: 
                    <input type="password" name="repassword" required>
                </label>
            </p>
            <p class="input">
                <label for="email">Email: 
                    <input type="email" name="email" required>
                </label>
            </p>
             <p class="submit">
                 <input type="submit" name="submit" value="Submit">
                </p>
                <p>
                    <a href="Login.php" class="lo">Click Here To Login</a>
                    <!-- <a href="AdminDashboard.php" class="lo">
                    Back To Dashboard</a> -->
                </p><br>
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