<?php 

include 'config.php';

if (!empty($_POST['loginEmail']) && !empty($_POST['loginPassword'])) {

    $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
    
    if ($conn === null) {
        echo "Connection failed: impossible to find DBMS";
    } else if ($conn && $conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    }
    
    $login_email = $_POST['loginEmail'];
    $login_pw = $_POST['loginPassword'];

    $sql = "SELECT `email` FROM users_data WHERE `email` = ('$login_email') AND `password` = ('$login_pw')";
    
    $result = $conn->query($sql);

    // $stmt = $conn->prepare("SELECT * FROM users_data WHERE email = (?) AND password = (?)");
    // $stmt->bind_param("ss", $email, $pw);
    // $email = $_POST['email'];
    // $pw = $_POST['password'];
    // $stmt->execute();

    // $result = $conn->query($stmt);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo "OK";
      } else {
        echo "0 results";
      }
    
    $conn->close();

} 


?>