<?php 

session_start();
$_SESSION['language'] ='en';

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
		<link href="../../css/RechercherPar.css" rel="stylesheet" media="all" type="text/css">
		<title>Find a user</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	</head>
	
		<body>

<header>
	<div class="wrapper">
    <h1><strong>DOMISEP</strong><br/>Administrator</h1> 	
   		<ul>
   			<li> 					
          <div class="dropdownLang">
            <div class="noHover">
              <p>EN</p>
            </div>
            <div class="hover">
              <p id="fr">EN</p>
              <p><a href="../RechercherPar.php"> FR </a></p>
            </div>
          </div>
				</li>
			</ul>    
  </div>
  <div class="deconnexion">
	  <a  href="../../controllers/deconnexion.php"><p>Logout</p></a>
</div>
</header>

<h2>Find a user by :</h2>
    			
<section>
	<div class="formulaire">
		<form method="post" action="../../controllers/FormulaireRechercherPar.php">
			<?php
				$error = test($_GET['recherche']);
				if (isset($error) && $error == "error") {
					echo "<p style='color:red'>User untraceable.</p>";
				}

				$supp = test($_GET['supp']);
        		if (isset($supp)) {
            		if ($supp == "true") {
                echo "<p style='color:white;'>The user account has been deleted.</p>";
            		} else if ($supp == "false") {
                echo "<p style='color:red;'>The user account hasn't been deleted.</p>";
            }
        }

			?>
   				
      		<label for="name">Phone number</label>
			<input type="text" name="telephone" >
			  
      		<label for="message">Mail address</label>
			<input type="text" name="email">
								
			<label for="numero">Number of sensor</label>
			<input type="text" name="capteurID">
								

			<input type="submit" value="Submit">
   				      
		</form>
	</div>

</section>
                
</body>
		
</html>