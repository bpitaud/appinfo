<?php 
require 'database.php';
session_start();

function ajoutPiece( $nom, $surface, $logementID){
    $con = connect();
    $reponse = $con -> prepare("INSERT INTO piece(nom, surface, logementID) VALUES (:nom, :surface, :logementID)");
    $reponse->execute(array(
        'pieceID' => '',
        'nom' => $nom,
        'surface' => $surface,
        ));
    
    echo 'La piece a bien été ajouté !';
    }
    ?> 
