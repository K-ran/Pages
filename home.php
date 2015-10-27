<?
    require("./php/classes/UserClass.php");
    session_start();
    if (!(isset($_SESSION['user']))){
        header("Location: ./index.php");
    }
    //contains the home pages of the website after successful login
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pages</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/storybox.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src = "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-route.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ngInfiniteScroll/1.2.1/ng-infinite-scroll.js"></script>
    <script src="./script/storybox.js"></script>
    <script src="https://cdn.firebase.com/libs/firepad/1.2.0/firepad.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="./css/head.css">
    <link rel="stylesheet" href="https://cdn.firebase.com/libs/firepad/1.2.0/firepad.css" /> -->
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

</head>

<body style="padding-top: 70px" ng-app="homeApp">
	<!-- Header -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Pages</a>
			</div>
			<div class="col-sm-6 col-md-6">
					<form class="navbar-form" role="form">
						<input type="text" class="form-control" placeholder="Search" style="width:300px"></input>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>	</form>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="#/read">Home</a></li>
				<li><a href="#/write">Compose</a></li>
				<li><a href="#">Profile</a></li>
				<li><a class="dropdown-toggle" data-toggle="dropdown" href=""> <? echo $_SESSION['user']->first_name; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
						<li><a href="#">Setting</a></li>
						<li><a href="./logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<!--Header end-->
	<div class="container" >
		<div class="col-md-3" >
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="#">Top Trending</a></li>
				<li><a href="#">Most Recent</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Category-1</a></li>
							<li><a href="#">Category-2</a></li>
							<li><a href="#">Category-3</a></li>
							<li><a href="#">Read more</a></li>
						</ul>
				</li>
				<li><a href="#">Draft</a></li>
				<li><a href="#">Followers</a></li>
				<li><a href="#">Followings</a></li>
			</ul>
		</div>

        <div class="container Sheet col-md-9">
            <div classs="row sheetcontent">
                <div ng-view>
                <!-- All the content will be here -->
                </div>
            </div>
      </div>
		<div class="col-md-2"></div>
	</div>
    <!-- angular and other user defined scripts here-->
    <script src="./script/angular/angularApps.js"></script>
    <script src="./script/angular/controllers/angularControllers.js"></script>
    <script src="./script/angular/directives/boxDirective.js"></script>
    <script src="./script/angular/services/angularServices.js"></script>
</body>
</html>
