<?
    require("../constants.php");
    require("../classes/UserClass.php");
    require("../functions/validations.php");
    session_start();
    if (!(isset($_SESSION['user']))){
        die("403");
    }
    $post=json_decode(file_get_contents('php://input'), true);
    $user_id=$_SESSION['user']->user_id;
    $servername = SERVERIP;
    $username = USER;
    $password = PASSWORD;
    $database_name=DATABASE_NAME;
    // Create connection
    $mysqli = new mysqli($servername, $username, $password,$database_name);

    $oldpass="";
    $newpass="";
    if ($post['oldpassword'] && $post['newpassword']) {
        $oldpass=$post['oldpassword'];
        $newpass=$post['newpassword'];
    }
    $oldpass=initial_filter($oldpass);
    $newpass=initial_filter($newpass);
    if(strlen($newpass)<8){
        die("error new pass length".$newpass);
    }
    // Check connection
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $sql = "SELECT * FROM users where user_id=$user_id";
    if ($result = $mysqli->query($sql)) {
            $row=$result->fetch_assoc();
            $salt=$row["salt"];
            $password=crypt($oldpass,$salt);
            if($password==$row["password"]){
                $salt=crypt("salt");
                $password=crypt($newpass,$salt);
                $sql="update users set password='$password',salt='$salt' where user_id=$user_id";
                if ($mysqli->query($sql) == TRUE) {
                    die("true");
                } else {
                    die($mysqli->error);
                }
            }
            else {
                die("false");
            }
    }
$mysqli->close();

?>
