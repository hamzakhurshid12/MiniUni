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
    <div class="left-side" style="height:135vh;">
        <h1 style="color:white; ">Welcome to MiniUni</h1>
        <h4 style="color:white; ">The Perfect Destination for your University Social Matters.</h4>
    </div>
    <div class="right-side ">
        <div class="content " style="margin-bottom:0;margin-top:5%;">
            <div class="signin ">
                <h2>Sign Up</h2>
                <form method="POST" enctype="multipart/form-data" name="signup" action="signup_data.php">
                    <div class="input-group ">
                        <span class="input-group-addon "><i class="glyphicon glyphicon-user "></i></span>
                        <input id="username " type="text" class="form-control" name="username" placeholder="Enter Username" required>
                    </div>
                    <div class="input-group ">
                        <span class="input-group-addon "><i class="glyphicon glyphicon-user "></i></span>
                        <input id="name " type="text" class="form-control " name="name" placeholder="Enter Name "  required>
                    </div>
                    <div class="input-group ">
                        <span class="input-group-addon "><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password " type="password" class="form-control " name="password" placeholder="Enter password " required>
                    </div>
                    <div class="input-group ">
                        <span class="input-group-addon "><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email " type="email" class="form-control " name="email" placeholder="Email "  required>
                    </div>
                    <div class="input-group ">
                        <span class="input-group-addon "><i class="glyphicon glyphicon-earphone "></i></span>
                        <input id="phone " type="number" class="form-control " name="phone" placeholder="Phone "  required>
                    </div>
                    <div class="input-group ">
                        <span class="input-group-addon "><i class="glyphicon glyphicon-education "></i></span>
                        <input id="university " type="text" class="form-control " name="university" placeholder="University Name "  required>
                    </div>
                    <div class="input-group ">
                        <span class="input-group-addon "><i class="glyphicon glyphicon-road "></i></span>
                        <input id="city " type="text" class="form-control " name="city" placeholder="City"  required>
                    </div>
                    <span>Attach Display Image</span>
                    <div class="input-group ">
                        <span class="input-group-addon "><i class="glyphicon glyphicon-picture"></i></span>
                        <input id="dp_url" type="file" accept="image/png, image/jpeg" class="form-control " name="dp" placeholder="Insert DP"  required>
                    </div>
                    <span>Attach Cover Image</span>
                    <div class="input-group ">
                        <span class="input-group-addon "><i class="glyphicon glyphicon-picture"></i></span>
                        <input id="cover_url" type="file" accept="image/png, image/jpeg" class="form-control " name="cover" placeholder="Insert Cover Photo"  required>
                    </div>
                    <img src="images/captcha.jpg " width=50% class="img-thumbnail " alt="Captcha Image ">
                    <div class="input-group ">
                        <span class="input-group-addon "><i class="glyphicon glyphicon-eye-open "></i></span>
                        <input id="captcha " type="text " class="form-control " name="captcha " placeholder="Are you a human? " required>
                    </div>

                    <br>
                    <div class="buttons ">
                        <button type="submit " name="reg_user" class="btn btn-primary " style="background-color:#2e1114;border:0px solid; box-shadow:-2px -2px 2px black; ">Register</button>
                    </div>
                    <p>
                        Already a member? <a href="login.html"> Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>