<?php
require_once './vendor/autoload.php';

function EnvoiMailInscription ($email,$nom,$prenom) {

    $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')->setUsername('no-reply-domisep@gmail.com')->setPassword('domisep123');

    $mailer = \Swift_Mailer::newInstance($transport);
    $message = \Swift_Message::newInstance('Our Code World Newsletter');
       ->setFrom(array("no-reply-domisep@gmail.com" => "Domisep"));
       ->setTo(array("mail@email.com" => "mail@mail.com"));
       ->setBody("<h1>Welcome</h1>", 'text/html');
    $result = $mailer->send($message);
// Create the mail transport configuration
$transport = Swift_MailTransport::newInstance();

// Create the message
$message = Swift_Message::newInstance();
$message->setTo("'.$email.' => '.$prenom' '.$nom'");
$message->setSubject("Inscription Domisep");
$message->setBody(" Bonjour '.$prenom' , Bienvenue sur Domisep ! Votre compte a été créé avec succès. 

Ce mail a été généré automatiquement. Veuillez ne pas répondre.")

// Send the email
$mailer = Swift_Mailer::newInstance($transport);
$mailer->send($message);
}

?>