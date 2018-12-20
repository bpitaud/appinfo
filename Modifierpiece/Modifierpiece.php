<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="Modifierpiece.css" />
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
    		<a href="../Liste logements/listelogements.php">  < Retour	
    		</a>
    	</p>
    	</div>
		<h1>Modifier une pièce: NOM DE LA PIÈCE<span>.................</span></h1>
		<div class="formulaire">
			<form method="post" action="../controllers/XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX.php">
   				<p>
       				<input type="text" name="nom" placeholder="Nom de la pièce" required/>
      				<input type="text" name="adresse" placeholder="Superficie" required />
              <div id="bouton">
         
                <a type="submit" href="../Liste logements/listelogements.php">Annuler</a>
                    <a type="submit" href="../Menu/Menu.php"></a>
         				<input type="submit" value="Supprimer">
         			<input type="submit" value="Valider">

              
            </div>
   				</p>
			</form>
		</div>
	</section>
</body>


