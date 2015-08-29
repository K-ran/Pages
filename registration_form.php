<html>
<head>
<?
    session_start();
    /*
     * This is the registration form, the actual php for this form is in the
     * /register.php that does all the verification and all.
     */

?>
</head>
<body>
<form action="./register.php" method="post">
    First Name: <input type="text" name="first_name"><br>
    <? if(isset($_SESSION["err_fname"])) echo $_SESSION["err_fname"]; ?>
    Last Name: <input type="text" name="last_name"><br>
    <? if(isset($_SESSION["err_lname"])) echo $_SESSION["err_lname"]; ?>
    User Name: <input type="text" name="user_name"><br>
    <? if(isset($_SESSION["err_uname"])) echo $_SESSION["err_uname"]; ?>
    Email: <input type="text" name="email"><br>
    <? if(isset($_SESSION["err_email"])) echo $_SESSION["err_email"]; ?>
    Password: <input type="password" name="password"><br>
    <? if(isset($_SESSION["err_password"])) echo $_SESSION["err_password"]; ?>
    Confirm Password: <input type="password" name="confirm_password"><br>
    <? if(isset($_SESSION["err_cnf_password"])) echo $_SESSION["err_cnf_password"]; ?>
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
