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
global $start,$per_page,$no_of_page,$count,$page,$userans;
$id=$_REQUEST['id'];
$sessid=$_SESSION['sessid'];
$page=1;
if (isset($_REQUEST['page'])) {
    $page=$_REQUEST['page'];
} else {
    $page=1;
}
if (isset($_REQUEST['submit'])) {
    $quesid=$_POST['quesid'];
    $testid=$_POST['testid'];
    $ques=$_POST['ques'];
    $option1=$_POST['option1'];
    $option2=$_POST['option2'];
    $option3=$_POST['option3'];
    $option4=$_POST['option4'];
    if (!empty($_POST['ans'])) {
        $userans = $_POST['ans'];
    } else {
        $userans=0; 
    }
    $rightans=$_POST['rightans'];

    $sql2="DELETE FROM useranswer WHERE `sessid`='$sessid' AND `ques`='$ques' ";
    if ($conn->query($sql2)===true) {
        echo "Recorded Deleted Successfully";
    } else {
        $error = array('input'=>'form','msg'=>'Invalid User Detail!');
        echo $conn->error;
    }

    $sql="INSERT INTO useranswer(`sessid`, `quesid`, `testid`, `ques`, `option1`, `option2`,
    `option3`,`option4`, `userans`, `rightans`)VALUES('$sessid', '$quesid','$testid', '$ques',
     '$option1', '$option2','$option3', '$option4', '$userans', '$rightans')";

    if ($conn->query($sql)===true) {
          echo "Recorded Inserted Successfully";
    } else {
        $error = array('input'=>'form','msg'=>'Invalid User Detail!');
        echo $conn->error;
    }
}
?>
<div id="headd">
<?php 
$sql1="SELECT * FROM questionTable WHERE `testid`=$id";
$result1=$conn->query($sql1);
$count=mysqli_num_rows($result1);
if (empty($count)) {
    echo "<script>alert('Question Not Available')</script>";
    header("Refresh:0; url=index.php");
    return;
}
$per_page=1;
$no_of_page=ceil($count/$per_page);
$start=($page-1)*$per_page;

if ($page>$no_of_page) {
    echo "<script>alert('Test Submitted')</script>";
    header("Refresh:0; url=status.php?id=$id");
}
$sql="SELECT * FROM questionTable WHERE `testid`=$id limit $start,$per_page";
$result=$conn->query($sql);
while ($row=mysqli_fetch_assoc($result)) {
    $quesid=$row['quesid'];
    $testid=$row['testid'];
    $ques=$row['ques'];
    $option1=$row['option1'];
    $option2=$row['option2'];
    $option3=$row['option3'];
    $option4=$row['option4'];
    $rightans=$row['answer'];
?>
<form action="start.php?page=<?php echo $page+1; ?>&id=<?php echo $id;?>" method="POST">
<table>
        <p>Ques:<?php echo $row['quesid']?>&nbsp<?php echo $row['ques'] ?></p>
        <p><input type=radio name="ans" value="1"/><?php echo $row['option1']?></p>
        <p><input type=radio name="ans" value="2"/><?php echo $row['option2']?></p>
        <p><input type=radio name="ans" value="3"/><?php echo $row['option3']?></p>
        <p><input type=radio name="ans" value="4"/><?php echo $row['option4']?></p>
        <input type="hidden" name="quesid" value="<?php echo $quesid?>" />
        <input type="hidden" name="testid" value="<?php echo $testid?>" />
        <input type="hidden" name="ques" value="<?php echo $ques?>" />
        <input type="hidden" name="option1" value="<?php echo $option1?>" />
        <input type="hidden" name="option2" value="<?php echo $option2?>" />
        <input type="hidden" name="option3" value="<?php echo $option3?>" />
        <input type="hidden" name="option4" value="<?php echo $option4?>" />
        <input type="hidden" name="rightans" value="<?php echo $rightans?>" />
        <?php if ($page==1) :?>
        <input type = "submit" name="submit" value="Next Question" id='btn1'>
        <?php endif; ?>
        <?php if ($page>1 && $page!=$no_of_page) : ?>
        <?php echo "<a href='start.php?page=".($page-1)."&id=".$id."' id='btn1'>
        Previous</a>";?>
        <input type = "submit" name="submit" value="Next Question" id='btn1'>
        <?php endif; ?>
        <?php if($page>1 && $page==$no_of_page) : ?>
        <?php echo "<a href='start.php?page=".($page-1)."&id=".$id."' id='btn1'>
        Previous</a>";?>
        <input type = "submit" name="submit" value="CLick To Submit TEst" id='btn1'>
        <?php endif; ?>
    </table>
    </form>
<?php }?>