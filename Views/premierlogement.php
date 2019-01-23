<?php 

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
        <link rel="stylesheet" href="../css/premierlogement.css" />
        <title>Domisep - Premier Logement</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <?php include('header_user.php') ?>
    </head>

    <body>
        
    <section>
    	<div id="logement">    
                <p> <span> Bienvenue sur Domisep ! </span> <br/> Vous pouvez dès à présent créer votre premier logement </p>
                <div class="ajoutlogement">
                    <a href="../Views/AjoutLogement.php"> +  Ajouter un logement </a>
                </div>
        </div>	

        
    </section>
    
</body>
</html>