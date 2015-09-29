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
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body style="padding-top: 70px">
	<!-- Header -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Pages</a>
			</div>

			<div class="col-sm-6 col-md-6">
					<form class="navbar-form" role="form">
						<input type="text" class="form-control" placeholder="Search" style="width:300px"></input>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>	</form>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Compose</a></li>
				<li><a href="#">Profile Pic</a></li>
				<li><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <? echo $_SESSION['user']->first_name; ?> <span class="caret"></span></a>
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
	<div class="container-fluid">
		<div class="col-md-3">
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
		<div class="col-md-2"></div>
		<div class="col-md-5" class="box">

			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="nav nav-pills">
					<li><img class="img-responsive" src="http://www.celebdetail.com/wp-content/uploads/2013/11/Katrina-Kaif-Boyfriend-age-Biography.jpg" alt="Chania" style="height:50px;width:50px" >
					</li>
					<li>Username<br>Date</li>
					</ul>
				</div>
				<div class="panel-body">Content</div>
				<div class="panel-footer">
					<ul class="nav nav-pills" style="display:inline">
					<li style="display:inline"><a href="#">Likes <span class="glyphicon glyphicon-thumbs-up"></span></a>
					</li>
					<li style="display:inline"><a href="#">Comment</a>
					</li>
					<li class="navbar-right"><a href="#"><button type="button" class="btn btn-primary btn-sm">Read More</button></a></li>
					</ul>
				</div>
			</div>




		</div>
		<div class="col-md-2"></div>
	</div>
</body>
</html>
