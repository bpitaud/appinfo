<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link href="Menu.css" rel="stylesheet" media="all" type="text/css">
		<title>Menu</title>
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
              <p>FR</p>
              <a href="english.html"> EN </a>
            </div>
          </div>
        </li>
      </ul>
   		<p class="admin"> SAV Client : ADRESSE.EMAIL@mail.com</p>
   			
      <a class="quitter" href="../RechercherPar/RechercherPar.php"><span>Quitter</span></a>
  </div>
</header>

    <nav>
    	<a href="../Menu/Menu.php">Menu</a>/<span id="compte_link">Compte</span>
    </nav>
    
    
    		<!--CODE DE LA PAGE-->

    
			<div class="page">
			
				<a href = "../Admin_Compte/Compte_Admin.php"><div id="conteneur1">
					<div class="element">Compte</div>
					<img src="../Images/compte.png" alt="Compte" />
				</div></a>
			
				<a href = "../Liste_de_capteurs/Liste_de_capteurs.php"><div id="conteneur2">
					<img src="../Images/House.png" alt="House" />
					<div class="element">Capteurs</div>
				</div></a>
			</div>



    <footer>
    	<p> Connecté en tant que : ADRESSE_EMAIL_ADMIN</p>
	</footer>
	
	
		</body>
		
	</html>