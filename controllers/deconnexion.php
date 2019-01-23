<?php
session_start ();
$langue = $_SESSION['language'];

// On détruit les variables de notre session
session_unset ();


// On redirige l'utilisateur vers la page d'accueil
if ($langue =='fr'){
    header ('location: ../Views/connexion.php?deco=true');
} else {
    header ('location: ../Views/english/connexion.php?deco=true');
}
?> 
