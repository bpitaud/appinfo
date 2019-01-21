<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/inscription.css" />
    <title> Domisep - Inscription </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>

    <header>
        <div class="wrapper">
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <li><a href="../Views/home.php"><span>Home</span></a></li>
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



    <h2> Créer un compte </h2>

    <section>
      
    	<div class="info">
        <form method="post" action="../controllers/FormulaireInscription.php">
        <?php
			$error = test_input($_GET['inscription']);
			if (isset($error) && $error == "error") {
                echo "<p style='color:red'>L'email existe déjà ou les mots de passe ne sont pas identiques. </p>";
            }
		
	?>
      			<input type="text" name="nom" placeholder="NOM" required />
                <input type="text" name="prenom" placeholder="PRENOM" required/>
                <input type="email" name="email" placeholder="ADRESSE.EMAIL@MAIL.COM" required/>
                <select name="genre" required>
       					<option value="genre"> GENRE </option>
                        <option value="feminin"> Féminin </option>	
                       <option value="masculin"> Masculin </option>	
       				</select>
                <input type="text" name="naissance" placeholder="DATE DE NAISSANCE" required />   
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

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</html>