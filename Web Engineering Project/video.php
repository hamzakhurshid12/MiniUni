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
    <style>
    .column {
  float: left;
  width: 50%;
  padding-left: 10px;
  border: 1px solid grey;
}


#innercontainer{
			
			width: 99%;
			margin:0px 5px 3px 5px;
			padding:0px;
			background: white;
			position:center;
			border:0.5px;
			
        }

#perinfo{
    border-bottom:2px solid #00BFFF;
    padding:10px 10px 2px 10px;
}
.gallery {
    vertical-align: middle;
    width: 190px;
    height: 190px;
    padding: 5px;
}
</style>
</head>

<body ng-app="timeline" ng-controller="time_controller">

<?php
 include 'header.php';?>

<div id="top-section">
        <img id="cover" ng-src="{{user_data.cover}}" style="width:100%;height:32em;" />
        <img id="profile" ng-src="{{user_data.dp}}">

        <button type="button" id="follow" class="btn btn-primary" ng-show="showFollow()" ng-click="follow()">{{buttonValue}}</button>
        <button id="pic" ng-show="showUpload()" onClick="uploadImage()" class="btn btn-primary" form=""><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Change Picture</Button>
            <input style="display:none;" onChange='upload()'  type="file" name="image" id="hidden_pic" class="btn btn-primary">
            
        <div id="timeline-menu">
            <div class="logo-img-second">
                <h3 id="name">{{user_data.name}}</h3>
            </div>
            <ul class="nav-bar-list">
                <li><a class="time-links" href="timeline.php">Time line</a></li>
                <li><a class="time-links" href="photo.php">Pictures</a></li>
                <li><a class="time-links" href="video.php">Videos</a></li>
            </ul>

        </div>

    </div>

    <?php include "leftsection.php";
    ?>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'miniuni');
    $sql = "SELECT * FROM `post`";
    $result = mysqli_query($db , $sql) or die("Bad Insert: $sql");
    ?>

   <div class="content">
        <div class="item-box">
            <p id="perinfo">Video</p>
            <table>
            <?php
            $i = 0;
            while($row = mysqli_fetch_assoc ($result)){
                if($row['type']=="video"){
                    if($i%3==0){
                        echo "<tr>";
                    }
                    echo "<td><img src='{$row{'url'}}' class='gallery'></td>";
                    if($i%3==2){
                        echo "</tr>";
                    }
                    $i++;
                }
            }
            ?>
            </table>
                
            </div>
        </div>
   </div>
   
   <script>
        let htmlStyles = window.getComputedStyle(document.querySelector("html"));
        let rowNum = parseInt(htmlStyles.getPropertyValue("--rowNum"));
    </script>

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