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



    <h2> Créer un compte </h2>
    <section>
    	<div class="info">
    		<p>
            <p>
       			<input type="base" name="name" placeholder="ADRESS.EMAIL@MAIL.COM" required/>
      			<input type="base" name="number" placeholder="NOM" required />
                <input type="base" name="name" placeholder="PRENOM" required/>
                <input type="base" name="motdepasse" placeholder="Entrer votre mot de passe" required />
                <input type="base" name="motdepasse" placeholder="Confirmer mot de passe" required />
                <select name="Genre" required>
       					<option value="genre"> GENRE </option>
                        <option value="féminin"> Féminin </option>	
                       <option value="féminin"> Féminin </option>	
       				</select>
               
    			
    		</p>
    	</div>
    	<div class="info">
        <form method="post" action="../controllers/FormulaireAjoutCapteur.php">
   				<p>
                    <input type="base" name="number" placeholder="JJ/MM/AAAA" required />   
       				<input type="base" name="name" placeholder="+33 6 00 00 00 00" required/>
      				<input type="base" name="number" placeholder="ADRESSE PRINCIPALE" required />
                      <select name="Pays" required>
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
      				<input type="base" name="number" placeholder="75 000" required />

            <div id="test">
    			<button class="bouton" href="../">Annuler</button>
                <button class="bouton">Valider</button>
            </div>
            </p>
        </form>
    	</div>
    </section>
    <footer>
    </footer>


  </body>
</html>