<?php
session_start();
$_SESSION['language'] ='en';

if (isset($_GET['user']) && $_GET['user'] != '') {
    $_SESSION['selected_user'] = $_GET['user'];
}

if(!isset($_SESSION["connexion"]) || $_SESSION["connexion"] == 0) {
    header("Location: connexion.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../css/AjoutLogement.css" />
    <title>Domisep - Add a home</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>
            
    		<a href="../english/listelogements.php">  < Back	
            </a>
    	</p>
    	</div>
		<h1> Add a home</h1>
		<div class="formulaire">
			<form method="post" action="../../controllers/FormulaireAjoutLogement.php">
   				<p>
       				<input type="text" name="nom" placeholder="Name " required/>
      				<input type="text" name="adresse" placeholder="Address" required />
       				<input type="text" name="codepostale" placeholder="Zipcode" required />
       				<input type="text" name="surface" placeholder="Surface" required>
       				<select name="pays" required>
       					<option value="france"> France </option>
       					<option value="royaume-uni"> United Kingdom </option>
       					<option value="espagne"> Spain </option>
       					<option value="italie"> Italy </option>
       					<option value="etats-unis"> United States </option>
       					<option value="canada"> Canada </option>
       					<option value="chine"> China </option>
       					<option value="japon"> Japan </option>     	
       				</select>
       				<input type="submit" value="Next">
   				</p>
			</form>
		</div>
    </section>
    
</body>


