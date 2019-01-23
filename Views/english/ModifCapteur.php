<?php
session_start();
$_SESSION['language'] ='en';

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
    <link rel="stylesheet" href="../../css/ModifCapteurs.css" />
    <title>Domisep - Modification of a sensor</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>
            <?php
            echo'
    		<a href="../english/listecapteurs.php?piece='.$_SESSION['selected_piece'].'">  < Back	
            </a>';
            ?>
    	</p>
        </div>
        <?php 
        require ('../../controllers/ModifCapteurs.php');
        $capteur = RecupCapteurID($_SESSION['selected_capteur']);
        echo' 
        <h1>Modification of the sensor : '.$capteur[0][0].' <span>.................</span></h1>';   
        ?>
		<div class="formulaire">
			<form method="post" action="../../controllers/ModifCapteurs.php">
                    <div class = bouton>
                       <input type="text" name="nom" placeholder="Nom of the sensor" /> 
                       <?php
                       echo '
                    <a type="submit" href="../english/listecapteurs.php?piece='.$_SESSION['selected_piece'].'">Cancel</a>'; ?>
                    <input type="submit" value="Submit">
                    </div>
</form>
                
                <div class="bouton1">
                    <form action="../../controllers/SuppCapteurUser.php?capteur=<?php echo $_SESSION['selected_capteur'] ?>" 
                    method="get" onsubmit="return confirm
                    ('Are you sure you want to delete this sensor?')">
                        <input  value="Delete" type="submit">
                    </form>   
                </div>
                </div>        
                	
    </section>
    
</body>
</html>
