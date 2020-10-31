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
    <title>manageTest</title>
</head>
<body>
<div id=tab>
    <table>
        <tr>
            <th>Test_id</th>
            <th>Test_Name</th>
            <th>Total_Question</th>
            <th>Add Question</th>
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
        <td><a href="addques.php">Add Question</a></td>
        <td><a href="updateTest.php?tid=<?php echo $row['testid']?>">UPDATE</a>
        <a href="delete.php?tid=<?php echo $row['testid'] ?>">DELETE</a></td>     
        
        </tr> 
                <?php } ?>
    </table>
</div>
</body>
</html>