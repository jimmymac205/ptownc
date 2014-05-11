<?php
// define variables and set to empty values
$firstnameErr = $lastnameErr = $emailErr = $codeErr = $passErr = "";
$firstname = $lastname = $email = $code = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "First Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  
    if (empty($_POST["password"])) {
    $passErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
  
  if (empty($_POST["code"])) {
    $codeErr = "Code is required";
  } else {
    $code = test_input($_POST["code"]);
  }
