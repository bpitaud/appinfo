<?php

require("database.php");
session_start();


// Ajouter un logement 

function ajoutLogement( $nom, $adresse, $codepostale, $surface, $utilisateurID, $pays){
    $reponse = $db -> prepare("INSERT INTO logement(logementID, nom, adresse, codepostale, surface, utilisateurID, pays) VALUES (:logementID, :nom, :adresse, :codepostale, :surface, :utilisateurID, :pays)");
    $reponse->execute(array(
        'utilisateurID' => $utilisateurID
        'nom' => $nom,
        'adresse' => $adresse,
        'codepostale' => $codepostale,
        'surface' => $surface,
        'pays' => $pays,
        ));
    
    echo 'Le logement a bien été ajouté !';
    }
    ?>  
