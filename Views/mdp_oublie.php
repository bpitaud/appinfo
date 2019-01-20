<?php
session_start();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// if(!isset($_SESSION["connexion"]) or $_SESSION["connexion"] = 0  or empty($_SESSION["connexion"])) {
//     header("Location: connexion.php");
// }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/mdp_oublie.css" />
    <title>Domisep - Mot de passe oublié</title>
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

    <section>
    	<div class="retour">
    		<p>
    		<a href="../Views/connexion.php"> < Retour		
    		</a>
    	</p>
    	</div>
        <h1>Mot de passe oublié<span>.................</span></h1>
        
        <?php
                $envoi= test_input($_GET['envoi']);
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