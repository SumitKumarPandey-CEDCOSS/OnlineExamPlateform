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
session_start();
$user="";
if (!empty(isset($_SESSION['userdata']))) {
    $user=$_SESSION['userdata']['username'];
} else {
    echo "<script>alert('You dont have Permission to access this site')</script>";
    header("Refresh:0; url=Login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Online Examination Plateform</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="header">
        <h1>Online Exam Portal</h1>
    </div>
    <ul id="nav">
    <li class="dropdown">
    <a href="index.php" class="dropbtn">Dashboard</a>
    <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Test Menu</a>
    <div class="dropdown-content">
      <a href="addTest.php">Add Test</a>
      <a href="manageTest.php">Manage Test</a>
    </div>
    <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Question Menu</a>
    <div class="dropdown-content">
      <a href="addques.php">Add Question</a>
      <a href="manageques.php">Manage Question</a>
    </div>
    <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">User Menu</a>
    <div class="dropdown-content">
      <a href="signup.php">Add User</a>
      <a href="manageUser.php">Manage User</a>
      <li class="dropdown">
      <a href="viewresult.php">View User Result</a>
    <a href="Logout.php">Logout</a>
    </div>
  </li>
</ul>