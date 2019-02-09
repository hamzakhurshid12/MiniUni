<div style="clear:left;"></div>
<div id="top-section" ng-app="timeline" ng-controller="time_controller">
        <img id="cover" ng-src="{{user_data.cover}}" style="width:100%;height:32em;" />
        <img id="profile" ng-src="{{user_data.dp}}">

        <button type="button" id="follow" class="btn btn-primary" ng-show="showFollow()" ng-click="follow()">{{buttonValue}}</button>
        <button id="pic" ng-show="showUpload()" onClick="uploadImage()" class="btn btn-primary" form=""><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Change Picture</Button>
            <input style="display:none;" onChange='upload()'  type="file" name="image" id="hidden_pic" class="btn btn-primary">
            
        <div id="timeline-menu">
            <div class="logo-img-second">
                <h3 id="name">{{user_data.name}}</h3>
            </div>
            <ul class="nav-bar-list" ng-show="showUpload()">
                <li><a class="time-links" href="timeline.php">Time line</a></li>
                <li><a class="time-links" href="photo.php">Pictures</a></li>
                <li><a class="time-links" href="video.php">Videos</a></li>
            </ul>

        </div>

    </div>