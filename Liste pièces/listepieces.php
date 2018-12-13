<?php
//Dans la page liste piece => récupérer l'IDlogement
require_once("../Models/database.php");
//$nomDulogement = 'maison';
//echo connect() -> query ('SELECT logementID FROM logement WHERE nom = $nomDulogement');
  //echo $logement;
  /*
function getLogementID($connec,$nomLogement) {
    $sql =  "SELECT logementID FROM logement WHERE nom ="'.$nomLogement.'"";
    foreach  ($connec->query($sql) as $row) {
        return $row['logementID'] . "\n";
    }
} 
session_start();
$_SESSION["logementID"] = getLogementID(connect(),'maison');
echo $_SESSION["logementID"]; */
session_start();
function getLogementID($conn) {
  $nomDulogement = "maison";
  $sql =  'SELECT logementID FROM logement WHERE nom = "maison"';
  foreach  ($conn->query($sql) as $row) {
      return $row['logementID'] . "\n";
}
} 
$_SESSION["logementID"] = getLogementID(connect());
echo $_SESSION["logementID"];
// Fonction qui renvoie un array avec le nom des maison
// Faire une banque d'image et une fonction qui va chercher une image
// Faire ensuite une boucle for qui affiche lles logement en fonction de la taille de l'array
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="listepiecescss.css" />
        <title>Domisep - Liste des pièces</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>

    <body>
        <header>
        <div class="wrapper">
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <li><a href="../Liste logements/listelogements.php"><span>Home</span></a></li>
                    <li>
                        <div class="dropdownLang">
                            <div class="noHover">
                                <p>FR</p>
                            </div>
                            <div class="hover">
                                <p>FR</p>
                                <a href="english.html"> EN </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <div id="noHoverUser">
                                    <button class="boutonmenuprincipal"><p></p></button>
                            </div>
                            <div id="hoverUser">
                                <button class="boutonmenuprincipal"><p></p></button>
                                <a href="MesInfos.html"><p>Mes infos</p></a>
                                <a href="NousContacter.html"><p>Contacter</p></a>
                                <a href="Accueil.html"><p id="borderNone">Deconnexion</p></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>



    <section>
         <a href ="../Liste logements/listelogements.php"> < Retour</a> 
        <h2>Pièce(s) du logement</h2>
    	<div id="pieces">
            <?php
                        function getPieceName($logementID) {
                            $listpiece = array();
                            $sql =  'SELECT nom FROM piece WHERE logementID ='.$logementID.'';
                            foreach  (connect()->query($sql) as $row) {
                                array_push($listpiece, $row['nom']);
                            }
                            //print_r  ($listpiece);
                            return $listpiece;
                        }
                        $listName = getPieceName(1);
                        //print_r ($listName);
                        
                        function getPieceID($logementID) {
                            $listPieceID = array();
                            $sql =  'SELECT pieceID FROM piece WHERE logementID ='.$logementID.'';
                            foreach  (connect()->query($sql) as $row) {
                                array_push($listPieceID, $row['pieceID']);
                            }
                            //print_r  ($listPieceID);
                            return $listPieceID;
                        }
                        $listID = getPieceID(1);
                        //print_r($listID);
                        for ($i = 0; $i < count($listID) ;$i++) {
                            echo $listName[$i];
                            echo'
                            <div class="block" >
                                <div class="figure">
                                    <p> <a href = "../Liste capteurs/listecapteurs.php" ><img src="../Images/iconesalon.png" alt="photo de salon" width="128" height="128"></p> 
                                </div>
                                <div class="Caractere"> 
                                    '.$listName[$i].'
                                    <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" widt="46" height="46"/></p>
                                </div>
                            </div>
                            ';
                        }
            ?>

            <!--
            <div class="block" >
                <div class="figure">
                    <p> <a href = "../Liste capteurs/listecapteurs.php" ><img src="../Images/iconesalon.png" alt="photo de salon" width="128" height="128"></p> 
                </div>
                <div class="Caractere"> 
                    Salon
                    <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" widt="46" height="46"/></p>
                </div>
            </div>
            -->
               
            <div class="block"> 
                <div class="figure">
                    <div class="plus" > 
                        <p> <a href ="../AjoutPiece/AjoutPiece.php" > +</p> 
                    </div>      
                </div>
            <div class="Caractere"> 
                Ajouter </a></div>
            </div>   
    	</div>	
    </section>

    
</body> 