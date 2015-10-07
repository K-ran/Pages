<?
    require("./constants.php");
    $post=json_decode(file_get_contents('php://input'), true);
    //Kill the connection if some idot tries to prank with us.
    if(isset($post["user_name"]))
        if(!ctype_alnum($post["user_name"])){
            die("you idot");
        }
    if(isset($post["email"]))
        if(filter_var(($post["email"]), FILTER_VALIDATE_EMAIL) === false){
            die("you idot");
        }
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
    if(isset($post["user_name"])){
        $user_name=$post["user_name"];
        //Checking from database if Username/Password pair exists.
        $sql = "SELECT user_name FROM users where user_name='$user_name'";
        if ($result = $mysqli->query($sql)) {
            if ($row=$result->fetch_assoc()) {
                echo "false";
            }
            else
                echo "true";
        }
    }
    else if(isset($post["email"])){
        $email=$post["email"];
        //Checking from database if Username/Password pair exists.
        $sql = "SELECT email FROM users where email='$email'";
        if ($result = $mysqli->query($sql)) {
            if ($row=$result->fetch_assoc()) {
                echo "false";
            }
            else
                echo "true";
        }
    }
    $mysqli->close();


?>
