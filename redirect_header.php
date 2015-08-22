<?
    //Code to redirect user when ever the user is already logged in;
    if ((isset($_SESSION['user']))){
            header("Location: ./home.php");
            die();
    }
    else{
            header("Location: ./index.php");
            die("boom");
    }
?>
