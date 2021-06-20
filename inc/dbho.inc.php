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
	
	
	$conn = new PDO("mysql: host=$dbServername; dbname=$dbName","$dbUsername", "$dbPassword");
	//$connect = new PDO("mysql:host=localhost;dbname=testing4", "root", "");

?>