<?php
// ajouter un logement avec les paramètres
$nomErr = $adresseErr = $codepostaleErr = $surfaceErr = $paysErr = $utilisateurIDErr = "";
$nom = $adresse = $codepostale = $surface = $pays = $utilisateurID = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nom"])) {
    $nomErr = "Name is required";
  } else {
    $nom = test_input($_POST["nom"]);
    // vérifier si le nom contient que des lettres et des espaces
    if (!preg_match("/^[a-zA-Z ]*$/",$nom)) {
      $nomErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["adresse"])) {
    $adresseErr = "Address is required";
  } else {
    $adresse = test_input($_POST["adresse"]);
  }
    
  if (empty($_POST["codepostale"])) {
    $codepostaleErr = "Zipcode is required";
  } else {
    $codepostale = test_input($_POST["codepostale"]);
  }

  if (empty($_POST["surface"])) {
    $surface = "Surface is required";
  } else {
    $surfaceErr = test_input($_POST["surface"]);
  }

  if (empty($_POST["pays"])) {
    $paysErr = "Country is required";
  } else {
    $pays = test_input($_POST["pays"]);
  }

  if (empty($_SESSION["utilisateurID"])) {
    $utilisateurIDErr = "utilisateur ID is required";
  } else {
    $utilisateurID = test_input($_SESSION['utilisateurID']);
  }
}

$db = connect();
echo $db -> query('SELECT * FROM logement WHERE nom =$nom');


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  echo $data;
}

?>