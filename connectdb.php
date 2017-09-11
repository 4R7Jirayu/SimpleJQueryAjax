<?php
	//session_start();	
	$server ="localhost";
	$user ="root";
	$password ="";
	$db_name ="datalabwebtech";	
	//connect database
	$conn=mysqli_connect($server,$user,$password) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้");
	//connect table
	mysqli_select_db($conn,$db_name) or die("ไม่สามารถเลือกตารางข้อมูลได้");
	mysqli_query($conn,'utf8');
?>