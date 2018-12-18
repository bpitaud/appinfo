<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="inscription.css" />
    <title> Inscription </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>

    <header>
        <div class="wrapper">
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <li><a href="../Home/home.php"><span>Home</span></a></li>
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



    <h2> Créer un compte </h2>
    <section>
    	<div class="info">
        <form method="post" action="../controllers/FormulaireInscription.php">
      			<input type="text" name="nom" placeholder="NOM" required />
                <input type="text" name="prenom" placeholder="PRENOM" required/>
                <input type="email" name="email" placeholder="ADRESSE.EMAIL@MAIL.COM" required/>
                <select name="genre" required>
       					<option value="genre"> GENRE </option>
                        <option value="feminin"> Féminin </option>	
                       <option value="masculin"> Masculin </option>	
       				</select>
                <input type="date" name="naissance" placeholder="DATE DE NAISSANCE" required />   
       			<input type="text" name="telephone" placeholder="TELEPHONE" required/>
      			<input type="text" name="adresse" placeholder="ADRESSE PRINCIPALE" required />
                    <select name="pays" required>
                        <option value="pays"> PAYS </option>
       					<option value="france"> France </option>
       					<option value="royaume-Uni"> Royaume-Uni </option>
       					<option value="espagne"> Espagne </option>
       					<option value="italie"> Italie </option>
       					<option value="etats-unis"> Etats-Unis </option>
       					<option value="canada"> Canada </option>
       					<option value="chine"> Chine </option>
       					<option value="japon"> Japon </option>     	
       				</select>
                <input type="text" name="codepostale" placeholder="CODE POSTAL" required />
                <input type="password" name="mdp" placeholder="Entrer votre mot de passe" required />
                <input type="password" name="conf_mdp" placeholder="Confirmer mot de passe" required />

            <div id="test">
    			<button class="bouton" type="reset">Annuler</button>
                <button class="bouton" type="submit">Valider</button>
            </div>
        </form>
    	</div>
    </section>
  </body>
</html>