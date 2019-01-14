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
    		<a href="../connexionn/connexion.php"> < Retour		
    		</a>
    	</p>
    	</div>
        <h1>Mot de passe oublié<span>.................</span></h1>
        
        <?php
                $envoi= $_GET['envoi'];
                if (isset($envoi)) {
                    if ($envoi == "ok") {
                        echo "<p style='color:white;'>Vous avez reçu un nouveau mot de passe par mail.</p>";
                    } else if ($envoi =="error") {
                        echo "<p style='color:red;'>L'adresse email est erronée.</p>";
                    } else if ($envoi == "echec"){
                        echo "<p style='color:red;'>L'envoi du mail a échoué. Veuillez réessayer.</p>";
                    }
                }
                ?>

		<div class="formulaire">
			<form method="post" action="../controllers/mdp_oublie.php">
   				<p>
       				<input type="email" name="email" placeholder="Veuillez rentrer votre adresse mail"/>
       				<input type="submit" value="Suivant">
   				</p>
			</form>
		</div>
    </section>
    
    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>