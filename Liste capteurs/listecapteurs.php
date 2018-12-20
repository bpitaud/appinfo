<?php
require_once("../Models/database.php");
session_start();
/*
function getLogementID($logement) {
    $listLogementID = array();
    $sql =  'SELECT logementID FROM logement WHERE nom ='.$logement.'';
    foreach  (connect()->query($sql) as $row) {
        array_push($listLogement, $row['logementID']);
    }
    print_r  ($listLogement);
    return $listLogementID;
}
getLogementID('maison'); 
*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="codecapteur.css" />
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
                                <a href="../mesInfosUser/MesInfosUser.php"><p>Mes infos</p></a>
                                <a href="../NousContacter/NousContacter.php"><p>Contacter</p></a>
                                <a href="Accueil.html"><p id="borderNone">Deconnexion</p></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section>
        <a id ="retour" href ="../Liste pièces/listepieces.php"> < Retour</a> 
        <h1> Salon </h1>
    	<div id="capteurs">
        <?php
        
        function getCapteurName($pieceID) {
            $listCapteur = array();
            $sql =  'SELECT nom FROM controleur WHERE pieceID ='.$pieceID.'';
            foreach  (connect()->query($sql) as $row) {
                array_push($listCapteur, $row['nom']);
            }
            //print_r  ($listLogement);
            return $listCapteur;
        }
        $listName = getCapteurName($_SESSION["pieceID"]);
        //print_r ($listName);
        // Type de capteur dans la base de donnée en int => menu déroulant pour savoir le type => numéro selon l'option choisi 
        
        function getCapteurID($pieceID) {
            $listCapteur = array();
            $sql =  'SELECT controleurID FROM controleur WHERE pieceID ='.$pieceID.'';
            foreach  (connect()->query($sql) as $row) {
                array_push($listCapteur, $row['controleurID']);
            }
            //print_r  ($listLogement);
            return $listCapteur;
        }
        $listID = getCapteurID($_SESSION["pieceID"]);
        //print_r ($listID);


        function getCapteurType($capteurID) {
            $capteurType = array();
            $sql =  'SELECT `type` FROM controleur WHERE controleurID ='.$capteurID.'';
            foreach  (connect()->query($sql) as $row) {
                array_push($capteurType, $row['type']);
            }
            return $capteurType[0];
        }
        
        function getCapteurEtat ($capteurID) {
            $capteurEtat = array();
            $sql =  'SELECT etat FROM controleur WHERE controleurID ='.$capteurID.'';
            foreach  (connect()->query($sql) as $row) {
                array_push($capteurEtat, $row['etat']);
            }
            return $capteurEtat[0];
        }

        //test 
        for ($i = 0; $i < count($listID) ;$i++) {
            $type = getCapteurType($listID[$i]);
            $etat = getCapteurEtat($listID[$i]);
            //echo "<br>";
            //echo $type; echo "<br>";
            //echo $etat;
        }

        //echo count($list); 
        for ($i = 0; $i < count($listID) ;$i++) {
            $html1 = '<div class="block"> 
            <div class="figure" >';
            if (getCapteurEtat($listID[$i])==0) { // Image du type éteint
                echo getCapteurType($listID[$i]);
                switch (getCapteurType($listID[$i])){
                    case "Lumière": //1:
                        $html2='<p> <a href = "#"> <img src="../Images/iconelumiereblanche.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p>';
                        break;
                    case "Camèra de surveillance":
                        $html2='<p><a href = "#"><img src="../Images/iconecadenas.png" alt="photo de cadenas"width="128" height="128"/></a></p>';
                        break;
                    case "Humidité":
                        $html2='<p> <a href = "#"> 70%  </a> </p>';
                        break;
                    case "Température":
                        $html2='<p> <a href = "#"> 20°  </a> </p>';
                        break;
                    case "Chauffage":
                        $html2='<p><a href = "#"><img src="../Images/iconechauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p>
                        <progress id="avancement" value="50" max="100"></progress>
                        <span id="pourcentage"></span>
                        <input type="button" onclick="modif(-10);" value="-">
                        <input type="button" onclick="modif(10);" value="+">
                        <script type ="text/javascript" src="codecapteur.js"> </script>';
                        break;
                    
                } 
            } // image du type allumé
            else {
                switch (getCapteurType($listID[$i])){
                    case 1://"Lumière":
                        $html2='<p> <a href = "#"> <img src="../Images/iconelumiereblanche.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p>';
                        break;
                    case 2://"Camèra de surveillance":
                        $html2='<p><a href = "#"><img src="../Images/iconecadenas.png" alt="photo de cadenas"width="128" height="128"/></a></p>';
                        break;
                    case 3://"Humidité":
                        $html2='<p> <a href = "#"> 70%  </a> </p>';
                        break;
                    case 4://"Température":
                        $html2='<p> <a href = "#"> 20°  </a> </p>';
                        break;
                    case 5://"Chauffage":
                        $html2='<p><a href = "#"><img src="../Images/iconechauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p>
                        <progress id="avancement" value="50" max="100"></progress>
                        <span id="pourcentage"></span>
                        <input type="button" onclick="modif(-10);" value="-">
                        <input type="button" onclick="modif(10);" value="+">
                        <script type ="text/javascript" src="codecapteur.js"> </script>';
                        break;
                } 
            }
            $html3 = '</div>
            <div class="caractère"> 
                '.$listName[$i].'
                <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
            </div>
            </div> ';
            echo $html1.$html2.$html3;
        }
        
        // Faire java script pour le onclic les images et le nom du capteur passe en jaune et modifie dans la base de donnée l'état à 1
        ?>






        <!--
            <div class="block"> 
                <div class="figure" >
                    <p> <a href = "#"> <img src="../Images/iconelumiereblanche.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p> 
                </div>
                <div class="caractère"> 
                    Lumière<br>principal
                    <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                </div>
            </div> 
            
                          
            <div class="block"> 
                <div class="figure">
                    <p><a href = "#"><img src="../Images/iconelumierejaune.png" alt="photo de lumiere"width="128" height="128"/></a></p>
                </div>
                <div class="caractère"> 
                    <div class="lampe" > 
                        Lampe <br> de chevet 
                    </div>
                    <p><img src="../Images/iconereglagejaune.png" alt="logo réglage allumé" width="39" height="39"/></p>
                </div>
            </div>    
            
            <div class="block"> 
                <div class="figure" >
                    <div class="pourcentage"> 
                        <p> <a href = "#"> 70%  </a> </p> 
                    </div> 
                </div>
                <div class="caractère" > 
                    Humidité
                    <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                </div>
            </div>
            
            <div class="block">
                <div class="figure">
                    <p><a href = "#"><img src="../Images/iconecadenas.png" alt="photo de cadenas"width="128" height="128"/></a></p>
                </div>
                <div class="caractère"> 
                    Caméra de <br> surveillance
                    <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                </div>
            </div> 
            
            <div class="block"> 
                <div class="figure">
                    <p><a href = "#"><img src="../Images/iconechauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p>
                </div>
                <div class="caractère"> 
                    Chauffage
                    <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                </div>
            </div>   -->



            <!-- PLUS -->
            <div class="block">       
                <div class= "figure"> 
                    <div class="plus">
                        <p> <a href = "../AjoutCapteur/AjoutCapteur.php"> + </a> </p> 
                    </div>
                </div>
                <div class="caractère">
                    Ajouter <br> un capteur 
                </div>
            </div>
        </div>
</section>
</body>