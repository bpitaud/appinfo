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
    <link rel="stylesheet" href="ModifCapteurs.css" />
    <title>Ajout d'un Logement</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

	<header>
        <div class="wrapper">
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <li><a href="../Liste logements/listelogements.php"><span>Home</span></a></li>
                    <li>
                        <div class="dropdownLang">
                            <div class="noHover">
                                <p>FR</p>
                            </div>
                            <div class="hover">
                                <p>FR</p>
                                <a href="english.html"> EN </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <div id="noHoverUser">
                                    <button class="boutonmenuprincipal"><p></p></button>
                            </div>
                            <div id="hoverUser">
                                <button class="boutonmenuprincipal"><p></p></button>
                                <a href="../mesInfosUser/MesInfosUser.php"><p>Mes infos</p></a>
                                <a href="../NousContacter/NousContacter.php"><p>Contacter</p></a>
                                <a href="../controllers/deconnexion.php"><p id="borderNone">Deconnexion</p></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section>
    	<div class="retour">
    		<p>
            <?php
            echo'
    		<a href="../Liste capteurs/listecapteurs.php?piece='.$_SESSION['selected_piece'].'">  < Retour	
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
                    <a type="submit" href="../Liste capteurs/listecapteurs.php">Annuler</a>
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
