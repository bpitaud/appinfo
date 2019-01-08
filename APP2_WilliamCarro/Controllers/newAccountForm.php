<?php

session_start();

require_once("..Models/database.php");
require_once("..Models/users.php");

$login = $passeword = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = test_input($_POST["Login"]);
    $passeword = test_input($_POST["Passeword"]);
    $confirmPasseword = test_input($_POST["Repeat_passeword"]);
    $loginExist = logingExisting($login);
    if ($passeword == $confirmPasseword && !$loginExist && strlen($login)>=10) {
        addUsers($login, Passewordhache($passeword));   
        header('Location: ..Views/Connexion/connexion.php');
    }
     else {
        echo "les mots de passe ne correspondent pas ou l'adresse mail existe déjà";
        header('Location: ..Views/NewAccount/createAnAccount.php');
     }

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>