<?php 
require 'database.php';
session_start();

$sql = "INSERT INTO piece(pieceID, nom, surface,logementID) VALUES($_SESSION['piece'],'$nom','$url',$_SESSION['logement')"; 
// on insère les informations du formulaire dans la table 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
