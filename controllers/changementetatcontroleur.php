<?php
session_start();
require_once __DIR__.'/../Models/capteurs.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $controleur = testinput($_POST['controleur']);
    $etat = RecupEtatControleur($controleur, $etat);
    var_dump($etat);

    if (isset($controleur) & isset($_POST['up'])) {

        if ($etat[0][0] == "0") {
            ModifEtatControleur($controleur, "1");
        } else if ($etat[0][0] == "1") {
            ModifEtatControleur($controleur, "2");
        } else if ($etat[0][0] == "2") {
            ModifEtatControleur($controleur, "3");
        } else if ($etat[0][0] == "3") {
            ModifEtatControleur($controleur, "4");
        } else if ($etat[0][0] == "4") {
            ModifEtatControleur($controleur, "5");
        }



    } else if (isset($controleur) & isset($_POST['down'])) {

        if ($etat[0][0] == "5") {
            ModifEtatControleur($controleur, "4");
        } else if ($etat[0][0] == "4") {
            ModifEtatControleur($controleur, "3");
        } else if ($etat[0][0] == "3") {
            ModifEtatControleur($controleur, "2");
        } else if ($etat[0][0] == "2") {
            ModifEtatControleur($controleur, "1");
        } else if ($etat[0][0] == "1") {
            ModifEtatControleur($controleur, "0");
        }
    }
}


function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

header("Location: ../Views/Listecapteurs.php?piece=".$_SESSION['selected_piece']);
