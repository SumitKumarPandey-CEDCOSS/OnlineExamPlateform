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
$error=array();
$tid=$_REQUEST["tid"];
$qid=$_REQUEST["qid"];
if ($tid > 0) {
    $sql = "DELETE FROM addTest WHERE `testid`= $tid";
    if ($conn->query($sql) === true) {
        $error=array('input'=>'form','msg'=>"Record Deleted SuccessFully");
        header('Location: manageTest.php');
    } else {
        $error=array('input'=>'form','msg'=>$conn->error);
    }
}
if ($qid>0) {
    $sql = "DELETE FROM questionTable WHERE `quesid`= $qid";
    if ($conn->query($sql) === true) {
        $error=array('input'=>'form','msg'=>"Record Deleted SuccessFully");
        header('Location: manageques.php');
    } else {
        $error=array('input'=>'form','msg'=>$conn->error);
    }
}
if ($id=$_REQUEST["uid"]>0) {
    $sql = "DELETE FROM user WHERE `userid`= $id";
    if ($conn->query($sql) === true) {
        $error=array('input'=>'form','msg'=>"Record Deleted SuccessFully");
        header('Location: manageUser.php');
    } else {
        $error=array('input'=>'form','msg'=>$conn->error);
    }
}
$conn->close();
?>
<html>
    <head>
        <title>Delete</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="errordiv">
            <?php if (sizeof($error)>0) : ?>
                <ul>
                    <?php foreach ($error as $value) : ?>
                        <li><?php echo $error['msg'] ;break ?></li>
                        <?php header('Location: manageQues.php');?>
                    <?php endforeach; ?>
                </ul>
            <?php endif ; ?> 
        </div>
    </body>
    </html>