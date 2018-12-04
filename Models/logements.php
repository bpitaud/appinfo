<?php

require_once("../Models/database.php");
session_start();


// Ajouter un logement 

function ajoutLogement( $nom, $adresse, $codepostale, $surface, $utilisateurID, $pays){
    //$conn = connect();
    $reponse = connect() -> prepare("INSERT INTO logement(logementID, nom, adresse, codepostale, surface, utilisateurID, pays) VALUES (:logementID, :nom, :adresse, :codepostale, :surface, :utilisateurID, :pays)");
    //$array = 
    $reponse->execute(array(
        'logementID' => '1',
        'utilisateurID' => $utilisateurID,
        'nom' => $nom,
        'adresse' => $adresse,
        'codepostale' => $codepostale,
        'surface' => $surface,
        'pays' => $pays,
    ));
    
    echo 'Le logement a bien été ajouté !';
    }

?>  
