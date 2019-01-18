<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/connexion.css" />
    <title>connexion</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

	<header>
        <div class="wrapper">
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <li><a href="../Views/connexion.php"><span>Home</span></a></li>
                    <div class="creationcompteheader">
                            <a href="../Views/inscription.php"> Créer un Compte </a>
                            
                    </div>
                    <div class="connexionheader">
                        <a href="../Views/connexion.php"> Se connecter </a> </div>

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
                </ul>
            </nav>
        </div>
    </header>
    <h1> Se connecter </h1>
    <div class="formulaire">
    <form method="post" action="../controllers/FormulaireConnexion.php">
    <?php
		try {
			$error = $_GET['connexion'];
			if (isset($error) && $error == "error") {
				echo "<p style='color:red'>Email ou mot de passe incorrect.</p>";
			}
		} catch (Exception $e) {}
	?>
   				<p>
       				<input type="text" name="email" placeholder="Entrer votre adresse mail" required/>
      				<input type="password" name="mdp" placeholder="Entrer votre mot de passe" required />
                    <input type="submit" name="connexion" value="Suivant">
   				</p>
			</form>
        </div>
    <div class="motdepasse"> 
        <a href="../Views/mdp_oublie.php"> Mot de passe oublié </a> 
    </div>

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>    