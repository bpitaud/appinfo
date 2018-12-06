<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="connexion.css" />
    <title>connexion</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

	<header>
        <div class="wrapper">
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <li><a href="../Liste logements/listelogements.php"><span>Home</span></a></li>
                    <div class="creationcompteheader">
                            <a href="../Inscription/inscription.php"> Créer un Compte </a>
                            
                    </div>
                    <div class="connexionheader">
                        <a href="../connexionn/connexion.php"> Se connecter </a> </div>

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
   				<p>
       				<input type="text" name="adressemail" placeholder="Entrer votre adresse mail" required/>
      				<input type="text" name="motdepasse" placeholder="Entrer votre mot de passe" required />
                    <input type="submit" value="Suivant">
   				</p>
			</form>
        </div>
    <div class="motdepasse"> 
        <a href="envoimail.php"> Mot de passe oublié </a> 
    </div>
    <div class="inscription">            
    <a href="../Inscription/inscription.php"> Créer un Compte </a>
    </div>
</body>    