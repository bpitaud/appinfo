<?php 
require_once("database.php");


// ajouter une pièce 
function ajoutPiece($pieceID, $nom, $surface, $logementID){
    $con = connect();
    $reponse = $con -> prepare("INSERT INTO piece(pieceID, nom, surface, logementID) VALUES (:pieceID, :nom, :surface, :logementID)");
    $reponse->execute(array(
        'pieceID' => $pieceID,
        'nom' => $nom,
        'surface' => $surface,
        'logementID' => $logementID,
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

// récupérer une pièce par son ID 
function RecupPiecebyID($pieceID){
    $conn = connect() -> prepare('SELECT * FROM piece WHERE pieceID=?');
    $conn -> execute(array($pieceID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// modifier le nom d'une pièce 
function ModifNomPiece($pieceID,$nom){
    $conn = connect() -> prepare('UPDATE piece SET nom=:nom WHERE pieceID =:pieceID');
    $conn -> execute(array(
            'nom' => $nom,
            'pieceID'=> $pieceID,    
        ));
}

function ModifSurfacePiece($pieceID,$surface){
    $conn = connect() -> prepare('UPDATE piece SET surface=:surface WHERE pieceID =:pieceID');
    $conn -> execute(array(
            'surface' => $surface,
            'pieceID'=> $pieceID,    
        ));
}

//supprimer une pièce 

function suppPiece($pieceID){
    $conn = connect() -> prepare('DELETE FROM piece WHERE pieceID =?');
    $conn -> execute(array($pieceID));
    //$resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return true;

}

?> 
