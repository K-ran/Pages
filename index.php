<html>
	<head>
	    <?
	        session_start();
	        if (isset($_SESSION['user'])){
	            header("Location: ./home.php");
	        }
		?>
		<title>Welcome to Pages</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="./script/registeration.js" language="JavaScript" type="text/javascript" ></script>
		<script>
				$(function() {
				  $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd',
				                                minDate:'-120y',maxDate:0,
				                                changeMonth: true,
				                                changeYear: true,
				                                yearRange: '-120:+0'
				                                });
				});
		</script>
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

		</div>
	</nav>
	<!--Header end-->
	<div class="container">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
			<form action="./register.php" method="post" style="overflow:auto">
			<fieldset style="border:1px solid black;padding:20px; border-radius:5px;padding-top:0px;background-color:#F2F2F2;opacity:0.9">
				<center><h1>Sign up</h1></center>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="First Name" name="first_name" style="width:49%;display:inline">
					<? if(isset($_SESSION["err_fname"])) echo $_SESSION["err_fname"]; ?>
					<input type="text" class="form-control" placeholder="Last Name" name="last_name" style="width:49%;display:inline;float:right">
					<? if(isset($_SESSION["err_lname"])) echo $_SESSION["err_lname"]; ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control"  placeholder="Username" name="user_name" onblur="CheckMe(this)" id="user_name">
					<div id="err_uname"><? if(isset($_SESSION["err_uname"])) echo $_SESSION["err_uname"]; ?></div>
				</div>
				<div class="form-group">
					<input type="email" class="form-control"  placeholder="Email" name="email" onblur="CheckMe(this)" id="email">
					<div id="err_email"><? if(isset($_SESSION["err_email"])) echo $_SESSION["err_email"]; ?></div>
				</div>
				<div class="form-group">
					<input type="password" class="form-control"  placeholder="Password" name="password">
					<? if(isset($_SESSION["err_password"])) echo $_SESSION["err_password"]; ?>
				</div>
				<div class="form-group">
					<input type="password" class="form-control"  placeholder="Confirm Password" name="confirm_password">
					<? if(isset($_SESSION["err_cnf_password"])) echo $_SESSION["err_cnf_password"]; ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="DOB" id="datepicker" name="dob" >
				</div>
				<div class="form-group">
					<input type="radio" name="gender" value="male" checked> Male
					<br>
					<input type="radio" name="gender" value="female"> Female
				</div>
				<div class="form-group">
					<div class="g-recaptcha" data-sitekey="6LerYQwTAAAAAPGtZvfGRFjslEdTz9L5a2SKQQ29"></div>
				</div>
				<center><button type="submit" class="btn btn-danger">Submit</button></center>
			</fieldset
			</form>
		</div>
    <?
	    //Todo: Add cleanup for the $_Post error messages
	    unset($_SESSION["err_name"]);
	    unset($_SESSION["err_password"]);
		unset($_SESSION["err_uname"],
			$_SESSION["err_lname"],
			$_SESSION["err_fname"],
			$_SESSION["err_email"],
			$_SESSION["err_password"],
			$_SESSION["err_cnf_password"]);
    ?>
</body>
</html>
