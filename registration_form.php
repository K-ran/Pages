<html>
<head>

<script src="./script/registeration.js" language="JavaScript" type="text/javascript" ></script>
<?
    session_start();
    /*
     * This is the registration form, the actual php for this form is in the
     * /register.php that does all the verification and all.
     */

?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
<body>
<form action="./register.php" method="post">
    First Name: <input type="text" name="first_name"><br>
    <? if(isset($_SESSION["err_fname"])) echo $_SESSION["err_fname"]; ?>
    Last Name: <input type="text" name="last_name"><br>
    <? if(isset($_SESSION["err_lname"])) echo $_SESSION["err_lname"]; ?>
    User Name: <input type="text" name="user_name" id="user_name" onblur="CheckMe(this)"><br>
    <div id="err_uname"><? if(isset($_SESSION["err_uname"])) echo $_SESSION["err_uname"]; ?></div>
    Email: <input type="text" name="email" id="email" onblur="CheckMe(this)"><br>
    <div id="err_email"><? if(isset($_SESSION["err_email"])) echo $_SESSION["err_email"]; ?></div>
    Password: <input type="password" name="password"><br>
    <? if(isset($_SESSION["err_password"])) echo $_SESSION["err_password"]; ?>
    Confirm Password: <input type="password" name="confirm_password"><br>
    <? if(isset($_SESSION["err_cnf_password"])) echo $_SESSION["err_cnf_password"]; ?>
    DOB: <input type="text" id="datepicker" name="dob"><br>
    <input type="radio" name="gender" value="female">Female<br>
    <input type="radio" name="gender" value="male" checked>Male<br>
    <div class="g-recaptcha" data-sitekey="6LerYQwTAAAAAPGtZvfGRFjslEdTz9L5a2SKQQ29"></div>
    <input type="submit">
    <?
    //Todo: Add cleanup for the $_Post error messages
    ?>
</form>

<?
    unset($_SESSION["err_uname"],
          $_SESSION["err_lname"],
          $_SESSION["err_fname"],
          $_SESSION["err_email"],
          $_SESSION["err_password"],
          $_SESSION["err_cnf_password"]);
?>
</body>
</html>
