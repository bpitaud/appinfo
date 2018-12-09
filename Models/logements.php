<?php

require_once("../Models/database.php");
session_start();


// Ajouter un logement 

function ajoutLogement( $nom, $adresse, $codepostale, $surface, $utilisateurID, $pays){
    //lancer la requête d'ajout de logement
    $reponse = connect() -> prepare("INSERT INTO logement(logementID, nom, adresse, codepostale, surface, utilisateurID, pays) VALUES (:logementID, :nom, :adresse, :codepostale, :surface, :utilisateurID, :pays)");
    // executer la requête
    $reponse->execute(array(
        'logementID' => '',
        'utilisateurID' => $utilisateurID,
        'nom' => $nom,
        'adresse' => $adresse,
        'codepostale' => $codepostale,
        'surface' => $surface,
        'pays' => $pays,
    ));
    
    echo 'Le logement a bien été ajouté !';
    }

// Récupérer les données d'un logement 
// Modifier les données d'un logement 
// Supprimer un logement
?>  
