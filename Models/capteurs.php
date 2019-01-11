<?php
 
 require_once("../Models/database.php");
 
 function getControleurName($pieceID) {
    $listCapteur = array();
    $sql =  'SELECT nom FROM controleur WHERE pieceID ='.$pieceID.'';
    foreach  (connect()->query($sql) as $row) {
        array_push($listCapteur, $row['nom']);
    }
    //print_r  ($listLogement);
    return $listCapteur;
  }
  function getCapteurName($pieceID) {
    $listCapteur = array();
    $sql2 =  'SELECT nom FROM capteur WHERE pieceID ='.$pieceID.'';
    foreach  (connect()->query($sql2) as $row) {
      array_push($listCapteur, $row['nom']);
    }
    //print_r  ($listLogement);
    return $listCapteur;
  }
  // Type de capteur dans la base de donnée en int => menu déroulant pour savoir le type => numéro selon l'option choisi 
  
  function getControleurID($pieceID) {
    $listCapteur = array();
    $sql =  'SELECT controleurID FROM controleur WHERE pieceID ='.$pieceID.'';
    foreach  (connect()->query($sql) as $row) {
        array_push($listCapteur, $row['controleurID']);
    }
    //print_r  ($listLogement);
    return $listCapteur;
  }
  //$listID = getCapteurID($_SESSION["pieceID"]);
  //print_r ($listID);
  
  function getCapteurID($pieceID) {
    $listCapteur = array();
    $sql2 =  'SELECT capteurID FROM capteur WHERE pieceID ='.$pieceID.'';
    foreach  (connect()->query($sql2) as $row) {
      array_push($listCapteur, $row['capteurID']);
    }
    //print_r  ($listLogement);
    return $listCapteur;
  }
  
  function getControleurType($capteurID) {
    $capteurType = array();
    $sql =  'SELECT `typ` FROM controleur WHERE controleurID ='.$capteurID.'';
    foreach  (connect()->query($sql) as $row) {
        array_push($capteurType, $row['typ']);
    }
    return $capteurType[0];
  }
  
  function getCapteurType($capteurID) {
    $capteurType = array();
    $sql =  'SELECT `typ` FROM capteur WHERE capteurID ='.$capteurID.'';
    foreach  (connect()->query($sql) as $row) {
        array_push($capteurType, $row['typ']);
    }
    return $capteurType[0];
  }
  
  function getCapteurEtat ($capteurID) {
    $capteurEtat = array();
    $sql =  'SELECT etat FROM capteur WHERE capteurID ='.$capteurID.'';
    foreach  (connect()->query($sql) as $row) {
        array_push($capteurEtat, $row['etat']);
    }
    return $capteurEtat[0];
  }
  
  function getControleurEtat ($capteurID) {
    $capteurEtat = array();
    $sql =  'SELECT etat FROM controleur WHERE controleurID ='.$capteurID.'';
    foreach  (connect()->query($sql) as $row) {
        array_push($capteurEtat, $row['etat']);
    }
    return $capteurEtat[0];
  }







  


 // Ajouter un capteur
 function ajoutCapteur( $nom, $capteurID, $type, $pieceID, $etat){
     $reponse = connect() -> prepare("INSERT INTO capteur(nom, capteurID, typ, pieceID, etat) VALUES (:nom, :capteurID, :typ, :pieceID, :etat)");
     $reponse->execute(array(
         'nom' => $nom,
         'capteurID' => $capteurID,
         'typ' => $type,
         'pieceID' => $pieceID,
         'etat' => $etat,
         ));
     }

// récupérer les données de tous les capteurs 
function RecupAllCapteurs(){
    $conn = connect() -> prepare('SELECT * FROM capteur');
    $conn -> execute();
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// récupérer les données des capteurs dans une pièce
function RecupCapteur($pieceID){
    $conn = connect() -> prepare('SELECT * FROM capteur WHERE pieceID =?');
    $conn -> execute(array($pieceID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// récupérer un capteur par son ID

function RecupCapteurbyID($capteurID){
    $conn = connect() -> prepare('SELECT * FROM capteur WHERE capteurID =?');
    $conn -> execute(array($capteurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// récupérer l'état d'un capteur 
function RecupEtatCapteur($capteurID, $etat){
    $conn = connect() -> prepare('SELECT etat FROM capteur WHERE capteurID =?');
    $conn -> execute(array($capteurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// modifier l'état d'un capteur 
function ModifEtatCapteur($capteurID, $etat){
    $conn = connect() -> prepare('UPDATE capteur SET etat=:etat WHERE capteurID =:capteurID');
    $conn -> execute(array(
            'etat' => $etat,
            'capteurID'=> $capteurID,    
        ));

}
// modifier le nom d'un capteur 
function ModifNomCapteur($capteurID,$nom){
    $conn = connect() -> prepare('UPDATE capteur SET nom=:nom WHERE capteurID =:capteurID');
    $conn -> execute(array(
            'nom' => $nom,
            'capteurID'=> $capteurID,    
        ));
}

//supprimer un capteur
function SuppCapteur($capteurID){
    $conn = connect() -> prepare('DELETE * FROM capteur WHERE capteurID =:capteurID');
    $conn -> execute(array($capteurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// ajouter un controleur 
function ajoutControleur( $nom, $controleurID, $type, $pieceID, $etat){
    $reponse = connect() -> prepare("INSERT INTO controleur(nom, controleurID, typ, pieceID, etat) VALUES (:nom, :controleurID, :typ, :pieceID, :etat)");
    $reponse->execute(array(
        'nom' => $nom,
        'controleurID' => $controleurID,
        'typ' => $type,
        'pieceID' => $pieceID,
        'etat' => $etat,
        ));
    }

// récupérer les données de tous les controleurs
function RecupAllControleurs(){
    $conn = connect() -> prepare('SELECT * FROM controleur');
    $conn -> execute();
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// récupérer les données des controleurs dans une pièce 
function RecupControleur($pieceID){
    $conn = connect() -> prepare('SELECT * FROM controleur WHERE pieceID =?');
    $conn -> execute(array($pieceID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// récupérer un controleur par son ID 

function RecupControleurbyID($controleurID){
    $conn = connect() -> prepare('SELECT * FROM controleur WHERE controleurID =?');
    $conn -> execute(array($controleurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// récupérer l'état d'un controleur
function RecupEtatControleur($controleurID, $etat){
    $conn = connect() -> prepare('SELECT etat FROM controleur WHERE controleurID =?');
    $conn -> execute(array($controleurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// modifier l'état d'un controleur 
function ModifEtatControleur($controleurID, $etat){
    $conn = connect() -> prepare('UPDATE controleur SET etat=:etat WHERE controleurID =:controleurID');
    $conn -> execute(array(
            'etat' => $etat,
            'controleurID'=> $controleurID,    
        ));
}
// modifier le nom d'un controleur
function ModifNomControleur($controleurID,$nom){
    $conn = connect() -> prepare('UPDATE controleur SET nom=:nom WHERE controleurID =:controleurID');
    $conn -> execute(array(
            'nom' => $nom,
            'controleurID'=> $controleurID,    
        ));
}

//supprimer un controleur
function SuppControleur($controleurID){
    $conn = connect() -> prepare('DELETE * FROM controleur WHERE controleurID =:controleurID');
    $conn -> execute(array($controleurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

?>

