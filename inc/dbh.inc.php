<?php
	
	//Developoment Connection
	//$dbServername = "localhost";
	//$dbUsername = "root";
	//$dbPassword = "";
	//$dbName = "nova";
	
	//Remote Connection
	$dbServername = "remotemysql.com";
	$dbUsername = "2AI812dNkZ";
	$dbPassword = "twrkg81IYR";
	$dbName = "2AI812dNkZ";
	
	
	$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
	
?>