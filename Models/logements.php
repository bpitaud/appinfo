<?php

require_once("../Models/database.php");

// Ajouter un logement 
function ajoutLogement( $nom, $adresse, $codepostale, $surface, $utilisateurID, $pays){
    $reponse = connect() -> prepare("INSERT INTO logement(nom, adresse, codepostale, surface, utilisateurID, pays) VALUES (:nom, :adresse, :codepostale, :surface, :utilisateurID, :pays)");
    $reponse->execute(array(
        'utilisateurID' => $utilisateurID,
        'nom' => $nom,
        'adresse' => $adresse,
        'codepostale' => $codepostale,
        'surface' => $surface,
        'pays' => $pays,
    ));
    }

// Récupérer les données d'un logement dans un compte utilisateur
function RecupLogements($utilisateurID){
    $conn = connect() -> prepare('SELECT * FROM logement WHERE utilisateurID =?');
    $conn -> execute(array($utilisateurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}
// Modifier les données d'un logement 
function ModifNomLogement($logementID,$nom){
    $conn = connect() -> prepare('UPDATE logement SET nom=? WHERE logementID =?');
    $conn -> execute(array(
            'nom' => $nom,
            '$logementID'=> $logementID,    
        ));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

function ModifAdresseLogement($logementID,$adresse){
    $conn = connect() -> prepare('UPDATE logement SET adresse=? WHERE logementID =?');
    $conn -> execute(array(
            'adresse' => $adresse,
            '$logementID'=> $logementID,    
        ));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

function ModifZipcodeLogement($logementID,$codepostale){
    $conn = connect() -> prepare('UPDATE logement SET codepostale=? WHERE logementID =?');
    $conn -> execute(array(
            'codepostale' => $codepostale,
            '$logementID'=> $logementID,    
        ));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

function ModifSurfaceLogement($logementID,$surface){
    $conn = connect() -> prepare('UPDATE logement SET surface=? WHERE logementID =?');
    $conn -> execute(array(
            'surface' => $surface,
            '$logementID'=> $logementID,    
        ));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

function ModifPaysLogement($logementID,$pays){
    $conn = connect() -> prepare('UPDATE logement SET pays=? WHERE logementID =?');
    $conn -> execute(array(
            'pays' => $pays,
            '$logementID'=> $logementID,    
        ));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// Supprimer un logement
function SuppLogement($logementID){
    $conn = connect() -> prepare('DELETE * FROM logement WHERE logementID =?');
    $conn -> execute(array($logementID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}
?>  
