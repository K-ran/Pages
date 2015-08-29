<html>
<head>
    <?
        session_start();
        if (isset($_SESSION['user'])){
            header("Location: ./home.php");
        }
    ?>
</head>
<body>
<form action=./login.php method="post">
    User Name: <input type="text" name="name"><br>
    <? echo isset($_SESSION["err_name"])? $_SESSION["err_name"]: "";?>
    Password: <input type="password" name="password"><br>
    <? echo isset($_SESSION["err_password"])? $_SESSION["err_password"] : "";?>
    <input type="submit">

    <?
    //Todo: Add cleanup for the $_Post error messages
    unset($_SESSION["err_name"]);
    unset($_SESSION["err_password"]);
    ?>
</form>
</body>
</html>
