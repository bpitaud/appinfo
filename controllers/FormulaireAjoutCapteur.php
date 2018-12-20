<?php
require_once("../Models/database.php");
require_once("../Models/capteurs.php");

session_start();
// define variables and set to empty values
$name = $capteurID = $type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = test_input($_POST["name"]);
    $type = test_input($_POST["type"]);
    $capteurID = test_input($_POST["number"]);
    $pieceID = $_SESSION['pieceID'];
    ajoutCapteur($nom, $capteurID, $type, $pieceID, 1);
    header('Location: ../Liste capteurs/listecapteurs.php');
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>