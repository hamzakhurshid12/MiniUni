<?php
session_start();
if(isset($_SESSION["username"])){
    echo "Logged in";
    if(isset($_POST["status"])){
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="miniuni";

        $conn=mysqli_connect($servername,$username,$password,$dbname);
        if(!$conn){
        die("Connection failed:".mysqli_connect_error());
        }

        /*Checking the type of status*/
        $type="";
        if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) 
        {
            if (!file_exists($_FILES['video']['tmp_name']) || !is_uploaded_file($_FILES['video']['tmp_name'])) 
            {
                $type="text";
            }
            else
            {
               $type="video";
            }
        }
        else
        {
           $type="image";
        }
        if($type=="text" && $_POST["status"]==""){
            exit;
        }

        /*Inserting records into database*/
        $phptime=time();
        $dateString = date ("Y-m-d H:i:s", $phptime);
        echo "$dateString";
        $sql='insert into post(type,username,url, time,description,likes) values("'.$type.'","'.$_SESSION["username"].'","none","'.$dateString.'","'.$_POST["status"].'",0)';
        $result=mysqli_query($conn,$sql);
        if($result){
            //echo "Record added successfully";
        }else{
            echo "Error:" . $sql . "<br>" . mysqli_error($conn);
        }
        $last_id=mysqli_insert_id($conn);
        echo "$last_id";

        /*Inserting and moving files*/

        if($type!="text"){
        if($type=="image"){
            $sql='update post set url="'.'uploads/'.$last_id."_".$_FILES["image"]["name"].'" where pid='.$last_id;
            $file=$_FILES["image"];
            move_uploaded_file($file["tmp_name"],"uploads/".$last_id.'_'.$file["name"]);
        }
        else if ($type=="video"){
            $sql='update post set url="'."uploads/".$last_id."_".$_FILES["video"]["name"].'" where pid='.$last_id;
            $file=$_FILES["video"];
            move_uploaded_file($file["tmp_name"],"uploads/".$last_id.'_'.$file["name"]);
        }
        $result=mysqli_query($conn,$sql);
        if($result){
            //echo "\nRecord added successfully";
        }else{
            echo "Error:" . $sql . "<br>" . mysqli_error($conn);
        }
    }
    //echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
    echo "<script>history.back()</script>";
    }
}
else{
    header("location: index.php");
}
exit();

?>
