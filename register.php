<?
    /*
    *   This file contains the php script for registration process
    */
    //require("./redirect_header.php");
    require("./php/functions/validations.php");
    require("./php/constants.php");
    session_start();
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

    //Check if method is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
          $user_name =initial_filter($_POST['user_name']);
          $first_name=initial_filter($_POST['first_name']);
          $last_name=initial_filter($_POST['last_name']);
          $password=initial_filter($_POST['password']);
          $cnf_password=initial_filter($_POST['confirm_password']);
          $email=initial_filter($_POST['email']);

          $error=false;
          if(empty($user_name)){
              $error=true;
              $_SESSION["err_uname"]=ERR_EMPTY_INPUT;
          }
          else if(!ctype_alnum($user_name)){
                $error=true;
                 $_SESSION["err_uname"]=ERR_ONLY_ALPHANUM;
          }

          if(empty($first_name)){
              $error=true;
              $_SESSION["err_fname"]=ERR_EMPTY_INPUT;
          }
          else if(!ctype_alpha($first_name)){
                $error=true;
                 $_SESSION["err_fname"]=ERR_ONLY_ALPHA;
          }

          if(empty($last_name)){
              $error=true;
              $_SESSION["err_lname"]=ERR_EMPTY_INPUT;
          }
          else if(!ctype_alpha($last_name)){
                $error=true;
                $_SESSION["err_lname"]=ERR_ONLY_ALPHA;
          }

          if(empty($email)){
              $error=true;
              $_SESSION["err_email"]=ERR_EMPTY_INPUT;
          }
          else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
              $error=true;
              $_SESSION["err_email"]="Invalid Email Address";
          }
          if(empty($password)){
              $error=true;
              $_SESSION["err_password"]=ERR_EMPTY_INPUT;
          }
          else if(!check_input($password)){
              $error=true;
              $_SESSION["err_password"]=ERR_SPECIAL_CHARACTER;
          }
          else if(strlen($password)<8){
              $error=true;
              $_SESSION["err_password"]=ERR_PASSWORD_SIZE;
          }

          if(strcmp($password,$cnf_password)!=0){
              $error=true;
              $_SESSION["err_cnf_password"]="password dint match";
          }


          if($error===true){
              header("Location: ./registration_form.php");
              die("boom");
          }
        $sql = "Insert into users (user_name,first_name,last_name,password,email) values
        (
            '$user_name',
            '$first_name',
            '$last_name',
            '$password',
            '$email'
        )";

        if ($mysqli->query($sql) == TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $mysq->error;
        }
      }
    $mysqli->close();

    //if session is set, re direst to homepage;
    //TODO: what happens after the login is successful.

?>
