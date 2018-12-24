<?php
require_once("../Models/database.php");
require_once("../Models/pieces.php");

session_start();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// ajouter une pièce 
$nom = $surface = $logementID = $pieceID ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'])){
    $nom = test_input($_POST["nom"]);
    }
    if (isset($_POST['surface'])){
    $surface = test_input($_POST["surface"]);
    }
    $logementID = $_SESSION['logementID'];
    $pieceID = uniqid();
    ajoutPiece($pieceID, $nom,$surface,$logementID);
    $resultat = RecupPiecebyID($pieceID);
    $_SESSION['pieceID'] = $resultat[0][0];
    header('Location: ../Liste pièces/listepieces.php?log='.$_SESSION['logementID']); 
}

function getPieceController($logementID){
    return getPiece($logementID);
}
?>
