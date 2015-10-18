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
      if ($row=$result->fetch_assoc())
          echo "true";  //true is already likes
      else echo "false"; // false is not liked before
    }
  $mysqli->close();
  //echo $_get
?>
