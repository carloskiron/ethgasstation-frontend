<?php

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'ethgas');
define('DB_PASSWORD', 'station');
define('DB_NAME', 'tx');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table

$query = "SELECT * FROM txDataLast10k ORDER BY id DESC LIMIT 1";
$result = $mysqli->query($query);
$dataRow = $result->fetch_assoc();
$latestblock = $dataRow['latestblockNum'];

$minerString = file_get_contents("http://localhost/json/miners.json");
$minersArray = json_decode($minerString, true);

?>