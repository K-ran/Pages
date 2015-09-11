<html>
	<head>
	    <?
	        session_start();
	        if (isset($_SESSION['user'])){
	            header("Location: ./home.php");
	        }
		?>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body style="background-image:url('./resource/dk.jpg');background-size:cover">
	<!-- Header -->
	
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<p class="navbar-brand" href="#">Pages</p>
			</div>
			<form class="navbar-form navbar-right" role="form" action="./login.php" method="post">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Username" style="width:200px" name="name"></input>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Password" style="width:200px" name="password" ></input>
				</div>
				<button type="submit" class="btn btn-success">Login</button>
			</form>
			<div class="alert alert-danger navbar-right" role="alert" style="padding:1px">Username or Password is incorrect</div>
		</div>
	</nav>
	<!--Header end-->
	<div class="container">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
			<form>
			<fieldset style="border:1px solid black;padding:20px; border-radius:5px;padding-top:0px;background-color:#F2F2F2;opacity:0.9">
				<center><h1>Register</h1></center>
				<div class="form-group">
					<label for="FirstName">First Name</label>
					<input type="text" class="form-control" placeholder="First Name">
				</div>
				<div class="form-group">
					<label for="LastName">Last Name</label>
					<input type="text" class="form-control"  placeholder="Last Name">
				</div>
				<div class="form-group">
					<label for="UserName">Username</label>
					<input type="text" class="form-control"  placeholder="Username">
				</div>
				<div class="form-group">
					<label for="Email">Email</label>
					<input type="email" class="form-control"  placeholder="Email">
				</div>
				<div class="form-group">
					<label for="Password">Password</label>
					<input type="password" class="form-control"  placeholder="Password">
				</div>
				<div class="form-group">
					<label for="ConfirmPassword">Confirm Password</label>
					<input type="password" class="form-control"  placeholder="Confirm Password">
				</div>
				<center><button type="submit" class="btn btn-primary">Submit</button></center>
			</fieldset
			</form>
		</div>
    <?
	    //Todo: Add cleanup for the $_Post error messages
	    unset($_SESSION["err_name"]);
	    unset($_SESSION["err_password"]);
    ?>
</body>
</html>