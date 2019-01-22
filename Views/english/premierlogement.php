<?php 

session_start();
$_SESSION['language'] ='en';

// if(!isset($_SESSION["connexion"]) or $_SESSION["connexion"] = 0  or empty($_SESSION["connexion"])) {
//     header("Location: connexion.php");
// }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../css/premierlogement.css" />
        <title>Domisep - First home</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <?php include('header_user.php') ?>
    </head>

    <body>
        
    <section>
    	<div id="logement">    
                <p> <span> Welcome on Domisep ! </span> <br/> You can now add your first home. </p>
                <div class="ajoutlogement">
                    <a href="../english/AjoutLogement.php"> +  Add a home </a>
                </div>
        </div>	

        
    </section>
    
</body>
</html>