<?
    $servername = "127.0.0.1";
    $username = "pagesuser";
    $password = "password";

    $db_name="";
    $db_pass="";
    // Create connection
    $mysqli = new mysqli($servername, $username, $password,'ProjectPages');

    // Check connection
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
          if ($_POST['name'] && $_POST['password']) {
              $db_name=$_POST['name'];
              $db_pass=$_POST['password'];
          }

        $sql = "SELECT * FROM users where USER_NAME='$db_name' and PASSWORD='$db_pass'";
        if ($result = $mysqli->query($sql)) {
            //printf("Select returned %d rows.\n", $result->num_rows);
            if ($row=$result->fetch_assoc()) {
                echo "Welcome ".$row['FIRST_NAME'];
            }
            else {
                echo "Username / Password incorrect";
            }
            $result->close();
        }
      }
    $mysqli->close();
?>
