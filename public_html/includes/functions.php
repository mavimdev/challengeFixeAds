<?php
// define variables to hold data
$email = $confirmEmail = "";
$password = $confirmPassword = "";
$firstName = $lastName = "";
$address = $postalCode = $city = $country = "";
$nif = $telephone = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = "wrong answer";
    echo "<script type='text/javascript'>alert('$message');</script>";
    $email = test_input($_POST["email"]);
    $confirmEmail = test_input($_POST["confirmEmail"]);
    $password = test_input($_POST["password"]);
    $confirmPassword = test_input($_POST["confirmPassword"]);
    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $address = test_input($_POST["address"]);
    $postalCode = test_input($_POST["postalCode"]);
    $city = test_input($_POST["city"]);
    $nif = test_input($_POST["nif"]);
    $telephone = test_input($_POST["telephone"]);
    
    checkEmail($email);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function checkEmail($email) {
    
}










