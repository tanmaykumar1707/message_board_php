<?php 

$db_host = "localhost";
$db_user = "root";
$db_pass= "";
$db_name= "board";


// $db_host = "localhost:3306";
// $db_user = "admin_board";
// $db_pass= "Vi8?Qy9otAgofu7c";
// $db_name= "adminvikash_board";

$connection=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(mysqli_connect_errno())
die("Database Connection Failed: ".mysqli_connect_error());



?>