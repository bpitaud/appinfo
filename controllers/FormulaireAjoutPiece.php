<?php
require_once("../Models/pieces.php");

session_start();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'])){
    $nom = test_input($_POST["nom"]);
    }
    if (isset($_POST['surface'])){
    $surface = test_input($_POST["surface"]);
    }
  
if (isset($_GET['selected']) && $_GET['selected'] != '') {
    $_SESSION['selected_logement'] = $_GET['selected'];
}

    $logementID = $_SESSION['selected_logement'];
    $pieceID = uniqid();
    ajoutPiece($pieceID, $nom,$surface,$logementID);
    header('Location: ../Liste pièces/listepieces.php?log='.$_SESSION['selected_logement']);
}

function RecupPieceController($logementID){
    return RecupPiece($logementID);
}
?>
