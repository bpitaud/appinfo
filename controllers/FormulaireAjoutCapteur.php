<?php
require_once("../Models/database.php");
require_once("../Models/capteurs.php");
session_start();

$capteurs = array("lumiere", "camera", "humidite", "temperature");
$controleurs = array("chauffage");

$nom = $capteurID = $controleurID = $type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = test_input($_POST["nom"]);
    $type = test_input($_POST["type"]);
    if (isset($_GET['piece']) && $_GET['piece'] != '') {
      $_SESSION['selected_piece'] = $_GET['piece'];
      }
    if (in_array($type, $capteurs)){
      switch ($type){
        case "lumiere":
        $capteurID = test_input($_POST["number"]);
        $pieceID = $_SESSION['selected_piece'];
        $capteur_existe = Verif_capteur($capteurID);
        if (!$capteur_existe) {
        ajoutCapteur($nom, $capteurID, $type, $pieceID, 1);
        header('Location: ../Views/listecapteurs.php?piece='.$_SESSION['selected_piece']);
        } else {
        header('Location: ../Views/listecapteurs.php?capteur=existe');
        }
        break;

        case "camera":
        $capteurID = test_input($_POST["number"]);
        $pieceID = $_SESSION['selected_piece'];
        $capteur_existe = Verif_capteur($capteurID);
        if (!$capteur_existe) {
        ajoutCapteur($nom, $capteurID, $type, $pieceID, 1);
        header('Location: ../Views/listecapteurs.php?piece='.$_SESSION['selected_piece']);
        } else {
        header('Location: ../Views/listecapteurs.php?capteur=existe');
        }
        break;

        case "humidite":
        $capteurID = test_input($_POST["number"]);
        $pieceID = $_SESSION['selected_piece'];
        $capteur_existe = Verif_capteur($capteurID);
        if (!$capteur_existe) {
          ajoutCapteur($nom, $capteurID, $type, $pieceID, 1);
          header('Location: ../Views/listecapteurs.php?piece='.$_SESSION['selected_piece']);
          } else {
          header('Location: ../Views/listecapteurs.php?capteur=existe');
        }
        break;

        case "temperature":
        $capteurID = test_input($_POST["number"]);
        $pieceID = $_SESSION['selected_piece'];
        $capteur_existe = Verif_capteur($capteurID);
        if (!$capteur_existe) {
          ajoutCapteur($nom, $capteurID, $type, $pieceID, 1);
          header('Location: ../Views/listecapteurs.php?piece='.$_SESSION['selected_piece']);
          } else {
          header('Location: ../Views/listecapteurs.php?capteur=existe');
          }
        break;
      }
    } else {
      switch ($type){
        case "chauffage":
        $controleurID = test_input($_POST["number"]);
        $pieceID = $_SESSION['selected_piece'];
        $controleur_existe = Verif_controleur($controleurID);
        if (!$controleur_existe) {
        ajoutControleur($nom, $controleurID, $type, $pieceID, 1);
        header('Location: ../Views/listecapteurs.php?piece='.$_SESSION['selected_piece']);
        } else {
        header('Location: ../Views/listecapteurs.php?capteur=existe');
        }
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

function RecupCapteurControleur($id) {
  return RecupCapteur($id);
}

function RecupControleursController($id) {
  return RecupControleur($id);
}

?>
