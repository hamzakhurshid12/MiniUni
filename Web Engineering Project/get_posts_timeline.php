<?php

	session_start();
	if(!isset($_SESSION['username'])){
		header("loacation:index.html");
	}
	$username = $_SESSION['username'];

	$q = $_GET['q'];
	$post_data = null;
	
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$dbName = 'miniuni';
	
	$conn = mysqli_connect($server,$user,$password,$dbName);
	if(!$conn){
		die("Connection Error: ".mysqli_connect_error());
	}
	
	$sql = "select * from post where username like '".$q."' order by time desc";
	$result = mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$sql1 = "select * from comment where pid like ".$row["pid"].";";
			$result1 = mysqli_query($conn,$sql1);
			$comments_data=null;
			if(mysqli_num_rows($result1)>0){
				while($row1 = mysqli_fetch_assoc($result1)){
					$sql_user = "select * from users where username like '".$row1["username"]."';";
					$result_user = mysqli_query($conn,$sql_user);
					if(mysqli_num_rows($result_user)>0){
						while($row_user = mysqli_fetch_assoc($result_user)){
							
							$comments_data[] = (object)array("cid"=>$row1["cid"],"pid"=>$row1["pid"],"text"=>$row1["text"],
							"username"=>$row_user["username"],'name' => $row_user['name'],'dp' => $row_user['dp_url']);
						}
					}
				}
			}
			
			$post_data[] = (object)array('pid' => $row['pid'],'username' => $row['username'],'type' => $row['type'],'url' => $row['url'],'time' => $row['time'],
				'description' => $row['description'], 'likes' => $row['likes'],"comments" => $comments_data);
			$comments_data = null;
			
			
		}
	}
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	if($post_data!=null){
		echo json_encode($post_data);
	} else {
		echo null;
	}
	
	exit();
			
?>