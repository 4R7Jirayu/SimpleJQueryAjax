<?php
$server = "localhost";
$user = "root";
$pass = "";
$db_name = "datalabwebtech";
$conn = new mysqli(
	$server,
	$user,
	$pass,
	$db_name
	);
	mysqli_set_charset($conn,'utf8');
?>