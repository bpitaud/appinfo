<?php


session_start();
$_SESSION["connexion"] = 0;

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
    <link rel="stylesheet" href="../css/connexion.css" />
    <title>Domisep - Connexion</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>





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
   
    
    <div class="formulaire">
    <h2> Se connecter </h2>
    <form method="post" action="../controllers/FormulaireConnexion.php">
    <?php
			$error = test_input($_GET['connexion']);
			if (isset($error) && $error == "error") {
				echo "<p style='color:red'>Email ou mot de passe incorrect.</p>";
			}
		 
	?>
   				<p>
       				<input type="text" name="email" placeholder="Entrer votre adresse mail" required/>
      				<input type="password" name="mdp" placeholder="Entrer votre mot de passe" required />
                    <input type="submit" name="connexion" value="Suivant">
   				</p>
			</form>
        </div>
    <div class="motdepasse"> 
        <a href="../Views/mdp_oublie.php"> Mot de passe oublié </a> 
    </div>


    <footer>
    <p> WEBAC © Tous droits réservés <a href="../Views/Mentions_legales.php" ><span>Mentions légales</span> </a><a href = "../Views/cgu.php" ><span>CGU</span></a></p>
    </footer>
    
</body>    