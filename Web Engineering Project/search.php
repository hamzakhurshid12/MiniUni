<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("location:index.php");
	}
	$username = $_SESSION['username'];
	$user = null;
	if(!isset($_GET['q'])){
		$user=$username;
	}else{
		$user = $_GET['q'];
	}
	
?>

<html>

<head>
    <title>NewsFeed - Miniuni</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style-news.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/lsection.css" />
    <link rel="stylesheet" type="text/css" href="css/rsection.css" />
    <link rel="stylesheet" type="text/css" href="css/content.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <style>
        #right-section .circular-image-small {
            width: 40px;
            height: 40px;
        }
    </style>
    <script>
        var user = "<?=$user?>";
var username = "<?=$username?>";
        var app=angular.module("myApp",[]);
        app.controller("myCtrl",function($scope,$http){
            //$scope.results={};
            $(".btn-primary").click( function(){
                var query=$(".search-box").val();
                $http.get("get_search.php?q="+query).success(function(data){
                    $scope.results=data;
                });
        });
           
        $http.get("get_friends.php?q="+username).
  success(function(data, status, headers, config) {
        $scope.friends = data;
    });
        });
    </script>

</head>

<body ng-app="myApp" ng-controller="myCtrl">
    <p ng-model="results"></p>
    <?php include 'header.php';?>

    <div id="left-section">
        <div id="socials">
            <h4>SOCIALS</h4>
            <button id="google_plus" class="btn btn-social"><i class="fa fa-google-plus" style="font-size:24px;"></i></button>
            <div style="clear:left;"></div>
            <button id="social_facebook" class="btn btn-social"><i class="fa fa-facebook" style="font-size:24px"></i></button>
            <div style="clear:left;"></div>
            <button id="social_twitter" class="btn btn-social"><i class="fa fa-twitter" style="font-size:24px"></i></button>
        </div>

        <div id="shortcuts">
            <h4>SHORTCUTS</h4>
            <ul class="shortcut-list">
                <li><a class="time-links" href="newsfeed.php"><span class="glyphicon glyphicon-list-alt"></span> News Feed</a></li>
                <li><a class="time-links" href="#"><span class="glyphicon glyphicon-picture"></span> Pictures</a></li>
                <li><a class="time-links" href="#"><span class="glyphicon glyphicon-facetime-video"></span> Videos</a></li>
                <li><a class="time-links" href="logout.php"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
            </ul>
        </div>
    </div>

    <div class="content">
        <div class="item-box" style="position:relative;">
            <form method="POST" id="status-form" enctype="multipart/form-data" name="status-form">
                <div style="width:88%;float:left;">
                <input class="search-box form-control" placeholder="Search here..." name="search" form="">
                </div>
                <div style="float:left; margin-left:1%;">
                    <button class="btn btn-primary" style="float:left;" type="submit" form="" >Search</button>
                </div>
            </form>
        </div>
        <script>
                $(".glyphicon-picture").click(function(){
                    $("#selectImage").click();
                });
                $(".glyphicon-facetime-video").click(function(){
                    $("#selectVideo").click();
                });
         </script>

        <div class="item-box" style="margin-bottom:1%;" ng-repeat="result in results">
            <img class="circular-image-small" ng-src={{result.dp}}>
            <div class="post-info">
                <b class="post-person-name"><a style="text-decoration: none;" href="timeline.php?q={{result.username}}">{{result.name}}</a></b>
                <i class="post-published">{{result.university}} - {{result.city}}</i>
            </div>
        </div>

    </div>

    <div id="right-section">
        <div id="friends">
            <h4>Friends</h4>

            <div class="person-view" ng-repeat="friend in friends">
                <img class="circular-image-small" ng-src="{{friend.dp}}">
                <div class="post-info">
                    <a ng-href='{{"timeline.php?q="+friend.username}}'><b class="post-person-name">{{friend.name}}</b></a>
                    <i class="post-published">{{friend.email}}</i>
                </div>
				<div style="clear:both;"></div>
			</div>
        </div>
    </div>

    <div style="clear:both;"></div>
    <?php include 'footer.php';?>

</body>

</html>