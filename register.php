<?
    /*
    *   This file contains the php script for registration process
    */
    require("./redirect_header.php");
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
          $user_name =$_POST['user_name'];
          $first_name=$_POST['first_name'];
          $last_name=$_POST['last_name'];
          $password=$_POST['password'];
          $email=$_POST['email'];

        $sql = "Insert into users (user_name,first_name,last_name,password,email) values
        (
            '$user_name',
            '$first_name',
            '$last_name',
            '$password',
            '$email'
        );";

        if ($mysqli->query($sql) == TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $mysq->error;
        }
      }
    $mysqli->close();

    //if session is set, re direst to homepage;
    require("./redirect_header.php");

?>
