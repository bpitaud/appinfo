<?php
session_start();
$_SESSION['language'] ='en';

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
    <link rel="stylesheet" href="../../css/mdp_oublie.css" />
    <title>Domisep - Forgotten password</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
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
                                <a href="../mdp_oublie.php"> FR </a>
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
    		<a href="../english/connexion.php"> < Back		
    		</a>
    	</p>
    	</div>
        <h1>Forgotten password<span>.................</span></h1>
        
        <?php
                $envoi= test_input($_GET['envoi']);
                if (isset($envoi)) {
                    if ($envoi == "ok") {
                        echo "<p style='color:white;'>You received a new password by mail.</p>";
                    } else if ($envoi =="error") {
                        echo "<p style='color:red;'>The mail address is false.</p>";
                    } else if ($envoi == "echec"){
                        echo "<p style='color:red;'>Sending mail failed. Please try again.</p>";
                    }
                }
                ?>

		<div class="formulaire">
			<form method="post" action="../../controllers/mdp_oublie.php">
   				<p>
       				<input type="email" name="email" placeholder="Please enter your mail address"/>
       				<input type="submit" value="Next">
   				</p>
			</form>
		</div>
    </section>
    
    <footer>
    	<p> WEBAC © All rights reserved </p>
    </footer>
    
</body>