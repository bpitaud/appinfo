<?php 
session_start();
$_SESSION['language'] ='fr';

if (isset($_GET['user']) && $_GET['user'] != '') {
    $_SESSION['selected_user'] = $_GET['user'];
}

// if(!isset($_SESSION["connexion"]) or $_SESSION["connexion"] = 0  or empty($_SESSION["connexion"])) {
//     header("Location: connexion.php");
// }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/NouveauMdpAdmin.css" />
    <title>Rénitialisation de mot de passe </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_admin.php') ?>
</head>
<body>

<?php
    echo'
    <nav>
    	<a href="../Views/Menu.php?user='.$_SESSION['selected_user'].'">Menu</a>/<a href="../Views/Compte_Admin.php?user='.$_SESSION['selected_user'].'">Compte</a>/<span id="compte_link">Réinitialisation</span>
    </nav>';
    ?>

    <section>

		<h1>Rénitialisation de mot de passe </h1>
		<div class="formulaire">
			<form method="post" action="../controllers/NouveauMdpAdmin.php">
   				<p>
       				<input type="password" name="ancien_mdp" placeholder="Ancien Mot de Passe" />
       				<input type="password" name="nouveau_mdp" placeholder="Nouveau Mot de Passe" >
       				<input type="submit" value="Suivant">
   				</p>
			</form>
		</div>
    </section>
    
</body>