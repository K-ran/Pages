<?
    require("./php/classes/UserClass.php");
    session_start();
    if (!(isset($_SESSION['user']))){
        header("Location: ./index.php");
    }
    //contains the home pages of the website after successful login
    echo "Welcome ".$_SESSION['user']->first_name;
    echo $_SESSION['user']->about_me;
?>
