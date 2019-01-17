<?php
require_once './vendor/autoload.php';

function EnvoiMailInscription ($email,$nom,$prenom) {

    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')
        ->setUsername('no-reply-domisep@gmail.com')
        ->setPassword('password');

    $mailer = Swift_Mailer::newInstance($transport);
    $message = Swift_Message::newInstance('Our Code World Newsletter')
       ->setFrom(array('no-reply-domisep@gmail.com' => 'Domisep'))
       ->setTo(array("'.$email.'" => "'.$prenom' '.$nom'"))
       ->setSubject('Inscription Domisep')
       ->setBody(" Bonjour '.$prenom' , <br></br> Bienvenue sur Domisep ! Votre compte a été créé avec succès. <br></br> Ce mail a été généré automatiquement. Veuillez ne pas répondre.");
    $result = $mailer->send($message);
}

?>