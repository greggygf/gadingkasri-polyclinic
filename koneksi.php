<?php
	$host = "localhost";
	$user = "cakralaksana";
	$password = "P@ssw0rd123";
	$database = "cakralaksana";
	
	$connect = mysqli_connect($host,$user,$password,$database) or die (mysqli_error($connect));
	//mysql_select_db($database) or die (mysql_error());
?>