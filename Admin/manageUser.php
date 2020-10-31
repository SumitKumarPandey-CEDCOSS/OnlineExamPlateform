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
require 'config.php';
require 'header.php';
?>
<!DOCTYPE html>
<head>
    <title>manageuser</title>
</head>
<body>
<div id=tab>
    <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);
                while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['password'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['role'] ?></td>
        <td><a href="updateUser.php?uid=<?php echo $row['userid']?>">UPDATE</a>
        <a href="delete.php?uid=<?php echo $row['userid'] ?>">DELETE</a></td>      
        </tr> 
        <?php } ?>
    </table>
</div>
</body>
</html>