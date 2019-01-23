<?php
session_start();
$_SESSION['language'] ='fr';
if (isset($_GET['capteur']) && $_GET['capteur'] != '') {
    $_SESSION['selected_capteur'] = $_GET['capteur'];
}
if(!isset($_SESSION["connexion"]) || $_SESSION["connexion"] == 0) {
    header("Location: connexion.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/ModifControleur.css" />
    <title>Domisep - Modification d'un Capteur </title>
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
                       <?php
                       echo '
                    <a type="submit" href="../Views/listecapteurs.php?piece='.$_SESSION['selected_piece'].'">Annuler</a>'; ?>
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

    
</body>
</html>
