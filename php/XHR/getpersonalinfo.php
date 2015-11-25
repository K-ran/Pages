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
    $info = array();
    // Check connection
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $sql="select * from users where user_id=$user_id";
        if ($result = $mysqli->query($sql)) {
              $row=$result->fetch_assoc();
              $info['first_name']=$row['first_name'];
              $info['last_name']=$row['last_name'];
              $info['gender']=$row['gender'];
              $info['dob']=$row['dob'];
              $info['about_me']=$row['about_me'];
        }
        echo json_encode($info);
    }
    $mysqli->close();
?>
