<?php
session_start();

if (isset($_GET['user']) && $_GET['user'] != '') {
    $_SESSION['selected_user'] = $_GET['user'];
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
    <link rel="stylesheet" href="../css/AjoutLogement.css" />
    <title>Domisep - Ajout d'un Logement</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>
            
    		<a href="../Views/listelogements.php">  < Retour	
            </a>
    	</p>
    	</div>
		<h1> Ajouter un logement</h1>
		<div class="formulaire">
			<form method="post" action="../controllers/FormulaireAjoutLogement.php">
   				<p>
       				<input type="text" name="nom" placeholder="Nom du logement" required/>
      				<input type="text" name="adresse" placeholder="Adresse du logement" required />
       				<input type="text" name="codepostale" placeholder="Code postale" required />
       				<input type="text" name="surface" placeholder="Surface du logement" required>
       				<select name="pays" required>
       					<option value="france"> France </option>
       					<option value="royaume-uni"> Royaume-Uni </option>
       					<option value="espagne"> Espagne </option>
       					<option value="italie"> Italie </option>
       					<option value="etats-unis"> Etats-Unis </option>
       					<option value="canada"> Canada </option>
       					<option value="chine"> Chine </option>
       					<option value="japon"> Japon </option>     	
       				</select>
       				<input type="submit" value="Suivant">
   				</p>
			</form>
		</div>
    </section>
    
</body>


