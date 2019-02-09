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



<!doctype html>

<html>
<head>
    <title>Profile - Miniuni</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/timeline.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/lsection.css" />
    <link rel="stylesheet" type="text/css" href="css/rsection.css" />
    <link rel="stylesheet" type="text/css" href="css/content.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
                $("#likesSpan"+pid).attr('ng-click','');
            });
			});
            $("#likesSpan"+pid).attr('ng-click','');
            $("#likesSpan"+pid).attr('onclick','');
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
    
    <script>
        function submitPost(){
            document.getElementById("status-form").submit();
            document.getElementById("status-form").reset();
        }
    </script>

<script>
		function uploadImage(){
			$("#hidden_pic").click();
		}
		
		function upload() {
			var file_data = $('#hidden_pic').prop('files')[0];   
			var form_data = new FormData();                  
			form_data.append('image', file_data);
			console.log("123");                            
			$.ajax({
				url: 'upload.php', // point to server-side PHP script 
				dataType: 'text',  // what to expect back from the PHP script, if anything
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,                         
				type: 'post',
				success: function(php_script_response){
					window.location.reload();
				}
			 });
	 }
	</script>
</head>

<body ng-app="timeline" ng-controller="time_controller">

<?php include 'header.php';?>

<?php include 'topsection.php';?>

    <div style="clear:left;"></div>
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
    <div class="item-box" style="height:40%;position:relative;">
            <div>
                <img class="circular-image-medium" ng-src="{{visit_data.dp}}">
            </div>
            <form method="POST" id="status-form" action="status-upload.php" enctype="multipart/form-data" name="status-form">
                <div style="position:relative;width:100%;height:20%">
                <textarea class="status-write" placeholder="What's on your mind?" name=status></textarea>
                <input id="selectImage" type="file" accept="image/jpeg" name="image">
                <input id="selectVideo" type="file" accept="video/mp4" name="video">
            </div>
            </form>
            <div style="right:5%;bottom:5%;width:100%; margin-top:15%;">
            <button class="btn btn-primary" style="width:15%;float:right" type="submit" onClick="submitPost()">Post</button>
            <span class="glyphicon glyphicon-picture" style="font-size:150%;float:right;;margin-right:3%;"></span>
            <span class="glyphicon glyphicon-facetime-video" style="font-size:150%;float:right;;margin-right:3%;"></span>
            </div>
        </div>
        <script>
                $(".glyphicon-picture").click(function(){
                    $("#selectImage").click();
                });
                $(".glyphicon-facetime-video").click(function(){
                    $("#selectVideo").click();
                });
         </script>

        <div class="item-box" ng-repeat="post in posts">
            <img class="circular-image-small" ng-src="{{user_data.dp}}">
            <div class="post-info">
                <b class="post-person-name">{{user_data.name}}</b>
                <i class="post-published">{{post.time}}</i>
            </div>
			<br><br><br>
			<div>
			{{post.description}}
			</div>
            <img class="post-image" ng-src="{{post.url}}" ng-show="showImage(post.type)" />
			<video class="post-image" ng-show="showVideo(post.type)" controls >
				<source ng-src="{{post.url}}">
			</video>
            <div class="post-icons">
                <span id="likesSpan{{post.pid}}" ng-click="like(post.pid)" class="glyphicon glyphicon-thumbs-up"></span><span id="likesCount{{post.pid}}">{{post.likes}}</span>
            </div>
			 <div class="comments">
                <div class="comment" ng-repeat="comment in post.comments"> <!--ng-repeat-->
                    <img class="circular-image-little" src="{{comment.dp}}"/>
					<div class="post-info">
						<a ng-href='{{"timeline.php?q="+comment.username}}'><b class="post-person-name">{{comment.name}}</b></a>
						<i class="post-published">{{comment.text}}</i>
					</div>
					<div style="clear:both;" ></div>
                </div>
            </div>
			<br>
            <img class="circular-image-little" ng-src="{{visit_data.dp}}">
            <form ng:submit="addTodo(post.pid)">
                <input form="comment" type="text" name="comment" placeholder="Write a comment..." id={{post.pid}} class="comment-box" >
                <input class="btn btn-primary" type="submit">
            </form>
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