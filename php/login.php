<?
    //  This is the login page, all the from validation and verification takes
    //  place here.  Page loads when the user submits the ligin form form.

    require("./classes/UserClass.php");
    require("./redirect_header.php");  //redirect id already logged in;

    $servername = "127.0.0.1";
    $username = "pagesuser";
    $password = "password";

    // Create connection
    $mysqli = new mysqli($servername, $username, $password,'ProjectPages');

    // Check connection
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    //Check if method is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
          //retrive username and password
          if ($_POST['name'] && $_POST['password']) {
              $db_name=$_POST['name'];
              $db_pass=$_POST['password'];
          }

        //Checking from database if Username/Password pair exists.
        $sql = "SELECT * FROM users where user_name='$db_name' and password='$db_pass'";
        if ($result = $mysqli->query($sql)) {
            if ($row=$result->fetch_assoc()) {
                //start the session
                //make a session variable stiring a UserClass instance
                //with all the user information.
                session_start();
                $_SESSION['user']=new UserClass();
                $_SESSION['user']->load_info_from_db($row);
            }
            else {
                echo $row;
                echo "Username / Password incorrect";
            }
            $result->close();
        }
      }
    $mysqli->close();

    //if session is set, re direst to homepage;
    require("./redirect_header.php");
?>
