<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="ConfClient.css" />
    <title> ConfirmationClient </title>
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

    		<!--CODE DE LA PAGE-->

    			<h2>Confirmation Client</h2>

    <div id="conteneur">
    	<div class="texte">
				<p>Nom : NOM</p> 
				</br>
				<p>Prénom : PRENOM</p> 
				</br>
				<p>Numéro de téléphone : +33 0 00 00 00 00</p> 
				</br>
				<p>Adresse email : ADRESSE.EMAIL@MAIL.COM</p> 
    	</div>
    

    
		<div class="bouton">
		<input type=button onclick=window.location.href="../Menu/Menu.php"; value=Valider />

		</div>
	</div>

    <footer>
    	<p> Connecté en tant que : ADRESSE_EMAIL_ADMIN</p>
    </footer>


  </body>
</html>