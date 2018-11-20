<?php
// define variables and set to empty values
$name = $address = $zipcode = $surface = $country = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $address = test_input($_POST["address"]);
  $zipcode = test_input($_POST["zipcode"]);
  $surface = test_input($_POST["surface"]);
  $country = test_input($_POST["country"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>