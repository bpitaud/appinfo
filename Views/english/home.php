<?php
error_reporting(0);
session_start();
$_SESSION['language'] ='en';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(!isset($_SESSION["connexion"]) || $_SESSION["connexion"] == 0) {
    header("Location: connexion.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../css/home.css" />
    <title>Domisep - Accueil</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

	<header>
        <div class="wrapper">
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <div class="creationcompteheader">
                            <a href="../english/inscription.php"> Create an account</a>
                            
                    </div>
                    <div class="connexionheader">
                        <a href="../english/connexion.php"> Login </a> </div>

                    <li>
                        <div class="dropdownLang">
                            <div class="noHover">
                                <p>EN</p>
                            </div>
                            <div class="hover">
                                <p>EN</p>
                                <a href="../home.php"> FR </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <body>
        <h1 id="titre"> Keep the control <br> of your home </h1>

        <?php
                $supp = test_input($_GET['supp']);
                if (isset($supp)) {
                    if ($supp == "true") {
                        echo "<p style='color:white;'>Your account has been deleted.</p>";
                    } else if ($supp == "false") {
                        echo "<p style='color:red;'>Your account hasn't been deleted.</p>";
                    }
                }
                ?>
        
        <a href="#service"><p> Who are we ? </p> </a>
        <a href="#contact"><p> Contact us</p> </a>

<div id="service">
        <h2 > Nos services </h2>
        <p>Sed fruatur sane hoc solacio atque hanc insignem ignominiam, quoniam uni praeter se inusta sit, putet esse leviorem, dum modo, cuius exemplo se consolatur, eius exitum expectet, praesertim cum in Albucio nec Pisonis libidines nec audacia Gabini fuerit ac tamen hac una plaga conciderit, ignominia senatus.
Denique Antiochensis ordinis vertices sub uno elogio iussit occidi ideo efferatus, quod ei celebrari vilitatem intempestivam urgenti, cum inpenderet inopia, gravius rationabili responderunt; et perissent ad unum ni comes orientis tunc Honoratus fixa constantia restitisset.
Et quia Mesopotamiae tractus omnes crebro inquietari sueti praetenturis et stationibus servabantur agrariis, laevorsum flexo itinere Osdroenae subsederat extimas partes, novum parumque aliquando temptatum commentum adgressus. quod si impetrasset, fulminis modo cuncta vastarat. erat autem quod cogitabat huius modi.</p>

</div>

<div id="contact">
        <h2 > Contact </h2>
        <div id="page">
            <div class="ligne">

                <div id="coneteneur1">
                    <p><a href="https://www.google.com/maps/place/28+Rue+Notre+Dame+des+Champs,+75006+Paris/@48.8453523,2.32588,17z/data=!3m1!4b1!4m5!3m4!1s0x47e671ce3fd4afd3:0xb729389a530d1380!8m2!3d48.8453488!4d2.3280687"> 28 rue Notre-Dame des champs, Paris 75006, France</a></p>
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

</div>


<footer>
    <p> WEBAC © All rights reserved | <a href="../Views/Mentions_legales.php" ><span>Legal Notice</span> </a> | <a href = "../english/cgu.php" ><span>Terms of service</span></a></p>
</footer>

</body>    

