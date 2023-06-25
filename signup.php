<?php 

include 'config.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
    
    if ($conn === null) {
        echo "Connection failed: impossible to find DBMS";
    } else if ($conn && $conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    }
    
    $email = $_POST['email'];
    $pw = $_POST['password'];
    
    // $stmt = $conn->prepare("INSERT INTO users_data (email, password) VALUES (?, ?)");
    // $stmt->bind_param("ss", $email, $pw);
    // $email = $_POST['email'];
    // $pw = $_POST['password'];
    // $stmt->execute();

    $sql = "INSERT INTO users_data (email, password) VALUES ('$email', '$pw');";

    try {
        $result = $conn->query($sql);
        echo json_encode(true);
    } catch (Exception $e) {
        echo json_encode(false);
    }
    
    
    $conn->close();

}

?>