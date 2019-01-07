<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link href="RechercherPar.css" rel="stylesheet" media="all" type="text/css">
		<title>RecherchePar</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	</head>
	
		<body>
		
		<!--HEADER-->

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
</header>
    
    
    		<!--CODE DE LA PAGE-->
    		

    			<h2>Rechercher par :</h2>
    			
    		<section>
		<div class="formulaire">
			<form method="post" action="../controllers/FormulaireRechercherPar.php">
                
   				<p>
      					<label for="name">Numéro de téléphone</label>
      					<input type="text" value="" name="telephone" >
      					
      					<label for="message">Adresse email</label>
      					<input type="text" value="" name="email">
      					
      					<!--<label for="message">Numéro de capteur</label>
      					<input type="text" value="" name="capteur"> -->

								<input type="submit" value="Valider">
   				</p>
                
			</form>
		</div>

			</section>
                
            
    <footer>
    	<p> Connecté en tant que : ADRESSE_EMAIL_ADMIN</p>
    </footer>



    	</body>
		
</html>