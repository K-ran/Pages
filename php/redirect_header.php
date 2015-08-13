<?
//Code to redirect user when ever the user is already logged in;
session_start();
if ((isset($_SESSION['user']))) {
    header("Location: ../home.php");
    die();
}
else{
     if(!(strcmp(basename(__FILE__),"index.php")))
        header("Location: ../index.php");
}
?>
