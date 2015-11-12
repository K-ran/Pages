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
    if ($_SERVER["REQUEST_METHOD"] == "GET")
      {
          $post_id=$_GET["post_id"];
          $rowarray = array();
          $sql="select * from tags where tag_id in (select tag_id from posts_has_tags where post_id=$post_id)";
          if ($result = $mysqli->query($sql)) {
                while ($row=$result->fetch_assoc()) {
                    if(!in_array($row,$rowarray))
                        $rowarray[]=$row;
                    }
          }
          die(json_encode($rowarray));
      }
    $mysqli->close();
?>
