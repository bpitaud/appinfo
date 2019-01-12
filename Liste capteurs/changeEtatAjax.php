<?php
        //recupère le get effectué grace à ajax dans javascript et modifie l'état du capteur/controleur dans la base de donnée
            $q = intval($_GET['q']);
            echo $q[0].", ".$q[1].", ".$q[2];
            if ($q[0] == "capteur") {
                ModifEtatCapteur($q[1], $q[2]);
            } if ($q[0] == "controleur") {
                ModifEtatControleur($q[1], $q[2]);
            }
?>