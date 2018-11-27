<?php
// ajouter un logement avec les paramètres
$nameErr = $addressErr = $zipcodeErr = $surfaceErr = $countryErr = "";
$name = $address = $zipcode = $surface = $country = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // vérifier si le nom contient que des lettres et des espaces
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }
    
  if (empty($_POST["zipcode"])) {
    $zipcodeErr = "Zipcode is required";
  } else {
    $zipcode = test_input($_POST["zipcode"]);
  }

  if (empty($_POST["surface"])) {
    $surface = "Surface is required";
  } else {
    $surfaceErr = test_input($_POST["surface"]);
  }

  if (empty($_POST["country"])) {
    $countryErr = "Country is required";
  } else {
    $country = test_input($_POST["country"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  echo $data;
}

echo $name;
echo $address;
echo $zipcode;
echo $surface;
echo $country;

?>