<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("loacation:index.html");
	}
	$username = $_SESSION['username'];
	
	$pid = $_GET['pid'];
	
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$dbName = 'miniuni';
	
	$conn = mysqli_connect($server,$user,$password,$dbName);
	if(!$conn){
		die("Connection Error: ".mysqli_connect_error());
	}
	
	echo $pid;
	
	$sql = "update post set likes=likes+1 where pid like ".$pid;
	$result = mysqli_query($conn,$sql);
	
	
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	exit();
?>