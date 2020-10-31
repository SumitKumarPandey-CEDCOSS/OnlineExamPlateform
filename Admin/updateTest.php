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
$id=$_REQUEST['tid'];
$rs="SELECT * FROM addTest WHERE `testid`=$id";
$result=$conn->query($rs);
while ($ab=mysqli_fetch_array($result)) {
    $testid=$ab['testid'];
    $testname=$ab['testname'];
    $ques=$ab['ques'];
}
if (isset($_POST['submit'])) {

    $testid=$_POST['testid'];
    $name=$_POST['name'];
    $ques=$_POST['ques'];
    $sql= "UPDATE addTest SET `testname`='$name', `ques`='$ques' WHERE `testid`= $testid ";
    
    if ($conn->query($sql) === true) {
        echo "Test Updated SuccessFully";
    } else {
        echo $conn->error;
    }
    $conn->close();

}
?>
<div id="wrapper">
    <div id="add-form">    
        <form action="" method="POST" enctype="multipart/form-data">
            <div id="head"><h2>Add Test</h2></div>
            <div class="row">
                <div class="col-25">
                <label for="name">Test_Id:</label>
                </div>
                <div class="col-75">    
                <input type="text" name="testid" value="<?php echo $testid ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="name">Test_Name:</label>
                </div>
                <div class="col-75">    
                <input type="text" name="name" value="<?php echo $testname ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                <label for="ques">Total_Question:</label>
                </div>
                <div class="col-75">
                <input type="text" name="ques" value="<?php echo $ques ?>" required>           
            </div>
            </div>
            <p>
                <input type="submit" name="submit" value="Submit">
            </p>
        </form>
    </div>
</div>
</body>
</html>