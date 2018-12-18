<?php
  // Pour la demo mettre ca dans la page liste des logements 
  require_once("../Models/database.php");
  session_start();
  /*//A la page connection (une fois qu'elle sera crée)//
  $utilisateurID = $db -> query ('SELECT utilisateurID FROM utilisateur WHERE adressemail = $CequiAEteRentreeDansLeFormulaire AND motdepasse = $MotDePasseEcritDansFormulaire');
  session_start();
  $_SESSION["utilisateurID"] = $utilisateurID;
  */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="listelogementcss.css" />
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
    <div id="zonelogement"> 

        <div id="logement">  
               

                    <a class="imagelogement" href="../Liste pièces/listepieces.php">
                        <div class="imgmaison" href="../Liste pièces/listepieces.php"></div>
                    </a>
                <div id="sous">
                        <a class="logoreglage" href="../ModifierLogement/ModifierLogement.php"><div class="reglage"></div></a>
                    <div class="nomlogement"> 
                        <a href="../Liste pièces/listepieces.php"><p>Maison principale</p></a>
                    </div>
                </div>
        </div>        
    </div>
        <div class="ajoutlogement">
            <p><a href="../AjoutLogement/AjoutLogement.php"> +  Ajouter un logement </a></p> 
        </div>
    </section>
</body> 