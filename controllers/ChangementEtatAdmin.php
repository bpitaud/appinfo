<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();

$langue = $_SESSION['language'];

require_once __DIR__.'/../Models/capteurs.php';

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
                    if ($langue =='fr'){
                        header("Location: ../Views/Liste_de_capteurs.php?user=".$_SESSION['selected_user']."&capteur=".$capteur); 
                      } else {
                        header("Location: ../Views/english/Liste_de_capteurs.php?user=".$_SESSION['selected_user']."&capteur=".$capteur);
                      }
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
                        } else if ($etat[0][0] == "1" or $etat[0][0] == "2" or $etat[0][0] == "3" or $etat[0][0] == "4" or $etat[0][0] == "5") {
                            ModifEtatControleur($capteur, "0");
                        }
                        if ($langue =='fr'){
                            header("Location: ../Views/Liste_de_capteurs.php?user=".$_SESSION['selected_user']."&controleur=".$capteur); 
                          } else {
                            header("Location: ../Views/english/Liste_de_capteurs.php?user=".$_SESSION['selected_user']."&controleur=".$capteur);
                          }
                    }
                }
            }
        }
    } else {
        if ($langue =='fr'){
            header("Location: ../Views/Liste_de_capteurs.php?user=".$_SESSION['selected_user']."&capteur=none"); 
          } else {
            header("Location: ../Views/english/Liste_de_capteurs.php?user=".$_SESSION['selected_user']."&capteur=none");
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