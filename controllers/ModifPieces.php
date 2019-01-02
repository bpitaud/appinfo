<?php 

session_start();

require_once('../Models/pieces.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nom = $surface = "" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'])){
    $nom = test_input($_POST["nom"]);
    }
    if (isset($_POST['surface'])){
    $genre = test_input($_POST["surface"]);
    }
    
    $pieceID = $_SESSION['pieceID'];
    $piece = RecupPiecebyID($pieceID);
    $modif = false;

    if (isset($nom)&& trim($nom)!=""){
        $change = ModifNomPiece($pieceID,$nom);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($surface) && trim($surface)!=""){
        $change = ModifSurfacePiece($pieceID,$surface);
        if (!($change == 1)) {
          $modif = true;
        }
      }

  if ($modif == true) {
    header("Location: ../Liste pièces/listepieces.php?modif=true");
  } else {
    header("Location: ../Liste pièces/listepieces.php?modif=false");
  }
}

?>