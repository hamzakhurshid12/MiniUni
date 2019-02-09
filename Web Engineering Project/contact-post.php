<?php
session_start();
if(isset($_POST["text"])){
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="miniuni";

        $conn=mysqli_connect($servername,$username,$password,$dbname);
        if(!$conn){
        die("Connection failed:".mysqli_connect_error());
        }

        /*Inserting records into database*/
        $sql='insert into contact(name,phone,email,company,text) values("'.$_POST['name'].'","'.$_POST['phone'].'","'.$_POST['email'].'","'.$_POST["company"].'","'.$_POST['text'].'")';
        $result=mysqli_query($conn,$sql);
        if($result){
            //echo "Record added successfully";
        }else{
            echo "Error:" . $sql . "<br>" . mysqli_error($conn);
        }
    echo "<script>history.back(); alert('Your message has been sent successfully');</script>";
    }
else{
    header("location: index.php");
}
exit();

?>
