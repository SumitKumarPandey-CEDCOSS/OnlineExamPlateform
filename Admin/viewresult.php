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
<div id=tab>
    <table>
        <tr>
            <th>Test_Name</th>
            <th>Student Name</th>
            <th>Total Marks</th>
            <th>Student Marks</th>
            <th>Status</th>
        </tr>
        <?php
            $sql="SELECT * FROM result";
            $result=$conn->query($sql);
        while ($row=mysqli_fetch_assoc($result)) {
        ?>
        <tr>
        <td><?php echo $row['testname'] ?></td>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['totalmarks'] ?></td>
        <td><?php echo $row['usermarks'] ?></td>
        <td><?php echo $row['status'] ?></td>    
        </tr> 
        <?php } ?>
    </table>
</div>
</body>
</html>