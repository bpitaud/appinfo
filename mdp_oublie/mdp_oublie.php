<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="mdp_oublie.css" />
    <title>Mot de passe oublié</title>
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
    		<a href="../Liste capteurs/listecapteurs.php"> < Retour		
    		</a>
    	</p>
    	</div>
		<h1>Mot de passe oublié<span>.................</span></h1>
		<div class="formulaire">
			<form method="post" action="../controllers/FormulaireAjoutCapteur.php">
   				<p>
       				<input type="email" name="email" placeholder="Veuillez rentrer votre adresse mail" required/>
       				<input type="submit" value="Suivant">
   				</p>
			</form>
		</div>
    </section>
    
    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>