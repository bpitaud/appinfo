<?php


require("database.php");

// Ajouter un logement 

// function ajoutLogement($logementID, $nom, $adresse, $codepostale, $surface, $userID){
    $reponse = $db -> prepare("INSERT INTO `Logement` VALUES ('ID_logement , Nom, Adresse, codepostale, surface, ID_utilisateur')");
    $response -> execute(array[$])
   
} //

// récupérer les infos du logement
// Modifier les infos du logement 
// supprimer un logement 

?>

EATE TABLE `Logement` (
  `ID_logement` int(11) NOT NULL,
  `Nom` varchar(15) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `codepostale` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `ID_utilisateur` int(11) NOT NULL

