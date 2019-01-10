<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="AjoutCapteur.css" />
    <title>Add sensor</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

	<header>
        <div class="wrapper">
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <li><a href="..Liste logements/ENlistelogements.php"><span>Home</span></a></li>
                    <li>
                        <div class="dropdownLang">
                            <div class="noHover">
                                <p>EN</p>
                            </div>
                            <div class="hover">
                                <p>EN</p>
                                <a href="../AjoutCapteur/ENAjoutCapteur"> FR </a>
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
                                <a href="../mesInfosUser/ENMesInfosUser.php"><p>My infos</p></a>
                                <a href="../NousContacter/ENNousContacter.php"><p>Contact</p></a>
                                <a href="../controllers/ENdeconnexion.php"><p id="borderNone">Log out</p></a>
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
    		<a href="../Liste capteurs/ENlistecapteurs.php"> < Back		
    		</a>
    	</p>
    	</div>
		<h1>Add a sensor<span>.................</span></h1>
		<div class="formulaire">
			<form method="post" action="../controllers/FormulaireAjoutCapteur.php">
   				<p>
       				<input type="text" name="nom" placeholder="Sensor name" required/>
      				<input type="text" name="number" placeholder="Serial number" required />
       				<select name="type" required>
       					<option value="lumiere"> Light </option>
						<option value="camera"> Surveillance camera </option>
						<option value="humidite"> Humidity </option> 
						<option value="temperature"> Temperature </option>
						<option value="chauffage"> Heating </option>
                        
						      	
       				</select>
       				<input type="submit" value="Next">
   				</p>
			</form>
		</div>
    </section>
    
    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>