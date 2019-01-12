<?php
session_start();

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
                    <li>
                    
                    <a href="../Liste logements/listelogements.php"><span>Home</span></a></li>
                    
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
                                <a href="../controllers/deconnexion.php"><p id="borderNone">Deconnexion</p></a>
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </header>

    <h2>Liste logements</h2>
    <section>

    <?php
                $modif = $_GET['modif'];
                if (isset($modif)) {
                    if ($modif == "true") {
                        echo "<p style='color:white;'>Votre logement a bien été modifié.</p>";
                    } else {
                        echo "<p style='color:red;'>Votre logement n'a pas été modifié.</p>";
                    }
                }
                ?>
                
        <div id="zonelogement"> 
            <div id="zone">
    <?php
    require_once('../controllers/FormulaireAjoutLogement.php');
        $logement = RecupLogementController($_SESSION["utilisateurID"]);
        foreach ($logement as $logement){
            echo(
                '
                    <div id="logement">  
                        <a class="imagelogement" href="../Liste pièces/listepieces.php?log='.$logement[0].'">
                            <div class="imgmaison" href="../Liste pièces/listepieces.php?log='.$logement[0].'"> 
                            </div>
                        </a>
                        <div id="sous">
                            <a class="logoreglage" href="../ModifierLogement/ModifierLogement.php?log='.$logement[0].'">
                                <div class="reglage">
                                </div>
                            </a>
                            <div class="nomlogement"> 
                                <a href="../Liste pièces/listepieces.php"><p>'.$logement[1].'</p></a>
                            </div>
                        </div>        
                </div>'); 
        }
    ?>
</div>
</div>
        <a href="../AjoutLogement/AjoutLogement.php"> <div class="ajoutlogement">

             <p>+  Ajouter un logement</p>  
        </div></a>
    </section>

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>

</body> 