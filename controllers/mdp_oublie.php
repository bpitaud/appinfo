<?php
require_once __DIR__.'/../Models/user.php';
require_once("../controllers/mail.php");

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


session_start();

$langue = $_SESSION['language'];

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 9; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])){
    $email = test_input($_POST["email"]);
    }
    $CheckEmail = Verif_email($email);
    if ($CheckEmail) {
        $nouveau = randomPassword();
        $modif = ModifMdpOubli($email, $nouveau);
        if ($modif){
            if ($langue =='fr'){
                $envoi_email= MailMdpOublie ($email,$nouveau,$prenom);
            } else {
                $send_email= ForgottenPassword($email,$nouveau,$prenom);
            }
            if ($send_email or $envoi_email){
                if ($langue =='fr'){
                    header('Location: ../Views/mdp_oublie.php?envoi=ok');                   
                    } else {
                    header('Location: ../Views/english/mdp_oublie.php?envoi=ok'); 
                    }     
            } else {
                if ($langue =='fr'){
                    header('Location: ../Views/mdp_oublie.php?envoi=error');
                } else {
                    header('Location: ../Views/english/mdp_oublie.php?envoi=error');
                }    
            }
        } else {
            if ($langue =='fr'){
                header('Location: ../Views/mdp_oublie.php?envoi=echec');
            } else {
                header('Location: ../Views/english/mdp_oublie.php?envoi=echec');
            } 
        }
    } 
}
?>
