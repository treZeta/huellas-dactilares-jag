<?php
$mysql_hostname = "127.0.0.1";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "php_finger_module_db";
$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

//Check connection
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL:".mysqli_connect_errno();
}
?>