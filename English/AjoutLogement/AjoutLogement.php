<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="AjoutLogement.css" />
    <title>Add housing</title>
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
                                <p>EN</p>
                            </div>
                            <div class="hover">
                                <p>EN</p>
                                <a href="../AjoutLogement/ENAjoutLogement.php"> FR </a>
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
                                <a href="../mesInfosUser/MesInfosUser.php"><p>My infos</p></a>
                                <a href="../NousContacter/NousContacter.php"><p>Contact</p></a>
                                <a href="../controllers/deconnexion.php"><p id="borderNone">Log out</p></a>
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
    		<a href="../Liste logements/ENlistelogements.php">  < Back	
    		</a>
    	</p>
    	</div>
		<h1>Add housing<span>.................</span></h1>
		<div class="formulaire">
			<form method="post" action="../controllers/FormulaireAjoutLogement.php">
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
       				<input type="submit" value="Suivant">
   				</p>
			</form>
		</div>
    </section>
    
    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>


