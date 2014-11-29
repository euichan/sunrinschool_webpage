<?php
$mysql_hostname = "localhost";//hostname
$mysql_user = "root";//mysql user id
$mysql_password = "root";//mysql user password
$mysql_database = "sunrinweb";//mysql selected db

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("db connect error");
mysql_select_db($mysql_database, $bd) or die("db connect error");

mysql_query("SET NAMES 'utf8'");
?>
