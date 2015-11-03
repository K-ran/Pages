<?
    require("../constants.php");
    require("../classes/UserClass.php");
    session_start();
    if (!(isset($_SESSION['user']))){
      //Kill the page if some idot tries to prank with us.
        die("403");
    }
    $title=$_GET["title"];
    $description=$_GET["description"];
    $content=$_GET["content"];
    // $tags_temp=$_GET["tags"];
    $user_id=$_SESSION['user']->user_id;
    $draft=0;
    if(isset($_GET["draft"])){
        $draft=1;
    }
    //$tags=explode(",",$tags);
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

    $sql="insert into posts (topic,description,content,time,draft,user_id) values('$title','$description','$content',CURRENT_TIMESTAMP(),'$draft','$user_id')";
    if($mysqli->query($sql)){
        $mysqli->close();
        die("true");
    }

    $mysqli->close();
    die("false");
?>
