<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINIUNI Social Network</title>
    <link rel="stylesheet" type="text/css" href="stylesheet_miniuni_contact.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/contact.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
</head>

<body>
    <!--header-->
    <section>
     <?php
    include "header.php";
    ?>
    </section>
    <!-- google map -->
    <section>
        <div>
            <div class="map">
                <iframe src="https://www.google.com/maps/d/embed?mid=188OrSQDEmHNzErNfu4hsZuVCmQg" width="100%" height="350px"></iframe>
                <div class="googlemap">
                    <h1 style="font-size:50px;">Get in touch</h1>
                    <p style="color:white;">This is a google map. You may see our location.</p>
                </div>
            </div>
        </div>
    </section>
    <!--message -->
    <section>
        <div id="container">
            <div id="left">
                <div class="contact-form">
                    <div class="cnt-title">
                        <h3>Send Us A Message</h3>
                        <form method="POST" action="contact-post.php">
                            <div class="form-group">
                                <input type="text" id="input" name="name" required="required" />
                                <label class="control-label" for="input">First & Last Name</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" name= "email" required="required" />
                                <label class="control-label" for="input">Email@</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" name= "phone" required="required" />
                                <label class="control-label" for="input">Phone No.</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" name= "company" required="required" />
                                <label class="control-label" for="input">Company</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <textarea rows="4" id="textarea" name= "text" required="required"></textarea>
                                <label class="control-label" for="textarea">Message</label><i class="mtrl-select"></i>
                            </div>
                            <div class="submit-btns">
                                <button class="mtr-btn signup" type="submit" style="background-color:#035976; border:#035976;"><i class="glyphicon glyphicon-send" style="font-size:20px;color:white;"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="right">
                <div class="cntct-adres">
                    <h3 style="color:white;">Contact Info:</h3>
                    <ul>
                        <li>
                            <i class="glyphicon glyphicon-map-marker" style="font-size:20px;color:white;"></i>
                            <p style="color:white;">NUST, H-12 CAMPUS, ISLAMABAD</p>
                        </li>
                        <li>
                            <i class="glyphicon glyphicon-phone" style="font-size:20px;color:white;"></i>
                            <p style="color:white;">0336-4439991</span>
                        </li>
                        <li>
                            <i class="glyphicon glyphicon-envelope" style="font-size:20px;color:white;"></i>
                            <p style="color:white;">info@yourmail.com</p>
                        </li>
                    </ul>
                    <ul class="social-media">
                        <li>
                            <a href="#" title=""><i class="glyphicon glyphicon-facebook-square" style="font-size:20px;color:white;"></i></a>
                        </li>
                        <li>
                            <a href="#" title=""><i class="glyphicon glyphicon-google-plus-square" style="font-size:20px;color:white;"></i></a>
                        </li>
                        <li>
                            <a href="#" title=""><i class="glyphicon glyphicon-pinterest-square" style="font-size:20px;color:white;"></i></a>
                        </li>
                        <li>
                            <a href="#" title=""><i class="glyphicon glyphicon-twitter-square" style="font-size:20px;color:white;"></i></a>
                        </li>
                    </ul>
                    <h1 class="bg-cntct" style="color:white;">MINIUNI</h1>
                </div>
            </div>
        </div>
    </section>
    <?php
    include "footer.php";
    ?>
</body>

</html>