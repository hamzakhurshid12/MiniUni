<?php
session_start();

// initializing variables
$errors = array();
$username = "";
$name = "";
$password = "";
$email = "";
$phone = "";
$university = "";
$city = "";
$dp_url = "";
$cover_url = ""; 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'miniuni');
		
		if (!isset($_POST['username'])) {
            //$username = mysqli_real_escape_string($db, $_POST['username']);
        }
        else if (!isset($_POST['email'])) {;
            //$email = mysqli_real_escape_string($db, $_POST['email']);
        }
        else if (isset($_POST['password'])) {   
            //$password = mysqli_real_escape_string($db, $_POST['password']);
        }
        else if (isset($_POST['phone'])) {    
            //$phone = mysqli_real_escape_string($db, $_POST['phone']);
        }
        else if (isset($_POST['university'])) {    
            //$university = mysqli_real_escape_string($db, $_POST['university']);
        }
        else if (isset($_POST['city'])) {    
            //$city = mysqli_real_escape_string($db, $_POST['city']);
        }
        else if (isset($_POST['dp_url'])) {    
            //$city = mysqli_real_escape_string($db, $_POST['city']);
        }
        else if (isset($_POST['cover_url'])) {    
            //$city = mysqli_real_escape_string($db, $_POST['city']);
        }
        else{
            echo "Invalid Signup";
            exit;
        }
       
            $user_check_query = 'SELECT * FROM users WHERE username="'.$_POST['username'].'" OR email="'.$_POST['email'].'" LIMIT 1';
            $result = mysqli_query($db, $user_check_query);
            if(mysqli_num_rows($result)>0){// if user exists
                array_push($errors, "Username already exists");
            }
            
          
            // Finally, register user if there are no errors in the form
            if (count($errors) == 0) {
                //$enc_pass = md5($password);//encrypt the password before saving in the database
                $username = $_POST["username"];
                $name = $_POST["name"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $university = $_POST["university"];
                $city = $_POST["city"];
                //$dp_url = $_POST["dp_url"];
                //$cover_url = $_POST["cover_url"];

                /*uploading files to server*/
                $file=$_FILES["dp"];
                move_uploaded_file($file["tmp_name"],"uploads/".$username.'_dp_'.$file["name"]);
                $dp_name=$file["name"];
                $file=$_FILES["cover"];
                move_uploaded_file($file["tmp_name"],"uploads/".$username.'_cover_'.$file["name"]);
                $cover_name=$file["name"];
                
                
                $sql='INSERT INTO `users`(`username`, `name`, `email`, `phone`, `university`, `city`, `dp_url`, `cover_url`) VALUES ("'.$username.'","'.$name.'","'.$email.'","'.$phone.'","'.$university.'","'.$city.'","'.'uploads/'.$username.'_dp_'.$dp_name.'","uploads/'.$username.'_cover_'.$cover_name.'")';
                if(mysqli_query($db,$sql)){
                    echo "Record updated successfully";
                    header('location: register-success.html');
                }
                else{
                    echo "Error:" . $sql . "<br>" . mysqli_error($db);
                }
                
                $sql="INSERT INTO authentication values('".$username."','".$password."')";
                if(mysqli_query($db,$sql)){
                    echo "Record updated successfully";
                    header('location: register-success.html');
                }
                else{
                    echo "Error:" . $sql . "<br>" . mysqli_error($db);
                } 
            }
            else{
                echo "<script>
                history.back();
                alert('Username or Email already exists!');
                </script>";
                //header ("location: index.php");
            }
          
          
?>