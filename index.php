<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
	    <?
	        session_start();
	        if (isset($_SESSION['user'])){
	            header("Location: ./home.php");
	        }
		?>
		<!-- fevicon -->
		<link href="favicon.png" rel="icon" type="image/png" />
		<title>Welcome to Pages</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Include all the scripts here -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script src = "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<!-- function for datepicker -->
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
	<!-- Background image -->
	<body style="background-image:url('./resource/background1.jpg');background-size:cover">
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
				<button type="submit" class="btn btn-success">Login</button><br>
				<? if(isset($_SESSION["err_password"])) echo $_SESSION["err_password"]; ?>
			</form>

		</div>
	</nav>
	<!--Header end-->

	<!-- Registration form -->
	<div class="container">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4" ng-app="registrationApp">
			<form name="registrationForm" ng-controller="registrationController" action="./register.php" method="post" style="overflow:auto" novalidate>
			<fieldset style="border:1px solid black;padding:20px; border-radius:5px;padding-top:0px;background-color:#F2F2F2;opacity:0.9">
				<center><h1>Sign up</h1></center>
				<div class="form-group">
					<!-- First name input  -->
					<input ng-model="user.first_name"  type="text" class="form-control" placeholder="First Name" name="first_name" style="width:49%;display:inline" required pg-alphabet>
					<? if(isset($_SESSION["err_fname"])) echo $_SESSION["err_fname"]; ?>
					<!-- Last name input -->
					<input type="text" ng-model="user.last_name" class="form-control" placeholder="Last Name" name="last_name" style="width:49%;display:inline;float:right" required pg-alphabet>
					<? if(isset($_SESSION["err_lname"])) echo $_SESSION["err_lname"]; ?>

					<span ng-show="registrationForm.first_name.$touched ">
						<div class="error">
							<div ng-show="registrationForm.first_name.$error.required"> First name empty!   </div>
						</div>
						<div class="error">
							<div ng-show="registrationForm.first_name.$error.alphabet">Only alphabets allowed   </div>
						</div>
					</span>

					<span ng-show="registrationForm.last_name.$touched">
						<div class="error">
							<div ng-show="registrationForm.last_name.$error.required">Last name empty!   </div>
						</div>
						<div class="error">
							<div ng-show="registrationForm.last_name.$error.alphabet">Only alphabets allowed   </div>
						</div>
					</span>

				</div>
				<div class="form-group">
					<!-- User Name input  -->
					<input type="text" class="form-control" ng-model="user.user_name" placeholder="Username" name="user_name" id="user_name" pg-alphanumeric required pg-user-unique>
					<div id="err_uname"><? if(isset($_SESSION["err_uname"])) echo $_SESSION["err_uname"]; ?></div>
					<span ng-show="registrationForm.user_name.$touched ">
						<div class="error">
							<div ng-show="registrationForm.user_name.$error.required"> Username name empty!   </div>
						</div>
						<div class="error">
							<div ng-show="registrationForm.user_name.$error.alphanumeric">Only alphanumeric allowed   </div>
						</div>
						<div class="error">
							<div ng-show="registrationForm.user_name.$error.usernamevalid">User Name taken</div>
						</div>
						<div class="error">
							<div ng-show="registrationForm.user_name.$pending.usernamevalid">Checking user name</div>
						</div>
					</span>
				</div>
				<div class="form-group">
					<!-- Email input -->
					<input type="email" class="form-control"  placeholder="Email" ng-model="user.email" name="email" id="email" required pg-email-unique>
					<div id="err_email"><? if(isset($_SESSION["err_email"])) echo $_SESSION["err_email"]; ?></div>
					<span ng-show="registrationForm.email.$touched ">
						<div class="error">
							<div ng-show="registrationForm.email.$error.required"> Username name empty!   </div>
						</div>
						<div class="error">
							<div ng-show="registrationForm.email.$error.email">Invalid Email   </div>
						</div>
						<div class="error">
							<div ng-show="registrationForm.email.$error.emailvalid">Email already registered</div>
						</div>
						<div class="error">
							<div ng-show="registrationForm.email.$pending.emailvalid">Checking available email</div>
						</div>
					</span>
				</div>
				<div class="form-group">
					<!-- Password input -->
					<input type="password" class="form-control"  placeholder="Password" name="password" ng-model="user.password" ng-minlength="9" required>
					<span ng-show="registrationForm.password.$touched ">
						<div class="error">
							<div ng-show="registrationForm.password.$error.required"> Password empty? </div>
						</div>
						<div class="error">
							<div ng-show="registrationForm.password.$error.minlength">Minimum 9 characters required </div>
						</div>
					</span>
				</div>
				<div class="form-group">
					<!-- Confirm Password input -->
					<input type="password" class="form-control" ng-model="user.confirm_password" placeholder="Confirm Password" name="confirm_password" required pg-password-confirm="{{user.password}}">
					<? if(isset($_SESSION["err_cnf_password"])) echo $_SESSION["err_cnf_password"]; ?>
					<span ng-show="registrationForm.confirm_password.$touched ">
						<div class="error">
							<div ng-show="registrationForm.confirm_password.$error.required"> Required </div>
						</div>
						<div class="error">
							<div ng-show="registrationForm.confirm_password.$error.passwordconfirm">Password do not match</div>
						</div>
					</span>
				</div>
				<div class="form-group">
					<!-- Date Picker/Date input -->
					<input type="text" class="form-control" placeholder="DOB" id="datepicker" name="dob" >
				</div>
				<div class="form-group">
					<!-- Gender Input -->
					<input type="radio" name="gender" value="male" checked> Male
					<br>
					<input type="radio" name="gender" value="female"> Female
				</div>
				<!-- Google Recaptche input -->
				<div class="form-group">
					<div class="g-recaptcha" data-sitekey="6LerYQwTAAAAAPGtZvfGRFjslEdTz9L5a2SKQQ29" style="transform:scale(0.8);"></div>
				</div>
				<!-- Submit Button -->
				<center><button type="submit" ng-disabled="registrationForm.$invalid	" class="btn btn-danger">Submit</button></center>
			</fieldset
			</form>
		</div>
	<!-- adding angular files -->
	<script src="./script/angularApps.js"></script>
	<script src="./script/angularControllers.js"></script>
	<script src="./script/angularDirectives.js"></script>
	<script src="./script/angularServices.js"></script>
	<!-- adding angular files -->
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
