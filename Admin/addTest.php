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

if (isset($_POST['submit'])) {

    $name=$_POST['name'];
    $ques=$_POST['ques'];
    $positve=$_POST['positive'];
    $negative=$_POST['negative'];
    $sql="INSERT INTO addTest(`testname`, `ques`,`positive`, `negative`)
    VALUES ('$name', '$ques','$positve', '$negative')";
    
    if ($conn->query($sql) === true) {
        echo "Test Added SuccessFully";
    } else {
        echo $conn->error;
    }
    $conn->close();

}
?>
<div id="wrapper">
    <div id="add-form">    
        <form action="" method="POST">
            <div id="head"><h2>Add Test</h2></div>
            <div class="row">
                <div class="col-25">
                <label for="name">Test_Name:</label>
                </div>
                <div class="col-75">    
                <input type="text" name="name" value="" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="ques">Total_Question:</label>
                </div>
                <div class="col-75">
                <input type="text" name="ques" value="" required>           
            </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="number">Postive Marks:</label>
                </div>
                <div class="col-75">
                <input type="text" name="positive" value="" required> 
                </div> 
              </div>   
              <div class="row">
                <div class="col-25">
                <label for="number">Negative Marks:</label>
                </div>
                <div class="col-75">
                <input type="text" name="negative" value="" required> 
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