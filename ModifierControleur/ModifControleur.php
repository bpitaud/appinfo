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
    <link rel="stylesheet" href="ModifControleur.css" />
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
    		<a href="../Liste capteurs/listecapteurs.php">  < Retour	
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
   				<p>
       				<input type="text" name="nom" placeholder="Nom du capteur" /> </p>			      	
                <div id="bouton">
                    <a type="submit" href="../Liste capteurs/listecapteurs.php">Annuler</a>
                    <input type="submit" value="Valider">
                </div>
   		    </form>
            
               <div id="bouton">
                    <form action="../controllers/SuppCapteur.php?capteur=<?php echo $_SESSION['selected_capteur'] ?>" 
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
