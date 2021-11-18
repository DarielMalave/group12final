<?php
function db_iconnectM($db)
{
	//echo"in";
	$hostname="127.0.0.1";//localhost
	//$username="webuser";
	$username = "webuser3";
	//$password="pOaIV9axVgBwKMS2!";
	$password = "fz1kz3Acsh1Jq8FG!";
	$mysqli = new mysqli($hostname,$username,$password,$db);
	//echo"here";
	if (mysqli_connect_error())
	{
		die("Something went wrong connecting to $db".mysqli_connect_error());
	}
	//echo"still";
	return $mysqli;
}