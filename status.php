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
global $rightmark,$negativemark,$marks,$status,$testname,$totalmark,$mark;
require 'Admin/config.php';
require 'header.php';
$sessid=$_SESSION['sessid'];
$rid=$_REQUEST['id'];
if (isset($_REQUEST['submit'])) {
    $sessid=$_POST['sessid'];
    $testname=$_POST['testname'];
    $username=$_POST['username'];
    $status=$_POST['status'];
    $totalmark=$_POST['totalmark'];
    $mark=$_POST['marks'];

    $sql1="INSERT INTO result(`sessid`,`testname`,`username`, `totalmarks`,`usermarks`, `status`)
    VALUES('$sessid','$testname','$username','$totalmark','$mark', '$status')";
    if ($conn->query($sql1)==true) {
        $error=array('input'=>'form','msg'=>"1 Row added");
        header("Refresh:0; url=result.php?id=$rid");
    } else {
        echo $conn->error;
    }
}

$sql="SELECT * FROM addTest WHERE `testid`='$rid'";
$result=$conn->query($sql);
while ($row=mysqli_fetch_assoc($result)) {
    $testname=$row['testname'];
    $rightmark=$row['positive'];
    $negativemark=$row['negative'];
}

$sql="SELECT * FROM useranswer WHERE `testid`='$rid' AND `sessid`='$sessid'";
$result=$conn->query($sql);
$total=mysqli_num_rows($result);
$passing_avg=ceil($total/2);
while ($row=mysqli_fetch_assoc($result)) {
    if ($row['rightans']==$row['userans']) {
        $marks=$marks+$rightmark;
    }
    if ($row['rightans']!=$row['userans']) {
        $marks=$marks-$negativemark;
    }
}
$totalmark=$total*$rightmark;
if ($marks>=$passing_avg) {
    $status="Passed";
} else {
    $status="Failed";
}

?>
<div>
<p id="submitted">Test Submitted SuccessFully</p>
</div>

<form action="status.php?id=<?php echo $rid ?>" method=POST>
<input type='hidden' name="testname" value='<?php echo $testname?>'/>
<input type='hidden' name="sessid" value='<?php echo $sessid?>'/>
<input type='hidden' name="username" value='<?php echo $user?>'/>
<input type='hidden' name="status" value='<?php echo $status?>'/>
<input type='hidden' name="totalmark" value='<?php echo $totalmark?>'/>
<input type='hidden' name="marks" value='<?php echo $marks?>'/>
<input type="submit" name="submit" id="btn" value="View Result">
</form>



