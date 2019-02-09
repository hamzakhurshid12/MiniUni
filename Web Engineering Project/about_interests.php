<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINIUNI Social Network</title>
    <link rel="stylesheet" type="text/css" href="css/about.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <!--header-->
    <?php
    include "header.php";
    ?>
    <div id="container">
        <div style="width:150px; padding-left:10px;">
            <p id="perinfo">Personal info</p>
        </div>
        <div style="padding:20px 15px;width:100%;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
        <div id="innercontainer">
            <div id="left">
                <div class="list">
                    <a href="about.php">Basic info</a>
                    <a href="about_location.php">Location</a>
                    <a href="about_workandedu.php">Work And Education</a>
                    <a class="active" href="about_interests.php">Interests</a>
                    <a href="about_languages.php">Languages</a>
                </div>
            </div>
            <div id="right">
                <div>
                    <ul class="info">
                        <li>Football</li>
                        <li>Internet</li>
                        <li>Photography</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>