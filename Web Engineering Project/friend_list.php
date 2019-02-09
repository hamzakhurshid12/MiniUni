<!doctype html>

<html>

<head>
    <title>Profile - Miniuni</title>
    <link rel="stylesheet" type="text/css" href="css/timeline.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/about.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/lsection.css" />
    <link rel="stylesheet" type="text/css" href="css/rsection.css" />
    <link rel="stylesheet" type="text/css" href="css/content.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" />
</head>

<style>
#friendsul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    padding-top: 10px;
}
.friendsli{
    border: 1px solid #e9ebee;
    display: inline-block;
    margin: 0 0 13px 13px;
    padding: 0 10px 0 0;
    position: relative;
    vertical-align: top;
    width: 390px;
}
#perinfo{
    border-bottom:2px solid #00BFFF;
    padding:10px 10px 2px 10px;
}
.gallery {
    vertical-align: middle;
    width: 100%;
    height: 190px;
    padding: 5px;
    border:1px solid grey;
}

.item-box td{
    margin-right:5%;
}
</style>

<body>

<?php
    include 'header.php';
    include 'topsection.php';
    include 'leftsection.php';
    
    $db = mysqli_connect('localhost', 'root', '', 'miniuni');
    $sql = "SELECT * FROM `post`";
    $result = mysqli_query($db , $sql) or die("Bad Insert: $sql");
    ?>

   <div class="content">
        <div class="item-box">
        <p id="perinfo">Friends</p>
            <table style="cellspacing:5px;">
            <?php
            $i = 0;
            while($row = mysqli_fetch_assoc ($result)){
                
                    if($i%2==0){
                        echo "<tr>";
                    }
                    // Import data from db, friends dp and name 
                    echo "<td><img src='{$row{'url'}}' class='gallery'></td>";
                    if($i%3==1){
                        echo "</tr>";
                    }
                    $i++;
                }
            ?>
            </table>
            </div>
        </div>
   </div>

   <?php
    include "rightsection.php";
    include "footer.php"
    ?>

</body>


</html>