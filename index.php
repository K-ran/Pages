<html>
<head>
    <?
	//hi this is kartik
        require("./php/redirect_header.php");
        $err_username="";
        $err_password="";
    ?>
</head>
<body>
<form action=/php/login.php method="post">
    User Name: <input type="text" name="name"><br>
    <? echo isset($_POST["err_name"])? "This field is required" : "";?>
    Password: <input type="password" name="password"><br>
    <? echo isset($_POST["err_password"])? "This field is required" : "";?>
    <input type="submit">

    <?
    //Todo: Add cleanup for the $_Post error messages
    ?>
</form>
</body>
</html>
