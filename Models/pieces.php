<?php 
require 'database.php';
session_start();

// ajouter une pièce 
function ajoutPiece( $nom, $surface, $logementID){
    $con = connect();
    $reponse = $con -> prepare("INSERT INTO piece(nom, surface, logementID) VALUES (:nom, :surface, :logementID)");
    $reponse->execute(array(
        'nom' => $nom,
        'surface' => $surface,
        'logementID ' => $logementID,
        ));
    
    }

// récupérer toutes les pièces 
function RecupAllPieces(){
    $conn = connect() -> prepare('SELECT * FROM piece');
    $conn -> execute();
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// récupérer les données d'une pièce dans un logement 
function RecupPiece($logementID){
    $conn = connect() -> prepare('SELECT * FROM piece WHERE logementID =?');
    $conn -> execute(array($logementID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}
// modifier le nom d'une pièce 
function ModifNomPiece($pieceID,$nom){
    $conn = connect() -> prepare('UPDATE piece SET nom=? WHERE pieceID =?');
    $conn -> execute(array(
            'nom' => $nom,
            '$pieceID'=> $pieceID,    
        ));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

//supprimer une pièce 

function suppPiece($pieceID){
    $conn = connect() -> prepare('DELETE * FROM piece WHERE pieceID =?');
    $conn -> execute(array($pieceID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;

}
    ?> 
