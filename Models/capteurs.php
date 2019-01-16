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

// récupérer un capteur par son ID

function RecupCapteurbyID($capteurID){
    $conn = connect() -> prepare('SELECT * FROM capteur WHERE capteurID =?');
    $conn -> execute(array($capteurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// récuperer le nom d'un capteur par son 

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
    $conn = connect() -> prepare('DELETE FROM `capteur` WHERE capteurID =?');
    $conn -> execute(array($capteurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// join les tables capteur, pièce, logement, utilisateur 
function joinCapteur($capteurID, $utilisateurID){
    $req = connect() -> prepare('SELECT
    capteur.capteurID as capteurID,
    capteur.typ as capteurTyp,
    capteur.etat,
    piece.nom as pieceNom,
    logement.nom as logementNom
    FROM
        capteur
    INNER JOIN piece ON capteur.pieceID = piece.pieceID
    INNER JOIN logement ON logement.logementID = piece.logementID
    WHERE capteurID = :capteurID AND logement.utilisateurID = :utilisateurID');

    $req->execute(array(
        'capteurID' => $capteurID,
        'utilisateurID' => $utilisateurID
    ));

    return $req->fetch(PDO::FETCH_ASSOC);
}

// get user by capteur ID
function getUserByCapteurID($capteurID) {
    $req = connect() -> prepare('SELECT
        utilisateur.utilisateurID as utilisateurID,
        utilisateur.nom as userNom,
        utilisateur.prenom as userPrenom,
        utilisateur.telephone as userTel, 
        utilisateur.email as userEmail
    FROM
        capteur
    INNER JOIN piece ON capteur.pieceID = piece.pieceID
    INNER JOIN logement ON logement.logementID = piece.logementID
    INNER JOIN utilisateur ON utilisateur.utilisateurID = logement.utilisateurID
    WHERE capteur.capteurID = :capteurID');

    $req->execute(array(
        'capteurID' => $capteurID,
    ));

    return $req->fetchAll(PDO::FETCH_NUM);
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

// join les tables controleur, pièce, logement, utilisateur 
function joinControleur($controleurID, $utilisateurID){
    $req = connect() -> prepare('SELECT
    controleur.controleurID as capteurID,
    controleur.typ as capteurTyp,
    controleur.etat,
    piece.nom as pieceNom,
    logement.nom as logementNom
    FROM
        controleur
    INNER JOIN piece ON controleur.pieceID = piece.pieceID
    INNER JOIN logement ON logement.logementID = piece.logementID
    WHERE controleurID = :controleurID AND logement.utilisateurID = :utilisateurID');

    $req->execute(array(
        'controleurID' => $controleurID,
        'utilisateurID' => $utilisateurID
    ));

    return $req->fetch(PDO::FETCH_ASSOC);
}

// get user by controleur ID
function getUserByControleurID($controleurID) {
    $req = connect() -> prepare('SELECT
        utilisateur.utilisateurID as utilisateurID,
        utilisateur.nom as userNom,
        utilisateur.prenom as userPrenom,
        utilisateur.telephone as userTel, 
        utilisateur.email as userEmail
    FROM
        controleur
    INNER JOIN piece ON controleur.pieceID = piece.pieceID
    INNER JOIN logement ON logement.logementID = piece.logementID
    INNER JOIN utilisateur ON utilisateur.utilisateurID = logement.utilisateurID
    WHERE controleur.controleurID = :controleurID');

    $req->execute(array(
        'controleurID' => $controleurID,
    ));

    return $req->fetchAll(PDO::FETCH_NUM);
}
?>

