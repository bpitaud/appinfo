<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/listelogementcss.css" />
        <title>Domisep - Liste des pièces</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <?php include('header_user.php') ?>
    </head>

    <body>

    <h2>Logements</h2>

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
    
    <?php
                $supp = $_GET['supp'];
                if (isset($supp)) {
                    if ($supp == "true") {
                        echo "<p style='color:white;'>Votre logement a bien été supprimé.</p>";
                    } else {
                        echo "<p style='color:red;'>Votre logement n'a pas été supprimé.</p>";
                    }
                }
                ?>
                
    <div id="zonelogement"> 
    <?php
    require_once('../controllers/FormulaireAjoutLogement.php');
        $logement = RecupLogementController($_SESSION["utilisateurID"]);
        foreach ($logement as $logement){
            echo(
                '
                <div id="logement">  
                    <a class="imagelogement" href="../Views/listepieces.php?log='.$logement[0].'">
                        <div class="imgmaison" href="../Views/listepieces.php?log='.$logement[0].'"> 
                        </div>
                    </a>
                    <div id="sous">
                        <a class="logoreglage" href="../Views/ModifierLogement.php?log='.$logement[0].'">
                            <div class="reglage">
                            </div>
                        </a>
                        <div class="nomlogement"> 
                            <a href="../Views/listepieces.php"><p>'.$logement[1].'</p></a>
                        </div>
                    </div>        
                </div>'); 
    }
    ?>
    </div>
        <a href="../Views/AjoutLogement.php"> <div class="ajoutlogement">

             <p>+  Ajouter un logement</p>  
        </div></a>
    </section>

</body> 