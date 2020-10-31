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
require 'Admin/config.php';
require 'header.php';
global $negative,$positive;
$_SESSION['sessid']=uniqid();
$user="";
if (!empty(isset($_SESSION['userdata']))) {
    $user=$_SESSION['userdata']['username'];

?>
<!DOCTYPE html>
<head>
    <title>Test</title>
</head>
<body>
<div id=tab>
    <table>
        <tr>
            <th>Test_id</th>
            <th>Test_Name</th>
            <th>Total_Question</th>
            <th>Postive Marks</th>
            <th>Negative Marks</th>
            <th>Action</th>
        </tr>
        <?php
            $sql = "SELECT * FROM addTest";
            $result = $conn->query($sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
        <td><?php echo $row['testid'] ?></td>
        <td><?php echo $row['testname'] ?></td>
        <td><?php echo $row['ques'] ?></td>
        <td><?php echo $row['positive']  ?></td>
        <td><?php echo $row['negative'] ?></td>
        <td><a href="start.php?id=<?php echo $row['testid']?>">Start Now</a></td>    
        
        </tr> 
        <?php } ?>
<?php } else {
        echo "<h1 style='color:red;'><center>Login to start test
        </center></h1>";
} ?>
    </table>
</div>
</body>
</html>