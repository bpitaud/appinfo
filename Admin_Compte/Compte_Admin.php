<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="Compte_Admin.css" />
    <title> Compte </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>

  <body>

<header>
	<div class="wrapper">

        <h1><strong>DOMISEP</strong><br/>Administrateur</h1>
        <div class="haut">  	
 			<ul>
 				<div class="haut_droite">
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
 					<li><p class="admin"> SAV Client : ADRESSE.EMAIL@mail.com</p></li>
 				</div>
                <li><a class="quitter" href="../RechercherPar/RechercherPar.php"><span>Quitter</span></a></li>
			</ul>
        </div>
    </div>
</header>






    
    <nav>
    	<a href="../Menu/Menu.php">Menu</a>/<span id="compte_link">Compte</span>
    </nav>
    <h2>Compte</h2>
    <section>
    	<div class="info">
    		<p>
    			<em class="base">ADRESS.EMAIL@MAIL.COM <br/></em>
    			<em class="base">NOM<br/></em>
    			<em class="base">PRENOM<br/></em>
    			<em class="base">GENRE<br/></em>
    			<em class="base2">JJ/MM/AAAA<br/></em>
    			<button class="bouton">Supprimer le compte</button>
    		</p>
    	</div>
    	<div class="info">
    		<p>
    			<em class="base">+33 6 00 00 00 00<br/></em>
    			<em class="base">ADRESSE PRINCIPALE<br/></em>
    			<em class="base">PAYS<br/></em>
    			<em class="base2">75 000<br/></em>
    			<button class="bouton" href="../ModifCompte/ModifCompte.php">Modifier les informations</button>
    			<button class="bouton">Réinitialiser le mot de passe</button>
    		</p>
    	</div>
    </section>
    <footer>
    	<p> Connecté en tant que : ADRESSE_EMAIL_ADMIN</p>
    </footer>


  </body>
</html>