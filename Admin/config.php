<?php 
/**
 * Php version 7.2.10
 * 
 * @category Components
 * @package  Packagename
 * @author   Sumit kumar Pandey <pandeysumit399@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/php%20task%202/html/products.php
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OnlineExam";
$html="";
global $count,$status;
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Error Occured".$mysqli_connect_error);
}
//  else {
//     echo "connneted";
// }

?>

