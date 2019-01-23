<?php
session_start();

if (isset($_GET['log']) && $_GET['log'] != '') {
    $_SESSION['selected_logement'] = $_GET['log'];
}

$_SESSION['language'] ='fr';

if(!isset($_SESSION["connexion"]) || $_SESSION["connexion"] == 0) {
    header("Location: connexion.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/AjoutPiece.css" />
    <title>Domisep - Ajout d'une pièce</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>
            <?php
            echo'
    		<a href="../Views/listepieces.php?log='.$_SESSION['selected_logement'].'"> < Retour		
            </a>';
            ?>
    	</p>
    	</div>
		<h1>Ajouter une pièce<span>............</span></h1>
		<div class="formulaire">
			<form method="post" action="../controllers/FormulaireAjoutPiece.php">
   				<p>
       				<input type="text" name="nom" placeholder="Nom de la pièce" required/>
       				<input type="text" name="surface" placeholder="Surface de la pièce" required >
       				<input type="submit" value="Suivant">
   				</p>
			</form>
		</div>
    </section>
    
</body>