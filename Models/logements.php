<?php

require_once("../Models/database.php");

// Ajouter un logement 

function ajoutLogement( $nom, $adresse, $codepostale, $surface, $utilisateurID, $pays){
    //lancer la requête d'ajout de logement
    $reponse = connect() -> prepare("INSERT INTO logement(nom, adresse, codepostale, surface, utilisateurID, pays) VALUES (:nom, :adresse, :codepostale, :surface, :utilisateurID, :pays)");
    // executer la requête
    $reponse->execute(array(
        'utilisateurID' => $utilisateurID,
        'nom' => $nom,
        'adresse' => $adresse,
        'codepostale' => $codepostale,
        'surface' => $surface,
        'pays' => $pays,
    ));
    }

// Récupérer les données d'un logement 

function RecupLogements($utilisateurID){
    $conn = connect() -> prepare('SELECT * FROM logement WHERE utilisateurID =?');
    $conn -> execute(array($utilisateurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}
// Modifier les données d'un logement 
// Supprimer un logement
?>  
