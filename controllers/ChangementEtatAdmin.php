<?php

session_start();

require_once __DIR__.'/../Models/capteurs.php';

$etat = $_POST['etat'];
$id = $_POST['id'];

if($etat=='component-on'){
    $etat = 0;
}
else{
    $etat = 1;
}

ModifEtatCapteur($id,$etat);
ModifEtatControleur($id,$etat);

?>