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
global $totalquestion,$testid;
require 'config.php';
require 'header.php';

if (isset($_POST['submit'])) {

    $name=$_POST['name'];
    $testid=$_POST['dropdown'];

    $sql="SELECT * FROM addTest Where `testid`=$testid";
    $result=$conn->query($sql);
    while ($row=mysqli_fetch_assoc($result)) {
        $totalquestion=$row['ques'];
    }
    $option1=$_POST['opt1'];
    $option2=$_POST['opt2'];
    $option3=$_POST['opt3'];
    $option4=$_POST['opt4'];
    $answer=$_POST['rightans'];
    $sql1="SELECT * FROM questionTable WHERE `testid`=$testid";
    $result1=$conn->query($sql1);
    $count=mysqli_num_rows($result1);
    if ($count==$totalquestion) {
        echo "<script>alert('No space for more Question')</script>";
        header("Refresh:0; url=index.php");
        return;
    }
    $sql="INSERT INTO questionTable(`ques`, `testid`, `option1`, `option2`,
    `option3`,`option4`,`answer`) VALUES ('$name', '$testid', '$option1', '$option2',
    '$option3','$option4', '$answer')";
    $result=$conn->query($sql);

    if ($result === true) {
        echo "Test Added SuccessFully";
    } else {
        echo $conn->error;
    }
}
?>
<div id="wrapper">
    <div id="add-form">    
        <form action="" method="POST" enctype="multipart/form-data">
            <div id="head"><h2>Add Question</h2></div>
            <div class="row">
                <div class="col-25">
                <label for="name">Select Test:</label>
                </div>
                <div class="col-75">
                <select id="drop" name="dropdown">
                <?php 
                    $sql="SELECT * FROM addTest";
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
                <input type="text" name="name" value="" required> 
                </div> 
              </div>          
              <div class="row">
                <div class="col-25"> 
                <label for="opt1">Option 1:</label>
                </div>
                <div class="col-75">
                <input type="text" name="opt1" value="" required>                           
                </div> 
                </div>
            <div class="row">
                <div class="col-25">
                <label for="opt2">Option 2:</label>
                </div>
                <div class="col-75">
                <input type="text" name="opt2" value="" required>           
                </div> 
                </div>
            <div class="row">
               <div class="col-25">
                <label for="opt3">Option 3:</label>
                </div>
                <div class="col-75">
                <input type="text" name="opt3" value="" required>           
                </div> 
                </div>
            <div class="row">
                 <div class="col-25">
                <label for="opt4">Option 4:</label>
                </div>
                <div class="col-75">
                <input type="text" name="opt4" value="" required>           
                </div> 
                </div>
            <div class="row">
                <div class="col-25">
                <label for="answer">Right Answer Number:</label>
                </div>
                <div class="col-75">
                <input type="text" name="rightans" value="" required>           
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