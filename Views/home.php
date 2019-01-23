<?php
//error_reporting(0);
session_start();
$_SESSION['language'] ='fr';
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/home.css" />
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
                            <a href="../Views/inscription.php"> Créer un Compte </a>
                            
                    </div>
                    <div class="connexionheader">
                        <a href="../Views/connexion.php"> Se connecter </a> </div>

                    <li>
                        <div class="dropdownLang">
                            <div class="noHover">
                                <p>FR</p>
                            </div>
                            <div class="hover">
                                <p>FR</p>
                                <a href="../Views/english/home.php"> EN </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <body>
        <h1 id="titre"> Gardez le contrôle <br> de votre logement </h1>

        <?php
                $supp = test_input($_GET['supp']);
                if (isset($supp)) {
                    if ($supp == "true") {
                        echo "<p style='color:white;'>Votre compte a bien été supprimé.</p>";
                    } else if ($supp == "false") {
                        echo "<p style='color:red;'>Votre compte n'a pas été supprimé.</p>";
                    }
                }
                ?>
        
        <a href="#service"><p> Que faisons-nous ? </p> </a>
        <a href="#contact"><p> Nous contacter </p> </a>

<div id="service">
        <h2 > Nos services </h2>
        <p>Domisep est une entreprise de domotique et, grâce à nos services, vous pouvez dès à présent équiper votre domicile pour avoir une maison connectée.<br/> Avec nos capteurs et controleurs, vous pourrez contrôler à distance de nombreuses fonctions de votre logement.            Vos lumières et vos caméras  seront activables à distance.<br/> Vous pouvez aussi connaitre l'humidité et la température de votre logement ainsi que changer le niveau de chauffage à distance. <br/>
        Domisep vous accompagne dans votre gestion quotidienne.
        Notre Service Après Vente est disponible 24h/24 afin de faciliter votre expérience client.</p>

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
    <p> WEBAC © Tous droits réservés |<a href="../Views/Mentions_legales.php" ><span> Mentions légales </span> </a> | <a href = "../Views/cgu.php" ><span>CGU </span></a></p>
</footer>
</body> 
</html>
