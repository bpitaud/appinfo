<?php
session_start();
$_SESSION['language'] ='en';
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
    <link rel="stylesheet" href="../../css/connexion.css" />
    <title>Domisep - Login</title>
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
                    <li><a href="../english/home.php"><span>Home</span></a></li>
                    <div class="creationcompteheader">
                            <a href="../english/inscription.php"> Create an account </a>
                            
                    </div>
                    <div class="connexionheader">
                        <a href="../english/connexion.php"> Login </a> </div>

                    <li>
                        <div class="dropdownLang">
                            <div class="noHover">
                                <p>EN</p>
                            </div>
                            <div class="hover">
                                <p>EN</p>
                                <a href="../connexion.php"> FR </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
   
    
    <div class="formulaire">
    <h2> Login </h2>
    <form method="post" action="../../controllers/FormulaireConnexion.php">
    <?php
			$error = test_input($_GET['connexion']);
			if (isset($error) && $error == "error") {
				echo "<p style='color:red'>Email ou mot de passe incorrect.</p>";
			}
		 
	?>
   				<p>
       				<input type="text" name="email" placeholder="Enter your mail address" required/>
      				<input type="password" name="mdp" placeholder="Entrer your password" required />
                    <input type="submit" name="connexion" value="Next">
   				</p>
			</form>
        </div>
    <div class="motdepasse"> 
        <a href="../english/mdp_oublie.php"> Forgotten password </a> 
    </div>


    <footer>
    <p> WEBAC © Tous droits réservés <a href="../english/Mentions_legales.php" ><span>Mentions légales</span> </a><a href = "../english/cgu.php" ><span>CGU</span></a></p>
    </footer>
    
</body>   
</html> 