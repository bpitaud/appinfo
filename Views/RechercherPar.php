<?php 

session_start();
$_SESSION['language'] ='fr';

function test($data) {
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
		<meta charset="utf-8">
		<link href="../css/RechercherPar.css" rel="stylesheet" media="all" type="text/css">
		<title>Rechercher Par</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	</head>
	
		<body>

<header>
	<div class="wrapper">
    <h1><strong>DOMISEP</strong><br/>Administrateur</h1> 	
   		<ul>
   			<li> 					
          <div class="dropdownLang">
            <div class="noHover">
              <p>FR</p>
            </div>
            <div class="hover">
              <p id="fr">FR</p>
              <p><a href="english.html"> EN </a></p>
            </div>
          </div>
				</li>
			</ul>    
  </div>
  <div class="deconnexion">
	  <a  href="../controllers/deconnexion.php"><p>Deconnexion</p></a>
</div>
</header>

<h2>Rechercher par :</h2>
    			
<section>
	<div class="formulaire">
		<form method="post" action="../controllers/FormulaireRechercherPar.php">
			<?php
				$error = test($_GET['recherche']);
				if (isset($error) && $error == "error") {
					echo "<p style='color:red'>Utilisateur introuvable</p>";
				}

				$supp = test($_GET['supp']);
        		if (isset($supp)) {
            		if ($supp == "true") {
                echo "<p style='color:white;'>Le compte utilisateur a bien été supprimé.</p>";
            		} else if ($supp == "false") {
                echo "<p style='color:red;'>Le compte utilisateur n'a pas été supprimé.</p>";
            }
        }

			?>
   				
      		<label for="name">Numéro de téléphone</label>
			<input type="text" name="telephone" >
			  
      		<label for="message">Adresse email</label>
			<input type="text" name="email">
								
			<label for="numero">Numéro de capteur</label>
			<input type="text" name="capteurID">
								

			<input type="submit" value="Valider">
   				      
		</form>
	</div>

</section>
                
</body>
		
</html>