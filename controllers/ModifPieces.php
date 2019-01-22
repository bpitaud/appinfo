<?php 

session_start();
$langue = $_SESSION['language'];

require_once __DIR__.'/../Models/pieces.php';

function input_test($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function RecupPieceModif($pieceID){
  return RecupPiecebyID($pieceID);

}

$nom = $surface = "" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'])){
    $nom = input_test($_POST["nom"]);
    }
    if (isset($_POST['surface'])){
    $surface = input_test($_POST["surface"]);
    }
    if (isset($_GET['piece']) && $_GET['piece'] != '') {
      $_SESSION['selected_piece'] = $_GET['piece'];
      }
    
    $pieceID = $_SESSION['selected_piece'];
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
        if ($langue =='fr'){
          header("Location: ../Views/listepieces.php?modif=true");
        } else {
          header("Location: ../Views/english/listepieces.php?modif=true");
        } 
      } else {
        if ($langue =='fr'){
          header("Location: ../Views/listepieces.php?modif=false");
        } else {
          header("Location: ../Views/english/listepieces.php?modif=false");
        } 
      }
}

?>