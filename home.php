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
    <link rel="shortcut icon" href="/favicon.ico" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/storybox.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src = "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-route.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ngInfiniteScroll/1.2.1/ng-infinite-scroll.js"></script>
    <script src="./script/storybox.js"></script>
    <script src="https://cdn.firebase.com/libs/firepad/1.2.0/firepad.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/3.0.0/ng-tags-input.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/3.0.0/ng-tags-input.min.css"></script> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/3.0.0/ng-tags-input.css">
    <!-- <link rel="stylesheet" href="https://cdn.firebase.com/libs/firepad/1.2.0/firepad.css" />  -->
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script>
      $(function() {
    				  $("#datepicker").datepicker({dateFormat: 'yy-mm-dd',
    				                                minDate:'-120y',maxDate:0,
    				                                changeMonth: true,
    				                                changeYear: true,
    				                                yearRange: '-120:+0'
    				                                });
    				});
     </script>


</head>

<body style="padding-top: 70px" ng-app="homeApp">
	<!-- Header -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Pages</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<form class="navbar-form navbar-left" role="search">
					<input type="text" class="form-control" placeholder="Search"></input>
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="#/">Home</a></li>
					<li><a href="#/write">Compose</a></li>
					<li><a href="#/profile"> <? echo $_SESSION['user']->first_name; ?></a>
					<li><a href="./logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!--Header end-->
	<div class="container" >
		<div class="col-md-3" >
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="#">Top Trending</a></li>
				<li><a href="#/MostRecent">Most Recent</a></li>
				<li><a href="#/MyStories">My Stories</a></li>
				<li><a href="#">Followers</a></li>
				<li><a href="#">Followings</a></li>
			</ul>
		</div>

        <div class="container Sheet col-md-9">
            <div class="row sheetcontent">
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
    <script src="./script/angular/directives/writeDirective.js"></script>
    <script src="./script/angular/services/angularServices.js"></script>
    <script>
        $(".nav li").on("click", function() {
          $(".nav li").removeClass("active");
          $(this).addClass("active");
        });
    </script>
</body>
</html>
