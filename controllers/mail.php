<?php
require_once('../vendor/autoload.php');

function EnvoiMailInscription ($email,$prenom) {

    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
        ->setUsername('no.reply.domisep@gmail.com')
        ->setPassword('domisep1997');

    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message('Domisep'))
       ->setFrom('no.reply.domisep@gmail.com')
       ->setTo([$email])
       ->setSubject('Inscription Domisep')
       ->setBody(" Bonjour $prenom,

       Bienvenue sur Domisep ! Votre compte a été créé avec succès.  
       

       
       Ce mail a été généré automatiquement. Veuillez ne pas répondre.");
    return $mailer->send($message);
}

function SendMailRegistration ($email,$prenom) {

    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
        ->setUsername('no.reply.domisep@gmail.com')
        ->setPassword('domisep1997');

    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message('Domisep'))
       ->setFrom('no.reply.domisep@gmail.com')
       ->setTo([$email])
       ->setSubject('Registration Domisep')
       ->setBody(" Hello $prenom,

       Welcome on Domisep ! Your account has been created successfully.
       

       
       This email has been generated automatically. Please don't answer.");
    return $mailer->send($message);
}

function MailMdpOublie ($email,$nouveau,$prenom) {

    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
        ->setUsername('no.reply.domisep@gmail.com')
        ->setPassword('domisep1997');

    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message('Domisep'))
       ->setFrom('no.reply.domisep@gmail.com')
       ->setTo([$email])
       ->setSubject('Mot de passe oublié Domisep')
       ->setBody(" Bonjour,

    Vous avez fait une demande de mot de passe oublié. Voici votre nouveau mot de passe : $nouveau . 
       
    Vous pouvez le modifier dans vos informations client sur votre compte.
       

       
    Ce mail a été généré automatiquement. Veuillez ne pas répondre.");
    return $mailer->send($message);
}

function ForgottenPassword($email,$nouveau,$prenom) {

    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
        ->setUsername('no.reply.domisep@gmail.com')
        ->setPassword('domisep1997');

    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message('Domisep'))
       ->setFrom('no.reply.domisep@gmail.com')
       ->setTo([$email])
       ->setSubject('Forgotten password Domisep')
       ->setBody(" Hello,

    You made a request of forgotten password. Here is you new password : $nouveau.

    You can modify it in your user information on your account.

       
    This email has been generated automatically. Please don't answer.");
    return $mailer->send($message);
}
?>