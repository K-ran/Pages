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
    $tags_t=$_GET["tags"];
    $user_id=$_SESSION['user']->user_id;
    $draft=0;
    $post_id=$_GET["post_id"];
    if(isset($_GET["draft"])){
        $draft=1;
    }
    $tags=json_decode($tags_t);
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
    $tag_ids = array();
    // die($tags[0]->tag_id);
    for ($i=0; $i < count($tags) ; $i++) {
        if(!isset($tags[$i]->tag_id)){
            $name=$tags[$i]->name;
            $sql="insert into tags (name) values('$name')";
            if($mysqli->query($sql)){
                $sql="select tag_id from tags where name='$name'";
                if ($result = $mysqli->query($sql)) {
                      while ($row=$result->fetch_assoc()){
                         $tag_id[]=$row["name"];
                      }
                  }
            }
            else die($mysqli->error);
        }
        else $tag_ids[]=$tags[$i]->tag_id;
    }
    $sql="delete from posts_has_tags where post_id=$post_id";
    if($mysqli->query($sql)){

    }
    $sql="update posts set topic='$title',description='$description',content='$content',time=CURRENT_TIMESTAMP(),draft='$draft',user_id='$user_id' where post_id=$post_id";
    if($mysqli->query($sql)){

    }

        for ($i=0; $i < count($tags) ; $i++){
            $sql="insert into posts_has_tags values($post_id,$tag_ids[$i])";
            if($mysqli->query($sql)){
            }
            else {
                die("false");
            }
        }
        $mysqli->close();
        die("true");
?>
