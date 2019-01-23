<?php
session_start();
$_SESSION['language'] ='en';

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
    <link rel="stylesheet" href="../../css/AjoutCapteur.css" />
    <title>Domisep - Add a sensor</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>
            <?php
            echo'
    		<a href="../english/listecapteurs.php?piece='.$_SESSION['selected_piece'].'"> < Back		
            </a>';
            ?>
    	</p>
    	</div>
		<h1>Add a sensor<span>.......</span></h1>
		<div class="formulaire">
			<form method="post" action="../../controllers/FormulaireAjoutCapteur.php">
   				<p>
       				<input type="text" name="nom" placeholder="Sensor name" required/>
      				<input type="text" name="number" placeholder="Sensor number" required />
       				<select name="type" required>
       					<option value="lumiere"> Light </option>
						<option value="camera"> Security camera </option>
						<option value="humidite"> Humidity </option> 
						<option value="temperature"> Temperature </option>
						<option value="chauffage"> Heating </option>
                        
						      	
       				</select>
       				<input type="submit" value="Next">
   				</p>
			</form>
		</div>
    </section>
    
</body>
</html>