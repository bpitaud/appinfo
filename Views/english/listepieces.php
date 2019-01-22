<?php
session_start();
$_SESSION['language'] ='en';

if (isset($_GET['log']) && $_GET['log'] != '') {
    $_SESSION['selected_logement'] = $_GET['log'];
}

// if(!isset($_SESSION["connexion"]) or $_SESSION["connexion"] = 0  or empty($_SESSION["connexion"])) {
//     header("Location: connexion.php");
// }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../css/listepiecescss.css" />
        <title>Domisep - List of rooms</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <?php include('header_user.php') ?>
    </head>

    <body>
   
    <section>

        <div class = 'retour' ><a href='../english/listelogements.php'> < Back </a> </div>
        
        <?php     
                require_once ('../../controllers/FormulaireAjoutPiece.php');

                $logement = $_SESSION['selected_logement'];
                $log = LogementID($logement);
                echo'
                <h2>Room(s) of the home '.$log[0][1].'</h2>';

                $modif = test_input($_GET['modif']);
                if (isset($modif)) {
                    if ($modif == "true") {
                        echo "<p style='color:white;'>Your room has been modified.</p>";
                    } else if ($modif == "false"){
                        echo "<p style='color:red;'>Your room hasn't been modified.</p>";
                    }
                }
                
                $supp = test_input($_GET['supp']);
                if (isset($supp)) {
                    if ($supp == "true") {
                        echo "<p style='color:white;'>Your room has been deleted.</p>";
                    } else if ($supp == "false")  {
                        echo "<p style='color:red;'>Your room hasn't been deleted.</p>";
                    }
                }
                
                ?>
    	<div id="divpiece">
        <div id="pieces">
            <?php
                        $piece = RecupPieceController($_SESSION["selected_logement"]);
                        if (count($piece) == 0) {
                            echo "<li> You don't have any room is this home.</li>";
                        } else {
                        foreach ($piece as $piece){
                            echo ('
                            <div class="block" >
                                <div class="figure">
                                    <p> <a href = "../english/listecapteurs.php?piece='.$piece[0].'" ><img src="../../Images/iconesalon.png" alt="photo de salon" width="180" height="180"></p> 
                                </div>
                                <div class="Caractere"> 
                                    <p>'.$piece[1].'</p>
                                <a href = "../english/Modifierpiece.php?piece='.$piece[0].'"> <img src="../../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" widt="46" height="46"/></a>
                                </div>
                                
                            </div>
                            ');
                        }
                    }
              ?>                
        </div>
    </div>

            <?php
            echo'
            </div>
            <div class="ajoutpiece"> <a href="../english/AjoutPiece.php?log='.$_SESSION['selected_logement'].'"> 
             <p>+  Add a room</p>  
        </div></a>';
        ?>

    </section>
</body> 
</html>