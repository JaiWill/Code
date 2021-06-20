<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "nova";
	
	$conn = new PDO("mysql: host=$dbServername; dbname=$dbName","$dbUsername", "$dbPassword");
	//$connect = new PDO("mysql:host=localhost;dbname=testing4", "root", "");

?>