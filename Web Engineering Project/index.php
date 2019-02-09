<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>MiniUni - Social Network for University Students</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/start.css">
    <style>
        body:before {
            background-image: url("images/background.jpg");
        }
    </style>
</head>

<body style="margin:0;padding:0;">
    <div class="header">
        <img class="logo-img" src="images/logo.png" width=10% height=10% alt="Home" />
    </div>
    <div class="left-side">
        <h1 style="color:white;">Welcome to MiniUni</h1>
        <h4 style="color:white;">The Perfect Destination for your University Social Matters.</h4>
    </div>
    <div class="right-side">
        <div class="content">
            <div class="signin">
                <h2>Sign In</h2>
                <form method="POST" action="login.php">
                    <?php
                    if(isset($_GET["type"])){
                        $type=$_GET["type"];
                        if($type=="invalid_password"){
                            echo '<span style="color:red">You entered an incorrect password. Please try again!</span>';
                        }
                        else if ($type=="invalid_username"){
                            echo '<span style="color:red">The username you entered deos not exist. Please try again!</span>';
                        }
                        else if ($type=="logged_out"){
                            echo '<span style="color:green">You have been signed out. You can log in again!</span>';
                        }
                    }
                    ?>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="email" type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="input-group fpass">
                        <a class="fpass" href="forgot-password.html">Forgot Password?</a>
                    </div>

                    <div class="buttons">
                        <button type="submit" class="btn btn-primary" style="background-color:rgba(29, 161, 242,0.6);border:0px solid;">SignIn</button>
                        <button form="" class="btn btn-primary" onClick="window.open ('signup.php','_self',false)" style="background-color:rgba(29, 161, 242,0.6);border:0px solid;">SignUp </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="footer">
        (c) Copyrights Reserved 2018.<br> Produced by Hamza Khurshid, Muhammad Qaiser & Alishba Shahid
    </div>
</body>

</html>