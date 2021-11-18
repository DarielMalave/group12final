<?php
function db_iconnect($db)
{
	// keep credentials this way
	$hostname="127.0.0.1";//localhost
	$username="webuser1";
	//$password="pOaIV9axVgBwKMS2!";
	$password = "0pagtayS1ZDHaBxm!";
	$mysqli = new mysqli($hostname,$username,$password,$db);
	if (mysqli_connect_error())
	{
		die("Something went wrong connecting to $db".mysqli_connect_error());
	}
	return $mysqli;
}
