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
if (!empty($_REQUEST['id'])) {
    $testid=$_REQUEST['id'];
}
?>
<?php
$sql="SELECT * FROM result WHERE `sessid`='$sessid'";
$result=$conn->query($sql);
while ($row=mysqli_fetch_assoc($result)) {
?>
<?php if (($row['status']=="Passed")) : ?>
<div id="status">
<?php echo $row['status'] ?>&nbsp<i class="fa fa-check" aria-hidden="true"></i>
</div>
<?php endif ; ?>
<?php if (($row['status']=="Failed")) : ?>
<div id="status1">
<?php echo $row['status'] ?>&nbsp<i class="fa fa-window-close" aria-hidden="true"></i>
</div>
<?php endif ; ?>
<?php } ?>

<div  id="table">
<table>
<?php 
$sql="SELECT * FROM useranswer WHERE `testid`='$testid' AND `sessid`='$sessid'";
$result=$conn->query($sql);
$total=mysqli_num_rows($result);
$passing_avg=ceil($total/2);
while ($row=mysqli_fetch_assoc($result)) {
    $ans=$row['userans'];
?>
<p><h1>Ques:<?php echo $row['quesid']?>&nbsp<?php echo $row['ques']?></h1></p>
<p><input type=checkbox name="ans" value="1" <?php if($ans==1) :?>checked<?php endif ; ?>/><?php echo $row['option1']?></p>
<p><input type=checkbox name="ans" value="2" <?php if($ans==2) :?>checked<?php endif ; ?>/><?php echo $row['option2']?></p>
<p><input type=checkbox name="ans" value="3" <?php if($ans==3) :?>checked<?php endif ; ?>/><?php echo $row['option3']?></p>
<p><input type=checkbox name="ans" value="4" <?php if($ans==4) :?>checked<?php endif ; ?>/><?php echo $row['option4']?></p>
<?php if ($row['rightans']==$row['userans']) :?>
<p class="answer">Correct:<i class="fa fa-check" aria-hidden="true"></i></p>
<?php endif; ?>
<?php if ($row['rightans']!=$row['userans']) :?>
<p class="answer">Correct: <span><i class="fa fa-check" aria-hidden="true"></i><?php echo $row['rightans'] ?><span></p>
<p class="answer1">Your Answer: <i class="fa fa-window-close" aria-hidden="true">&nbsp</i><span><?php echo $row['userans'] ?><span></p>
<?php endif; ?>
<?php  }  ?>
</table>
<a href="index.php" id="btn">Home</a>
</div>


