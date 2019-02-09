<?php

	session_start();
	if(!isset($_SESSION['username'])){
		header("location:index.html");
	}
	$username = $_SESSION['username'];
	$pid=$_GET["pid"];
	$comment=$_GET["comment"];

	//$q = $_GET['q'];
	//$online_users = null;
	
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$dbName = 'miniuni';
	
	$conn = mysqli_connect($server,$user,$password,$dbName);
	if(!$conn){
		die("Connection Error: ".mysqli_connect_error());
	}
	
	$sql = "insert into comment (pid,text,username) values (".$pid.",'".$comment."','".$username."')";
	$result = mysqli_query($conn,$sql);
	if($result){
		//echo "\nRecord added successfully";
	}else{
		echo "Error:" . $sql . "<br>" . mysqli_error($conn);
	}
	
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	exit();
			
?>