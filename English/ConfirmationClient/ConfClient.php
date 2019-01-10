<?php
session_start();

if (isset($_GET['user']) && $_GET['user'] != '') {
    $_SESSION['selected_user'] = $_GET['user'];
}

?>

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

    		<!--CODE DE LA PAGE-->

    <h2>Confirmation Client</h2>

    <div id="conteneur">
    	<div class="texte">
      <?php
      require_once('../controllers/FormulaireRechercherPar.php');
      $utilisateurID = $_SESSION['selected_user'];
			$utilisateur = RecupUserID($utilisateurID);
			echo'

				<em class="espace">Nom : '.$utilisateur[0][1].'</br></em>
				<em class="espace">Prénom : '.$utilisateur[0][2].'</br></em>
				<em class="espace">Numéro de téléphone : '.$utilisateur[0][6].' </br></em>
        <em class="espace">Adresse email : '.$utilisateur[0][3].' </em> ';
      
        ?>
          
    		<div class="bouton">
        <input type=button onclick=window.location.href="../Menu/Menu.php"; value=Valider />
    		</div>
  	   </div>
    </div>


    <footer>
    	<p> Connecté en tant que : ADRESSE_EMAIL_ADMIN</p>
    </footer>


  </body>
</html>