<?php
require_once("../Models/database.php");
require_once("../Models/capteurs.php");

session_start();

$capteurs = array("lumiere", "camera", "humidite", "temperature");
$controleurs = array("chauffage");

$name = $capteurID = $type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = test_input($_POST["name"]);
    $type = test_input($_POST["type"]);
    if (in_array($type, $capteurs)){
      switch ($type){
        case "lumiere":
        $capteurID = test_input($_POST["number"]);
        $pieceID = $_SESSION['pieceID'];
        ajoutCapteur($nom, $capteurID, $type, $pieceID, 1);
        header('Location: ../Liste capteurs/listecapteurs.php');
        break;

        case "camera":
        $capteurID = test_input($_POST["number"]);
        $pieceID = $_SESSION['pieceID'];
        ajoutCapteur($nom, $capteurID, $type, $pieceID, 1);
        header('Location: ../Liste capteurs/listecapteurs.php');
        break;

        case "humidite":
        $capteurID = test_input($_POST["number"]);
        $pieceID = $_SESSION['pieceID'];
        ajoutCapteur($nom, $capteurID, $type, $pieceID, 1);
        header('Location: ../Liste capteurs/listecapteurs.php');
        break;

        case "temperature":
        $capteurID = test_input($_POST["number"]);
        $pieceID = $_SESSION['pieceID'];
        ajoutCapteur($nom, $capteurID, $type, $pieceID, 1);
        header('Location: ../Liste capteurs/listecapteurs.php');
        break;
      }
    } else {
      switch ($type){
        case "chauffage":
        $controleurID = test_input($_POST["number"]);
        $pieceID = $_SESSION['pieceID'];
        ajoutControleur($nom, $controleurID, $type, $pieceID, 1);
        header('Location: ../Liste capteurs/listecapteurs.php');
        break;
      }
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
