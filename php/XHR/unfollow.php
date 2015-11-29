<?
require("../constants.php");
require("../classes/UserClass.php");
session_start();
if (!(isset($_SESSION['user']))){
    die("403");
}
$user_id=$_SESSION['user']->user_id;
$servername = SERVERIP;
$username = USER;
$password = PASSWORD;
$database_name=DATABASE_NAME;
$other_id=$_GET["id"];
// Create connection
$mysqli = new mysqli($servername, $username, $password,$database_name);

// Check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$sql="delete from follows where user_id_follows=$user_id and user_id2=$other_id";
if ($mysqli->query($sql)) {
    die("true");
}
else{
    die($mysqli->error);
}
$mysqli->close();
?>
