<?php

$errMsg = 'Could not connect to database'.'<br/>';
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = '';
$database = 'mydatabase';

//mysql_connect($sqlHost, $sqlUser, $sqlPass) || die($errMsg);  //Example of connecting to server. The @ symbol will remove any
//mysql_select_db($database);								   //default error msg. And instead we use || die() meaning
//if it doesnt connect kill page and show the message in $errMsg

//This way can also be used the mysqli_connect way is usually better
//$mysqlcon=mysqli_connect($sqlHost, $sqlUser, $sqlPass) or die('could not connect.');
//MySQLi_select_db($mysqlcon , $database) or die('no such db');

if(mysql_connect($sqlHost, $sqlUser, $sqlPass) && mysql_select_db($database))//Connecting to the database
{
	echo 'Connected to database'.'<br/>'.'<br/>';
}
else
{
	die($errMsg);
}

?>