<?php
//error_reporting(0);
session_start();
$_SESSION['language'] ='fr';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
if(!isset($_SESSION["connexion"]) || $_SESSION["connexion"] == 0) {
    header("Location: connexion.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/listelogementcss.css" />
        <title>Domisep - Liste des logements</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <?php include('header_user.php') ?>
    </head>

    <body>

    <h2>Logements</h2>

    <section>

    <?php
    require_once('../controllers/FormulaireAjoutLogement.php');
                $modif = test_input($_GET['modif']);
                if (isset($modif)) {
                    if ($modif == "true") {
                        echo "<p style='color:white;'>Votre logement a bien été modifié.</p>";
                    } else if ($modif =="false") {
                        echo "<p style='color:red;'>Votre logement n'a pas été modifié.</p>";
                    }
                }
                ?>
    
    <?php
                $supp = test_input($_GET['supp']);
                if (isset($supp)) {
                    if ($supp == "true") {
                        echo "<p style='color:white;'>Votre logement a bien été supprimé.</p>";
                    } else if ($modif =="false") {
                        echo "<p style='color:red;'>Votre logement n'a pas été supprimé.</p>";
                    }
                }
                ?>
                
    <div id="zonelogement"> 
    <?php
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
    <div class="ajoutlogement"> <a href="../Views/AjoutLogement.php"> 

             <p>+  Ajouter un logement</p>  
        </div></a>
    </section>

</body> 