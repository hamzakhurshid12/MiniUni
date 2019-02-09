<?php
	
	session_start();
	if(!isset($_SESSION['username'])){
		header("loacation:index.html");
	}
	$username = $_SESSION['username'];

    if ( 0 < $_FILES['image']['error'] ) {
        echo 'Error: ' . $_FILES['image']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' .$username."_dp_".$_FILES["image"]["name"]);
    }
	
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$dbName = 'miniuni';
	
	$conn = mysqli_connect($server,$user,$password,$dbName);
	if(!$conn){
		die("Connection Error: ".mysqli_connect_error());
	}
	
	$sql="update users set dp_url='uploads/".$username."_dp_".$_FILES["image"]["name"]."' where username='".$username."'";
	
	$result = mysqli_query($conn,$sql);
	
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	exit();
?>