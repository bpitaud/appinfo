<?php
session_start();

if (isset($_GET['piece']) && $_GET['piece'] != '') {
    $_SESSION['selected_piece'] = $_GET['piece'];
}

// if(!isset($_SESSION["connexion"]) or $_SESSION["connexion"] = 0  or empty($_SESSION["connexion"])) {
//     header("Location: connexion.php");
// }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/AjoutCapteur.css" />
    <title>Domisep - Ajout d'un Capteur</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>
            <?php
            echo'
    		<a href="../Views/listecapteurs.php?piece='.$_SESSION['selected_piece'].'"> < Retour		
            </a>';
            ?>
    	</p>
    	</div>
		<h1>Ajouter un capteur<span>.................</span></h1>
		<div class="formulaire">
			<form method="post" action="../controllers/FormulaireAjoutCapteur.php">
   				<p>
       				<input type="text" name="nom" placeholder="Nom du capteur" required/>
      				<input type="text" name="number" placeholder="Numéro de série" required />
       				<select name="type" required>
       					<option value="lumiere"> Lumière </option>
						<option value="camera"> Caméra de surveillance </option>
						<option value="humidite"> Humidité </option> 
						<option value="temperature"> Température </option>
						<option value="chauffage"> Chauffage </option>
                        
						      	
       				</select>
       				<input type="submit" value="Suivant">
   				</p>
			</form>
		</div>
    </section>
    
</body>
</html>