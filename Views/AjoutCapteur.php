<?php
session_start();

if (isset($_GET['piece']) && $_GET['piece'] != '') {
    $_SESSION['selected_piece'] = $_GET['piece'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/AjoutCapteur.css" />
    <title>Ajout d'un Capteur</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

	<header>
        <div class="wrapper">
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <li><a href="../Views/listelogements.php"><span>Home</span></a></li>
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
                                <a href="../Views/MesInfosUser.php"><p>Mes infos</p></a>
                                <a href="../Views/NousContacter.php"><p>Contacter</p></a>
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
    
    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>