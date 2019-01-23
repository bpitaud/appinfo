<?php
session_start();
$_SESSION['language'] ='en';

if (isset($_GET['log']) && $_GET['log'] != '') {
    $_SESSION['selected_logement'] = $_GET['log'];
}
if(!isset($_SESSION["connexion"]) || $_SESSION["connexion"] == 0) {
    header("Location: connexion.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../css/AjoutPiece.css" />
    <title>Domisep - Add a room</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>
            <?php
            echo'
    		<a href="../english/listepieces.php?log='.$_SESSION['selected_logement'].'"> < Back	
            </a>';
            ?>
    	</p>
    	</div>
		<h1>Add a room<span>............</span></h1>
		<div class="formulaire">
			<form method="post" action="../../controllers/FormulaireAjoutPiece.php">
   				<p>
       				<input type="text" name="nom" placeholder="Name of the room" required/>
       				<input type="text" name="surface" placeholder="Surface of the room" required >
       				<input type="submit" value="Next">
   				</p>
			</form>
		</div>
    </section>
    
</body>