<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("loacation:index.html");
	}
	//$username = $_SESSION['username'];
	$user = $_GET['q'];
	
	$server = 'localhost';
	$userDB = 'root';
	$password = '';
	$dbName = 'miniuni';
	
	$conn = mysqli_connect($server,$userDB,$password,$dbName);
	if(!$conn){
		die("Connection Error: ".mysqli_connect_error());
	}
	$sql = "select * from users where username like '".$user."';";
	$result = mysqli_query($conn,$sql);
	$online_user;
	
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
				$online_user = (object)array('city'=>$row['city'],'university'=>$row['university'],'username' => $row['username'], 'name' => $row['name'],'email' => $row['email'],'dp' => $row['dp_url'],'cover'=>$row['cover_url']);
		}
	}
	
	header("Content-Type: application/json");
	header("Access-Control-Allow-Origin: *");
	echo json_encode($online_user);
	exit();

?>