<?php
require_once("../Models/database.php");
require_once("../Models/capteurs.php");

session_start();
// define variables and set to empty values
$name = $number = $type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $type = test_input($_POST["type"]);
    $number = test_input($_POST["number"]);
    $pieceID = $_SESSION['pieceID'];
    ajoutCapteur($capteurID, $nom, $type, 'ON', $pieceID);
    $resultat = RecupCapteur($pieceID);
    $_SESSION['pieceID'] = $resultat[0][0];
    header('Location: ../Liste capteurs/listecapteurs.php');
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>