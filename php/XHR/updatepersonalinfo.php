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
    // Create connection
    $mysqli = new mysqli($servername, $username, $password,$database_name);

    // Check connection
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $first_name=$_GET['first_name'];
        $last_name=$_GET['last_name'];
        $about_me = $_GET['about_me'];
        $dob=$_GET['dob'];
        $gender=$_GET['gender'];
        $sql="update users set first_name='$first_name',last_name='$last_name',about_me='$about_me',dob='$dob',gender='$gender' where user_id=$user_id";
        if($mysqli->query($sql)){
            $mysqli->close();
            die("true".$user_id);
        }
        else {
            // die($dob);
            die($mysqli->error);
        }
    }
    $mysqli->close();
?>
