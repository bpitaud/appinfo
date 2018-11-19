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
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <li><a href="Home"><span>Home</span></a></li>
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
                    <li>
                        <div class="dropdown">
                            <div id="noHoverUser">
                                    <button class="boutonmenuprincipal"><p></p></button>
                            </div>
                            <div id="hoverUser">
                                <button class="boutonmenuprincipal"><p></p></button>
                                <a href="MesInfos.html"><p>Mes infos</p></a>
                                <a href="NousContacter.html"><p>Contacter</p></a>
                                <a href="Accueil.html"><p id="borderNone">Deconnexion</p></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    
    
    		<!--CODE DE LA PAGE-->
    		

    			<h2>Rechercher par :</h2>
    			
    		<section>
		<div class="formulaire">
			<form method="post" action="TraitementPaysLogement.php">
   				<p>
      					<label for="name">Numéro de téléphone</label>
      					<input type="text" value="" name="tel">
      					
      					<label for="message">Adresse email</label>
      					<input type="text" value="" name="mail">
      					
      					<label for="message">Numéro de capteur</label>
      					<input type="text" value="" name="capteur">
   				</p>
			</form>
		</div>

		

			</section>
    			       
    	</body>
		
</html>