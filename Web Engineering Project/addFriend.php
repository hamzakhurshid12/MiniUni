<?php
session_start();
if(isset($_SESSION["username"])){
    if(isset($_GET["q"])){
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="miniuni";

        $conn=mysqli_connect($servername,$username,$password,$dbname);
        if(!$conn){
        die("Connection failed:".mysqli_connect_error());
        }
        $username=$_SESSION["username"];
        if($_GET["q"]!=$username){
            /*checking if already followed*/
            $sql='select * from friends where username="'.$username.'" and friend_username="'.$_GET["q"].'"';
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $sql='delete from friends where username="'.$username.'" and friend_username="'.$_GET["q"].'"';
                $result=mysqli_query($conn,$sql);
                if($result){
                    echo "Record added successfully\n";
                }else{
                    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
                }
            }else{
            $sql='insert into friends values("'.$username.'","'.$_GET["q"].'")';
            $result=mysqli_query($conn,$sql);
            if($result){
                echo "Record added successfully\n";
            }else{
                echo "Error:" . $sql . "<br>" . mysqli_error($conn);
            }
        }
        }
    }
}
?>
