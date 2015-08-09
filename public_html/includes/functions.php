<?php

include "db_connect.php";

// define variable to hold data
$data = new stdClass();
$data->email = "";
$data->password = "";
$data->firstName = $data->lastName = "";
$data->address = $data->postalCode = $data->city = $data->country = "";
$data->nif = $data->telephone = "";

// variavel to hold the success of the registration
$success = true;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $data->email = test_input($_POST["email"]);
    $data->confirmEmail = test_input($_POST["confirmEmail"]);
    $data->password = md5($_POST["password"]);
    $data->firstName = test_input($_POST["firstName"]);
    $data->lastName = test_input($_POST["lastName"]);
    $data->address = test_input($_POST["address"]);
    $data->postalCode = test_input($_POST["postalCode"]);
    $data->city = test_input($_POST["city"]);
    $data->country = test_input($_POST["country"]);
    $data->nif = test_input($_POST["nif"]);
    $data->telephone = test_input($_POST["telephone"]);

    createConnection();
    insertData($data);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function insertData($data) {
    global $conn, $success;

    $sql = "INSERT INTO registration (
    email,
    password,
    first_name,
    last_name,
    address,
    postcode,
    city,
    country,
    nif,
    telephone
    ) VALUES (
    '" . $data->email . "',
    '" . $data->password . "',
    '" . $data->firstName . "',
    '" . $data->lastName . "',
    '" . $data->address . "',
    '" . $data->postalCode . "',
    '" . $data->city . "',
    '" . $data->country . "',
    '" . $data->nif . "',
    '" . $data->telephone . "'
    )";

    if ($conn && $conn->query($sql) === TRUE) {
        $success = true;
        header('Location: templates/success.php');
    } else {
        $success = false;
    }

    $conn->close();
}

function createConnection() {
    global $username, $password, $servername, $bdname;
    global $conn;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $bdname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}


?>








