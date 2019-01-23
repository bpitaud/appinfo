<?php 
//error_reporting(0);
session_start();
$_SESSION['language'] ='fr';

if(!isset($_SESSION["connexion"]) || $_SESSION["connexion"] == 0) {
    header("Location: connexion.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/NousContacter.css" />
        <title>Domisep - Nous contacter</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <?php include('header_user.php') ?>
    </head>
    

    <body>
        
    <section>
        <h2>Nous contacter</h2>
        <div id="page">
            <div class="ligne">

		        <div id="coneteneur1">
                    <p><a href="https://www.google.com/maps/place/28+Rue+Notre+Dame+des+Champs,+75006+Paris/@48.8453523,2.32588,17z/data=!3m1!4b1!4m5!3m4!1s0x47e671ce3fd4afd3:0xb729389a530d1380!8m2!3d48.8453488!4d2.3280687"> 28 rue Notre-Dame des champs,</br> Paris, 75006,France</a></p>
                </div>
            </div>

        <div class="ligne">
            <div id="coneteneur2">
                <p>+33 (0) 1 55 09 24 92</p>
            </div>
        </div>
        <div class="ligne">
            <div id="coneteneur3">
                <p><a href="mailto:no.reply.domisep@gmail.com">no.reply.domisep@gmail.com</a></p>
            </div>
        </div>


        </div>   

    </section>
    
</body> 
</html>