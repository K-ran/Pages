<?
    require("../constants.php");
    require("../classes/UserClass.php");
    session_start();
    if (!(isset($_SESSION['user']))){
      //Kill the page if some idot tries to prank with us.
        die("403");
    }
    $post_id = $_GET["post_id"];
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
    $sql="select * from likes where user_id='$user_id' and post_id='$post_id'";
      if ($result = $mysqli->query($sql)){
        if ($row=$result->fetch_assoc()){
            $sql2="delete from likes where user_id='$user_id' and post_id='$post_id'";
            if($mysqli->query($sql2)){
                $mysqli->close();
                die("true");
            }
            else{
                $mysqli->close();
                die("false");
            }
        }
        else {
            $sql2="insert into likes values($user_id,$post_id,CURRENT_TIMESTAMP())";
            if($mysqli->query($sql2)){
                $mysqli->close();
                die("true");
            }
            else{
                $mysqli->close();
                die("false");
            }
        }
      }
    $mysqli->close();
    die("false");
    //echo $_get
?>
