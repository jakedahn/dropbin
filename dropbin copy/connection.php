<?php
include 'configure.php';

if($DATABASE['type'] == 'mysql') {
	$db_connection = mysql_connect($DATABASE['host'], $DATABASE['username'], $DATABASE['password']);
}

mysql_select_db($DATABASE['name']);
?>