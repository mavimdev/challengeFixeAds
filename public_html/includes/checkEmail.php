<?php
include "db_connect.php";

$email = "";

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = test_input($_GET["email"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Create connection
$conn = new mysqli('localhost', 'fixeads', 'mypass', 'challenge_fixeads');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email FROM registration WHERE email = '" . $email . "'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "EMAIL_IN_USE";
} else {
    echo "0 results";
}
$conn->close();

?>