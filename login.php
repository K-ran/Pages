<?
    //  This is the login page, all the from validation and verification takes
    //  place here.  Page loads when the user submits the ligin form form.
    session_start();
    require("./php/classes/UserClass.php");
    require("./php/functions/validations.php");
    require("./php/constants.php");
    //redirect id already logged in;

    $servername = SERVERIP;
    $username = USER;
    $password = PASSWORD;

    // Create connection
    $mysqli = new mysqli($servername, $username, $password,'ProjectPages');

    // Check connection
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $db_name="";
    $db_pass="";
    //Check if method is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
          //retrive username and password
          if ($_POST['name'] && $_POST['password']) {
              $db_name=$_POST['name'];
              $db_pass=$_POST['password'];
          }
          $db_name=initial_filter($db_name);
          $db_pass=initial_filter($db_pass);

          echo check_input($db_name);

          if(!check_input($db_name)){
              $_SESSION["err_name"]="No special chracters allowed";
              header("Location: ./index.php");
              die("special character");
          }
          //Checking from database if Username/Password pair exists.
          $sql = "SELECT * FROM users where user_name='$db_name' and password='$db_pass'";
          if ($result = $mysqli->query($sql)) {
              if ($row=$result->fetch_assoc()) {
                  //start the session
                  //make a session variable stiring a UserClass instance
                  //with all the user information.
                  $_SESSION['user']=new UserClass();
                  $_SESSION['user']->load_info_from_db($row);
              }
              else {
                  $_SESSION["err_password"]="Username/password pair don't match";
                  header("Location: ./index.php");
                  die("password/username incorect");
              }
              $result->close();
          }
    }
    $mysqli->close();
    require("./redirect_header.php");
?>
