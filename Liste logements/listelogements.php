<?php
// Pour la demo mettre ca dans la page liste des logements 
  $utilisateurID = 1;
  session_start();
  $_SESSION["utilisateurID"] = $utilisateurID;
   /*A la page connection (une fois qu'elle sera crée)
  require 'database.php';
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
    	<div id="logement">    
                <div class="imgmaison" >
                <p><a href="../Liste pièces/listepieces.php"><img src="../Images/imagemaison.PNG" alt="photo de maisonprincipal" width="300" height="300"/></p> </div>
                <div class="maisonprincipal"> Maison <br>principale </a></div>
                <div class="ajoutlogement">
                    <p><a href="../AjoutLogement/AjoutLogement.php"> +  Ajouter un logement </a></p> </div>
        </div>	

        
    </section>
</body> 