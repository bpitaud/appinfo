<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="ModifierLogement.css" />
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
		<h1>Modifier un logement: NOM DU LOGEMENT<span>.................</span></h1>
		<div class="formulaire">
			<form method="post" action="../controllers/XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX.php">
   				<p>
       				<input type="text" name="nom" placeholder="Nom du logement" required/>
      				<input type="text" name="adresse" placeholder="Adresse du logement" required />
       				<input type="text" name="codepostale" placeholder="Code postale" required />
       				<input type="text" name="surface" placeholder="Surface du logement" required>
       				<select name="pays" required>
       					<option value="france"> France </option>
       					<option value="royaume-uni"> Royaume-Uni </option>
       					<option value="espagne"> Espagne </option>
       					<option value="italie"> Italie </option>
       					<option value="etats-unis"> Etats-Unis </option>
       					<option value="canada"> Canada </option>
       					<option value="chine"> Chine </option>
       					<option value="japon"> Japon </option>     	
       				</select>
              <div id="bouton">
                <a type="submit" href="../Liste logements/listelogements.php">Annuler</a>
         				<input type="submit" value="Valider">
              
            </div>
   				</p>
			</form>
		</div>
	</section>
</body>

