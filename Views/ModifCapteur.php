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
    <link rel="stylesheet" href="../css/ModifCapteurs.css" />
    <title>Ajout d'un Logement</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>
            <?php
            echo'
    		<a href="../Views/listecapteurs.php?piece='.$_SESSION['selected_piece'].'">  < Retour	
            </a>';
            ?>
    	</p>
        </div>
        <?php 
        require ('../controllers/ModifCapteurs.php');
        $capteur = RecupCapteurID($_SESSION['selected_capteur']);
        echo' 
        <h1>Modification du capteur : '.$capteur[0][0].' <span>.................</span></h1>';   
        ?>
		<div class="formulaire">
			<form method="post" action="../controllers/ModifCapteurs.php">
                    <div class = bouton>
       				<input type="text" name="nom" placeholder="Nom du capteur" /> 
                    <a type="submit" href="../Views/listecapteurs.php">Annuler</a>
                    <input type="submit" value="Valider">
                    </div>
</form>
                
                <div class="bouton1">
                    <form action="../controllers/SuppCapteur.php?capteur=<?php echo $_SESSION['selected_capteur'] ?>" 
                    method="get" onsubmit="return confirm
                    ('Etes-vous sûr de vouloir supprimer ce capteur?')">
                        <input  value="Supprimer" type="submit">
                    </form>   
                </div>
                </div>        
                	
    </section>
    
    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>
</html>
