<?
    // This file fetched the stories to be displayed on the user's fetched.
    // This is a very primitive implementation of recommendation system using
    // Just mysql quries.

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
          $sql="select * from posts where not user_id=$user_id order by time desc LIMIT 100";
          if ($result = $mysqli->query($sql)) {
                while ($row=$result->fetch_assoc()) {
                    if(!in_array($row,$rowarray))
                        $rowarray[]=$row;
                    }
          }
          if(empty($rowarray)){
              $mysqli->close();
              die("NULL");
          }

          //Add Compelete name to the associative arrays
          $i=0;
          foreach ( $rowarray as $r){
              $ruid=$r["user_id"];
              $sql = "select first_name,last_name from users where user_id=$ruid";
              if ($result = $mysqli->query($sql)) {
                    if($row=$result->fetch_assoc()) {
                        $r['name']=$row['first_name'].' '.$row['last_name'];
                        }
              }
              $rowarray[$i++]=$r;
          }
          echo json_encode($rowarray);
      }
      $mysqli->close();
?>
