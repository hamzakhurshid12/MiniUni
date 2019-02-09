<?php
if (isset($_POST["username"])){

$servername="localhost";
$username="root";
$password="";
$dbname="miniuni";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("Connection failed:".mysqli_connect_error());
}
$sql='select password from authentication where username="'.$_POST["username"].'"';
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        if($row["password"]===$_POST["password"]){
            session_start();
            $_SESSION["username"]=$_POST["username"];
            header("location: newsfeed.php");
        }
        else{
            header("location: index.php?type=invalid_password");
        }
    }
}else{
    header("location: index.php?type=invalid_username");
}
}
else{
    echo "Invalid query";
}
?>