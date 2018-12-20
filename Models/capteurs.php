<?php
 
 require_once("../Models/database.php");
 
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

// récupérer l'état d'un capteur 
function RecupEtatCapteur($capteurID, $etat){
    $conn = connect() -> prepare('SELECT etat FROM capteur WHERE capteurID =?');
    $conn -> execute(array($capteurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// modifier l'état d'un capteur 
function ModifEtatCapteur($capteurID, $etat){
    $conn = connect() -> prepare('UPDATE capteur SET etat=? WHERE capteurID =?');
    $conn -> execute(array(
            'etat' => $etat,
            '$capteurID'=> $capteurID,    
        ));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}
// modifier le nom d'un capteur 
function ModifNomCapteur($capteurID,$nom){
    $conn = connect() -> prepare('UPDATE capteur SET nom=? WHERE capteurID =?');
    $conn -> execute(array(
            'nom' => $nom,
            '$capteurID'=> $capteurID,    
        ));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

//supprimer un capteur
function SuppCapteur($capteurID){
    $conn = connect() -> prepare('DELETE * FROM capteur WHERE capteurID =?');
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

// récupérer l'état d'un controleur
function RecupEtatControleur($controleurID, $etat){
    $conn = connect() -> prepare('SELECT etat FROM controleur WHERE controleurID =?');
    $conn -> execute(array($controleurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// modifier l'état d'un controleur 
function ModifEtatControleur($controleurID, $etat){
    $conn = connect() -> prepare('UPDATE controleur SET etat=? WHERE controleurID =?');
    $conn -> execute(array(
            'etat' => $etat,
            '$controleurID'=> $controleurID,    
        ));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}
// modifier le nom d'un controleur
function ModifNomControleur($controleurID,$nom){
    $conn = connect() -> prepare('UPDATE controleur SET nom=? WHERE controleurID =?');
    $conn -> execute(array(
            'nom' => $nom,
            '$controleurID'=> $controleurID,    
        ));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

//supprimer un controleur
function SuppControleur($controleurID){
    $conn = connect() -> prepare('DELETE * FROM controleur WHERE controleurID =?');
    $conn -> execute(array($controleurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}
?>

