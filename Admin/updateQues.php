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
$id=$_REQUEST['qid'];
$sql = "SELECT * FROM questionTable WHERE `quesid`=$id";
$result=$conn->query($sql);
while ($ab = mysqli_fetch_assoc($result)) {
    $name=$ab['ques'];
    $testid=$ab['testid'];
    $option1=$ab['option1'];
    $option2=$ab['option2'];
    $option3=$ab['option3'];
    $option4=$ab['option4'];
    $answer=$ab['answer'];
}
if (isset($_POST['submit'])) {

    $name=$_POST['name'];
    $testid=$_POST['dropdown'];
    $option1=$_POST['opt1'];
    $option2=$_POST['opt2'];
    $option3=$_POST['opt3'];
    $option4=$_POST['opt4'];
    $answer=$_POST['rightans'];
    $sql="UPDATE questionTable SET `ques`='$name',`option1`='$option1', 
    `option2`='$option2', `option3`='$option3', `option4`='$option4',
    `answer`='$answer' WHERE `testid`='$testid' ";
    
    if ($conn->query($sql) === true) {
        echo "Question Updated SuccessFully";
    } else {
        echo $conn->error;
    }
}
?>
<div id="wrapper">
    <div id="add-form">    
        <form action="" method="POST" enctype="multipart/form-data">
            <div id="head"><h2>Update Question</h2></div>
            <div class="row">
                <div class="col-25">
                <label for="name">Select Test:</label>
                </div>
                <div class="col-75">
                <select id="drop" name="dropdown">
                <?php 
                    $sql="SELECT * FROM addTest WHERE `testid`=$testid ";
                    $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row['testid']?>"><?php echo $row['testname'] ?>
                    </option>
                <?php } ?>
                </select>           
                </div> 
              </div>             
              <div class="row">
                <div class="col-25">
                <label for="name">Question_Title:</label>
                </div>
                <div class="col-75">
                <input type="text" name="name" value="<?php echo $name ?>" required> 
                </div> 
              </div>               
              <div class="row">
                <div class="col-25"> 
                <label for="opt1">Option 1:</label>
                </div>
                <div class="col-75">
                <input type="text" name="opt1" value="<?php echo $option1 ?>" required>                           
                </div> 
                </div>
            <div class="row">
                <div class="col-25">
                <label for="opt2">Option 2:</label>
                </div>
                <div class="col-75">
                <input type="text" name="opt2" value="<?php echo $option2 ?>" required>           
                </div> 
                </div>
            <div class="row">
               <div class="col-25">
                <label for="opt3">Option 3:</label>
                </div>
                <div class="col-75">
                <input type="text" name="opt3" value="<?php echo $option3 ?>" required>           
                </div> 
                </div>
            <div class="row">
                 <div class="col-25">
                <label for="opt4">Option 4:</label>
                </div>
                <div class="col-75">
                <input type="text" name="opt4" value="<?php echo $option4 ?>" required>           
                </div> 
                </div>
            <div class="row">
                <div class="col-25">
                <label for="answer">Right Answer Number:</label>
                </div>
                <div class="col-75">
                <input type="text" name="rightans" value="<?php echo $answer ?>" required>           
                </div> 
                </div>
            <p class="submit">
                <input type="submit" name="submit" value="Submit">
            </p>
        </form>
    </div>
</div>
</body>
</html>