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
          $rowarray = array();
          $query=$_GET["query"];
          $sql="select * from tags where name like '%$query%' LIMIT 5";
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
