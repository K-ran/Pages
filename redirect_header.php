<?
    //Code to redirect user when ever the user is already logged in;
    if ((isset($_SESSION['user']))){
        if((strcmp(basename(__FILE__),"home.php"))){
            header("Location: ./home.php");
            die();
        }
    }
    else{
        if((strcmp(basename(__FILE__),"index.php")))
        {
            header("Location: ./index.php");
        }
    }
?>
