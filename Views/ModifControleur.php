<?php
session_start();

if (isset($_GET['capteur']) && $_GET['capteur'] != '') {
    $_SESSION['selected_capteur'] = $_GET['capteur'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/ModifControleur.css" />
    <title>Ajout d'un Logement</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>
    		<a href="../Views/listecapteurs.php">  < Retour	
    		</a>
    	</p>
    	</div>
		<?php 
        require ('../controllers/ModifControleurs.php');
        $controleur = RecupControleurID($_SESSION['selected_capteur']);
        echo' 
        <h1>Modifier un capteur: '.$controleur[0][1].' <span>.................</span></h1>';   
        ?>
		<div class="formulaire">
        <form method="post" action="../controllers/ModifControleurs.php">
                    <div class = bouton>
       				<input type="text" name="nom" placeholder="Nom du capteur" /> 
                    <a type="submit" href="../listecapteurs.php">Annuler</a>
                    <input type="submit" value="Valider">
                    </div>
</form>
                
                <div class="bouton1">
                    <form action="../controllers/SuppCapteurUser.php?capteur=<?php echo $_SESSION['selected_capteur'] ?>" 
                    method="get" onsubmit="return confirm
                    ('Etes-vous sûr de vouloir supprimer ce capteur?')">
                        <input  value="Supprimer" type="submit">
                    </form>   
                </div>
		</div>
    </section>
    
    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>
</html>
