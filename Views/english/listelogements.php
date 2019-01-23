<?php
session_start();
$_SESSION['language'] ='en';

// if(!isset($_SESSION["connexion"]) or $_SESSION["connexion"] = 0 or empty($_SESSION["connexion"])) {
//     header("Location: connexion.php");
// }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../css/listelogementcss.css" />
        <title>Domisep - List of homes</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <?php include('header_user.php') ?>
    </head>

    <body>

    <h2>Homes</h2>

    <section>

    <?php
    require_once('../../controllers/FormulaireAjoutLogement.php');
                $modif = test_input($_GET['modif']);
                if (isset($modif)) {
                    if ($modif == "true") {
                        echo "<p style='color:white;'>Your home has been modified.</p>";
                    } else if ($modif =="false") {
                        echo "<p style='color:red;'>Your home hasn't been modified.</p>";
                    }
                }
                ?>
    
    <?php
                $supp = test_input($_GET['supp']);
                if (isset($supp)) {
                    if ($supp == "true") {
                        echo "<p style='color:white;'>Your home has been deleted.</p>";
                    } else if ($modif =="false") {
                        echo "<p style='color:red;'>Your home hasn't been deleted.</p>";
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
                    <a class="imagelogement" href="../english/listepieces.php?log='.$logement[0].'">
                        <div class="imgmaison" href="../english/listepieces.php?log='.$logement[0].'"> 
                        </div>
                    </a>
                    <div id="sous">
                        <a class="logoreglage" href="../english/ModifierLogement.php?log='.$logement[0].'">
                            <div class="reglage">
                            </div>
                        </a>
                        <div class="nomlogement"> 
                            <a href="../english/listepieces.php"><p>'.$logement[1].'</p></a>
                        </div>
                    </div>        
                </div>'); 
    }
    ?>
    </div>
    <div class="ajoutlogement"> <a href="../english/AjoutLogement.php"> 

             <p>+  Add a home</p>  
        </div></a>
    </section>

</body> 