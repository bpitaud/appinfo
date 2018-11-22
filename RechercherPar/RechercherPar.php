<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link href="RechercherPar.css" rel="stylesheet" media="all" type="text/css">
		<title>RecherchePar</title>
	</head>
	
		<body>
		
		<!--HEADER DE WILLIAM-->

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
              <p>FR</p>
              <a href="english.html"> EN </a>
            </div>
          </div>
        </li>
      </ul>
   		<p class="admin"> SAV Client : ADRESSE.EMAIL@mail.com</p>
   			
      <a class="quitter" href="../RechercherPar/RechercherPar.HTML"><span>Quitter</span></a>
  </div>
</header>
    
    
    		<!--CODE DE LA PAGE-->
    		

    			<h2>Rechercher par :</h2>
    			
    		<section>
		<div class="formulaire">
			<form method="post" action="../controllers/FormulaireRechercherPar.php">
                
   				<p>
      					<label for="name">Numéro de téléphone</label>
      					<input type="text" value="" name="tel" >
      					
      					<label for="message">Adresse email</label>
      					<input type="text" value="" name="mail">
      					
      					<label for="message">Numéro de capteur</label>
      					<input type="text" value="" name="capteur">

                        <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1" />
   				</p>
                
			</form>
		</div>

			</section>
                
            
    <footer>
    	<p> Connecté en tant que : ADRESSE_EMAIL_ADMIN</p>
    </footer>



    	</body>
		
</html>