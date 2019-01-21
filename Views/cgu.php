<?php
session_start();
// if(!isset($_SESSION["connexion"]) or $_SESSION["connexion"] = 0  or empty($_SESSION["connexion"])) {
//     header("Location: connexion.php");
// }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/cgu.css" />
    <title>Domisep - Conditions Générales d'Utilisation</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>

<body>
<header>
<h1>DOMISEP</h1>
</header> 


    <section>
    	<div class="retour">
            <a href="javascript:history.go(-1)">< Retour</a>
    	    <!-- <form>
                <input type = "button" value = "Retour"  onclick = "history.go(-1)">
            </form>  -->
        </div>
        <h1>Conditions Générales d'utilisation</h1>
        
		
    </section>
    
</body>
</html>