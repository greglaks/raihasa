<?php
//  $servername = "localhost";
//  $username = "raihasa_r";
//  $password = "JakartaSehat2020";
//  $dbname = "raihasa_r";


$servername = "localhost";
$username = "test";
$password = "test";
$dbname = "raihasa";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

function createConnection(){
$servername = "localhost";
$username = "test";
$password = "test";
$dbname = "raihasa";

// 	$servername = "localhost";
// 	$username = "raihasa_r";
// 	$password = "JakartaSehat2020";
// 	$dbname = "raihasa_r";
	$test = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($test->connect_error) {
		die("Connection failed: " . $test->connect_error);
	}
	return $test;	
}
?>