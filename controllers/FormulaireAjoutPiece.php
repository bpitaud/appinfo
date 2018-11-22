<?php
// define variables and set to empty values
$nameErr =  $surfaceErr = "";
$name = $surface = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["surface"])) {
    $surface = "Surface is required";
  } else {
    $surfaceErr = test_input($_POST["surface"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  echo $data;
}

echo $name;
echo $surface;

?>