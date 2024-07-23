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

$sql = "SELECT * FROM User WHERE Number=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $UserID);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "User found successfully";
    // Featch User Data
    while ($row = $result->fetch_assoc()) {
        $Featch_Number = $row["Number"];
    }
} else {
    echo "User could not be found";
}

function validate_input($str)
{
    $data = trim($str);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
