<?php
 
 require("database.php");
 
 // Ajouter un capteur
 function ajoutCapteur($capteurID, $nom, $type, $etat, $pieceID){
     $reponse = $conn -> prepare("INSERT INTO capteur VALUES (:capteurID, :nom, :typ, :etat, :pieceID)");
     $reponse->execute(array(
         'capteurID' => $capteurID,
         'nom' => $nom,
         'typ' => $type,
         'etat' => $etat,
         'pieceID' => $pieceID,
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
function ajoutControleur($controleurID, $nom, $type, $etat, $pieceID){
    $reponse = $conn -> prepare("INSERT INTO controleur VALUES (:controleurID, :nom, :typ, :etat, :pieceID)");
    $reponse->execute(array(
        'controleurID' => $controleurID,
        'nom' => $nom,
        'typ' => $type,
        'etat' => $etat,
        'pieceID' => $pieceID,
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

