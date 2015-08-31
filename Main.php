<?php
//Example program which incrments a counter in a database everytime a user with a new IP address visits
require_once 'Connect.php';			//Requiring Connect.php which connects to the database

$userIP = $_SERVER['REMOTE_ADDR'];	//Get the current users IP address

function ipExists($ip)
{
	$query = "SELECT `IP` FROM `userip` WHERE `IP` = '$ip'";
	$queryRunner = mysql_query($query);
	
	if(mysql_num_rows($queryRunner) == 0)//Counts the number of rows returned from the query and if there are none
	{
		return false;
	}
	else
	{
		return true;
	}
}

function ipAdd($ip)
{
	$query = "INSERT INTO userip (IP) VALUES ('$ip');";
	$queryRunner = mysql_query($query);
}

function updateCounter()
{
	$query = "SELECT count FROM hitcounter;";//Creating an SQL query
	
	if(@$queryRunner = mysql_query($query))//Checking if the query is okay and returns the data from the query
	{
		$count = mysql_result($queryRunner, 0, 'Count');//Using the sql_result function to retrieve value of the query data. 
														//in row 0 column 'Count'
		++$count;										//Increment the count variable
		
		$updateQuery = "UPDATE hitcounter SET `Count` = '$count'"; //Update the database with the new value. ($count)
		@$queryUpdateRunner = mysql_query($updateQuery);
	}
}

if(ipExists($userIP))
{
	echo 'IP Exists';
}
else 
{
	ipAdd($userIP);
	updateCounter();
	echo 'New IP address, counter has been incremented, IP has been stored.';	
}

?>