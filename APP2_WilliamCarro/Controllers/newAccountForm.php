<?php

session_start();

require_once("..Models/database.php");
require_once("..Models/users.php");

$login = $password = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = test_input($_POST["Login"]);
    $password = test_input($_POST["Passeword"]);
    $confirmPasseword = test_input($_POST["Repeat_passeword"]);
    $loginExist = logingExisting($login);
    if ($password == $confirmPasseword && !$loginExist && strlen($login)>=10) {
        addUsers($login, Passewordhache($password));   
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