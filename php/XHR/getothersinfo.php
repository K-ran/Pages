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
    $sql="select first_name,last_name,gender,about_me,dob from users where user_id=$other_id";
    $output=array();
    if ($result = $mysqli->query($sql)) {
          if($row=$result->fetch_assoc()) {
              $output=$row;
              }
    }
    $sql="select user_id_follows,user_id2 from follows";
    if ($result = $mysqli->query($sql)) {
          if($row=$result->fetch_assoc()) {
              $output["follow"]="true";
          }
        else{
                  $output["follow"]="false";
         }
    }
    $mysqli->close();
    die(json_encode($output));
?>
