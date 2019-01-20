<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();

require_once ('../Models/capteurs.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $changement = testinput($_POST['changement']);
    $capteur = testinput($_POST['capteur']);
    if ($capteur) {
        $recupCapteur = RecupCapteurbyID($capteur);
        if ($recupCapteur == true){
            if (isset($capteur) & isset($changement)) {
                if ($changement == "changer_etat"){
                    $etat = RecupEtatCapteur($capteur, $etat);
                    if ($etat[0][0] == "0" ) {
                        ModifEtatCapteur($capteur, "1");
                    } else {
                        ModifEtatCapteur($capteur, "0");
                    }
                    header("Location: ../Views/Liste_de_capteurs.php?user=".$_SESSION['selected_user']."&capteur=".$capteur);
                }
            }
        } else if ($recupCapteur == false) {
            $recupControleur = RecupControleurbyID($capteur);
            if ($recupControleur==true){
                if (isset($capteur) & isset($changement)) {
                    if ($changement == "changer_etat"){
                        $etat = RecupEtatControleur($capteur, $etat);
                        if ($etat[0][0] == "0") {
                            ModifEtatControleur($capteur, "1");
                        } else {
                            ModifEtatControleur($capteur, "0");
                        }
                        header("Location: ../Views/Liste_de_capteurs.php?user=".$_SESSION['selected_user']."&controleur=".$capteur);
                    }
                }
            }
        }
    }
}
    

function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>