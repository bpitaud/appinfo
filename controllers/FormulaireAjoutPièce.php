<?php
// define variables and set to empty values
$name = $surface = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $surface = test_input($_POST["surface"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// define variables and set to empty values
$nameErr = $surfaceErr = "";
$name = $surface = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["surface"])) {
    $surface = "Surface is required";
  } else {
    $surfaceErr = test_input($_POST["surface"]);
  }
}
?>