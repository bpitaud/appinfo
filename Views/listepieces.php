<?php
session_start();

if (isset($_GET['log']) && $_GET['log'] != '') {
    $_SESSION['selected_logement'] = $_GET['log'];
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/listepiecescss.css" />
        <title>Domisep - Liste des pièces</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <?php include('header_user.php') ?>
    </head>

    <body>
   
    <section>

        <div class = 'retour' ><a href='../Views/listelogements.php'> < Retour </a> </div>
        
        <?php
                
                require_once ('../Models/logements.php');

                $logement = $_SESSION['selected_logement'];
                $log = RecupLogementsbyID($logement);
                echo'
                <h2>Pièce(s) du logement '.$log[0][1].'</h2>';

                $modif = $_GET['modif'];
                if (isset($modif)) {
                    if ($modif == "true") {
                        echo "<p style='color:white;'>Votre pièce a bien été modifié.</p>";
                    } else {
                        echo "<p style='color:red;'>Votre pièce n'a pas été modifié.</p>";
                    }
                }
                
                $supp = $_GET['supp'];
                if (isset($supp)) {
                    if ($supp == "true") {
                        echo "<p style='color:white;'>Votre pièce a bien été supprimé.</p>";
                    } else {
                        echo "<p style='color:red;'>Votre pièce n'a pas été supprimé.</p>";
                    }
                }
                
                ?>
    	<div id="pieces">
            <?php
            require_once ('../controllers/FormulaireAjoutPiece.php');
                        $piece = RecupPieceController($_SESSION["selected_logement"]);
                        if (count($piece) == 0) {
                            echo "<li> Vous n'avez pas encore de pièce pour ce logement.</li>";
                        } else {
                        foreach ($piece as $piece){
                            echo ('
                            <div class="block" >
                                <div class="figure">
                                    <p> <a href = "../Views/listecapteurs.php?piece='.$piece[0].'" ><img src="../Images/iconesalon.png" alt="photo de salon" width="128" height="128"></p> 
                                </div>
                                <div class="Caractere"> 
                                    '.$piece[1].'
                                <p><a href = "../Views/Modifierpiece.php?piece='.$piece[0].'"> <img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" widt="46" height="46"/></a></p>
                                </div>
                                
                            </div>
                            ');
                        }
                    }
              ?>          
            

            
        </div>

            <?php
            echo'
            </div>
            <a href="../Views/AjoutPiece.php?log='.$_SESSION['selected_logement'].'"> <div class="ajoutpiece">
             <p>+  Ajouter une pièce</p>  
        </div></a>';
        ?>

    </section>

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body> 