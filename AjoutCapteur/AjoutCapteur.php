<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="AjoutCapteur.css" />
    <title>Ajout d'un Capteur</title>
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
                                <a href="MesInfos.html"><p>Mes infos</p></a>
                                <a href="NousContacter.html"><p>Contacter</p></a>
                                <a href="Accueil.html"><p id="borderNone">Deconnexion</p></a>
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
    		<a href="../Liste capteurs/listecapteurs.php"> < Retour		
    		</a>
    	</p>
    	</div>
		<h1>Ajouter un capteur<span>.................</span></h1>
		<div class="formulaire">
			<form method="post" action="../controllers/FormulaireAjoutCapteur.php">
   				<p>
       				<input type="text" name="name" placeholder="Nom du capteur" required/>
      				<input type="text" name="number" placeholder="Numéro de série" required />
       				<select name="type" required>
       					<option value="lumière"> Lumière </option>
						<option value="caméra de surveillance"> Caméra de surveillance </option>
						<option value="humidité"> Humidité </option> 
						<option value="température"> Température </option>
						<option value="chauffage"> Chauffage </option>
						      	
       				</select>
       				<input type="submit" value="Suivant">
   				</p>
			</form>
		</div>
	</section>
</body>