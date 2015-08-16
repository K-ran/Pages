<html>
<head>
<?
    /*
     * This is the registration form, the actual php for this form is in the
     * /php/register.php that does all the verification and all.
     */
     require("./php/redirect_header.php");  //redirect id already logged in;
?>
</head>
<body>
<form action="./php/register.php" method="post">
    First Name: <input type="text" name="first_name"><br>
    <? echo isset($_POST["err_fname"])? "This field is required" : "";?>
    Last Name: <input type="text" name="last_name"><br>
    <? echo isset($_POST["err_lname"]) ? "This field is required" : ""; ?>
    User Name: <input type="text" name="user_name"><br>
    <? echo isset($_POST["err_uname"]) ? "This field is required" : "";?>
    Email: <input type="text" name="email"><br>
    <? echo isset($_POST["err_email"]) ? "This field is required" : "";?>
    Password: <input type="password" name="password"><br>
    <? echo isset($_POST["err_password"]) ? "This field is required" : "";?>
    Confirm Password: <input type="password"><br>
    <? echo isset($_POST["err_cnf_password"]) ? "This field is required" : "";?>
    <input type="submit">
    <?
    //Todo: Add cleanup for the $_Post error messages
    ?>
</form>

</body>
</html>
