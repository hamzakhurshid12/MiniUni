<?php
if(isset($_GET["q"])){
$q = $_GET['q'];
$users = null;

$server = 'localhost';
$user = 'root';
$password = '';
$dbName = 'miniuni';

$conn = mysqli_connect($server,$user,$password,$dbName);
if(!$conn){
    die("Connection Error: ".mysqli_connect_error());
}

$sql = "select * from users where name like '%".$q."%'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $users[] = (object)array('username' => $row['username'], 'name' => $row['name'],'email' => $row['email'],'dp' => $row['dp_url'],'city' => $row['city'],'university' => $row['university']);
    }
}
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
    if($users!=null){
    echo json_encode($users);
} else {
    echo null;
}
exit();
}
else{
    echo null;
    exit;
}
        
?>