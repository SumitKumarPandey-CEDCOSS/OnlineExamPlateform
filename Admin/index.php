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
$user="";
require 'header.php';
if (!empty(isset($_SESSION['userdata']))) {
    $user=$_SESSION['userdata']['username'];
}
?>
<div id="dash">
    <h2>Welcome</h2>
    <?php if (!empty($user)) { ?>
    <h2><?php echo "Admin"."&nbsp".$user ?></h2>
    <?php } ?>
</div>

   