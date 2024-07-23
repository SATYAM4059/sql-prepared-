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

$ID = validate_input(10);
$Name = validate_input("SATYAM KUMAR");


$sql = "UPDATE User SET Name=? WHERE ID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $Name , $ID);
$stmt->execute();
$mysqli_affected_rows = mysqli_affected_rows($conn);
if ($mysqli_affected_rows > 0) {
    echo "We updated the record successfully";
} else {
    echo "We could not update the record successfully";
}

function validate_input($str){
    $data = trim($str);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
