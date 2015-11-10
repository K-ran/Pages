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
    $sql="insert into posts (topic,description,content,time,draft,user_id) values('$title','$description','$content',CURRENT_TIMESTAMP(),'$draft','$user_id')";
    if($mysqli->query($sql)){
        $sql="select post_id from posts where user_id=$user_id order by time desc LIMIT 1";
        $post_id=-1;
        if($mysqli->query($sql)){
            if ($result = $mysqli->query($sql)) {
                  while ($row=$result->fetch_assoc()){
                     $post_id=$row["post_id"];
                  }
              }
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
    }

    $mysqli->close();
    die("false");
?>
