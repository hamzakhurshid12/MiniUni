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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINIUNI Social Network</title>
    <link rel="stylesheet" type="text/css" href="css/about.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script>

		var user = "<?=$user?>";
		var username = "<?=$username?>";
		var app = angular.module('timeline', []);
		app.controller('time_controller', function($scope, $http) {
			$scope.addTodo = function(pid) {
                var comment=$("#"+pid).val();
                $http.get("addComment?pid="+pid+"&comment="+comment).
                    success(function(data, status, headers, config){
                        $http.get("get_posts_timeline.php?q="+user).
		  success(function(data, status, headers, config) {
				$scope.posts = data;
			});
			    });
            };
		
			$scope.showVideo = function(itemStatus) {

				if(itemStatus==="video") { //test the Status
				   return true;
				}
				return false;
			}
			
			$scope.showImage = function(itemStatus) {

				if(itemStatus==="image") { //test the Status
				   return true;
				}
				return false;
            }
            
            $scope.showFollow=function(){
                return !(user===username);
            }

            $scope.showUpload=function(){
                return (user===username);
            }

            $scope.follow=function(){
                $http.get("addFriend.php?q="+user).
		        success(function(data, status, headers, config) {
                    if($scope.buttonValue=="Unfollow")
                        $scope.buttonValue= "Follow";
                    else
                        $scope.buttonValue= "Unfollow";
			});
            }

            $scope.like=function(pid){
                $http.get("putLike.php?pid="+pid).
		        success(function(data, status, headers, config) {
                    $("#likesCount"+pid).val(parseInt($("#likesCount"+pid).val())+1);
                    $http.get("get_posts_timeline.php?q="+user).
		            success(function(data, status, headers, config) {
				$scope.posts = data;
            });
			});
            }
			
			if(user===username){
				$http.get("getUserInfo.php?q="+username).
		  success(function(data, status, headers, config) {
				$scope.user_data = data;
				$scope.visit_data = data;
			});
				$http.get("get_friends.php?q="+username).
		  success(function(data, status, headers, config) {
				$scope.friends = data;
			});
			
		  $http.get("get_posts_timeline.php?q="+username).
		  success(function(data, status, headers, config) {
				$scope.posts = data;
			});
			} else {
                $scope.buttonValue="Follow";

				$http.get("getUserInfo.php?q="+user).
		  success(function(data, status, headers, config) {
				$scope.user_data = data;
			});
			$http.get("getUserInfo.php?q="+username).
		  success(function(data, status, headers, config) {
				$scope.visit_data = data;
			});
				$http.get("get_friends.php?q="+user).
		  success(function(data, status, headers, config) {
                $scope.friends = data;
            });
            
            $http.get("get_friends.php?q="+username).
		  success(function(data, status, headers, config) {
               var br = false;
                angular.forEach(data, function(value, key) {
                if (String(value.username)===String(user)){
                    $scope.buttonValue= "Unfollow";
                }
               
                }
                );
               
			});
			
		  $http.get("get_posts_timeline.php?q="+user).
		  success(function(data, status, headers, config) {
				$scope.posts = data;
            });
            
			}
		});
		
    </script>
</head>

<body ng-app="timeline" ng-controller="time_controller">
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
                    <a class="active" href="about.php">Basic info</a>
                    <a href="about_location.php">Location</a>
                    <a href="about_workandedu.php">Work And Education</a>
                    <a href="about_interests.php">Interests</a>
                    <a href="about_languages.php">Languages</a>
                </div>
            </div>
            <div id="right">
                <div>
                    <ul class="info">
                        <li><i class="glyphicon glyphicon-user" style="color:#00BFFF"></i> &nbsp;&nbsp;{{user_data.name}}</li>
                        <li><i class="glyphicon glyphicon-map-marker" style="color:#00BFFF"></i> &nbsp;&nbsp;Lives in {{user_data.city}}</li>
                        <li><i class="glyphicon glyphicon-envelope" style="color:#00BFFF"></i> &nbsp;&nbsp;{{user_data.email}}</li>
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