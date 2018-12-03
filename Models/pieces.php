<?php 
require 'database.php';
session_start();

function ajoutPiece( $nom, $surface, $logementID, $pieceID){
    $con = connect();
    $reponse = $con -> prepare("INSERT INTO logement(logementID, nom, adresse, codepostale, surface, utilisateurID, pays) VALUES (:logementID, :nom, :adresse, :codepostale, :surface, :utilisateurID, :pays)");
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
