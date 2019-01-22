<?php
require_once __DIR__.'/../Models/pieces.php';
require_once __DIR__ .'/../Models/logements.php';


session_start();

$langue = $_SESSION['language'];

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
    if ($langue =='fr'){
        header('Location: ../Views/listepieces.php?log='.$_SESSION['selected_logement']);
    } else {
        header('Location: ../Views/english/listepieces.php?log='.$_SESSION['selected_logement']);
    }
}

function RecupPieceController($logementID){
    return RecupPiece($logementID);
}

function LogementID($logementID){
    return RecupLogementsbyID($logementID);
}

function RecupPieceID($pieceID){
return RecupPiecebyID($pieceID);
}
?>
