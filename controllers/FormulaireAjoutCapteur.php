<?php
// define variables and set to empty values
$nameErr = $numberErr = $typeErr = "" ;
$name = $number = $type = "";

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
  if (empty($_POST["type"])) {
    $typeErr = "type is required";
  } else {
    $type = test_input($_POST["type"]);
  }

  if (empty($_POST["number"])) {
    $numberErr = "number is required";
  } else {
    $number = test_input($_POST["number"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  echo $data;
}

echo $name;
echo $number;
echo $type;

?>