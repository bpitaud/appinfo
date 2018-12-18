<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="réuni.css" />
        <title>Domisep - Réinitialisation mot de passe</title>
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

    <h1> Réinitialiser le mot de passe </h1>
    <div class="formulaire">
    <form method="post" action="../controllers/FormulaireConnexion.php">
   				<p>
       				<input type="password" name="ancienmdp" placeholder="Entrer votre ancier mot de passe" required/>
      				<input type="password" name="newmdp" placeholder="Entrer votre nouveau mot de passe" required />
                    <input type="submit" name="connexion" value="Suivant">
   				</p>
			</form>
        </div>
    <div class="motdepasse"> 
        <a href="envoimail.php"> Mot de passe oublié </a> 
    </div>
</body>    

    
