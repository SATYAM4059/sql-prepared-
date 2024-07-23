<?php
// Establishing a connection to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$UserID = validate_input(8858864059);
$sql = "INSERT INTO User (Number) VALUES (?)";
$result = mysqli_prepare($conn, $sql);
if ($result) {
    mysqli_stmt_bind_param($result, 's', $UserID);
    mysqli_stmt_execute($result);
    $responce = mysqli_stmt_affected_rows($result);
    if (!$responce < 1) {
        echo "Account Created Successful";
    } else {
        echo "Account cannot Created";
    }
} else {
    echo "Account cannot be created in due to a problem with your database";
}

function validate_input($str){
    $data = trim($str);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
