<?php

	session_start();
	if(!isset($_SESSION['username'])){
		header("loacation:index.html");
	}
	$username = $_SESSION['username'];

	$q = $_GET['q'];
	$online_users = null;
	
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$dbName = 'miniuni';
	
	$conn = mysqli_connect($server,$user,$password,$dbName);
	if(!$conn){
		die("Connection Error: ".mysqli_connect_error());
	}
	
	$sql = "select * from users where username in (select friend_username from friends where username like '".$q."')";
	$result = mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
				$online_users[] = (object)array('username' => $row['username'], 'name' => $row['name'],'email' => $row['email'],'dp' => $row['dp_url']);
			
		}
	}
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
		if($online_users!=null){
		echo json_encode($online_users);
	} else {
		echo null;
	}
	exit();
			
?>