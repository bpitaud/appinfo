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
    <link rel="stylesheet" href="../css/NouveauMdpAdmin.css" />
    <title>Rénitialisation de mot de passe </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

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
            <?php
  require_once('../controllers/FormulaireRechercherPar.php');
  $utilisateurID = $_SESSION['selected_user'];
  $utilisateur = RecupUserID($utilisateurID);
  echo '
  <li><p class="admin"> SAV Client : '.$utilisateur[0][3].'</p></li>';
  ?>
         </div>
        <li><a class="quitter" href="../Views/RechercherPar.php"><span>Quitter</span></a></li>
    </ul>
</div>
</div>
</header>

<?php
    echo'
    <nav>
    	<a href="../Views/Menu.php?user='.$_SESSION['selected_user'].'">Menu</a>/<a href="../Views/Compte_Admin.php?user='.$_SESSION['selected_user'].'">Compte</a>/<span id="compte_link">Réinitialisation</span>
    </nav>';
    ?>


    <section>

		<h1>Rénitialisation de mot de passe </h1>
		<div class="formulaire">
			<form method="post" action="../controllers/NouveauMdpAdmin.php">
   				<p>
       				<input type="password" name="ancien_mdp" placeholder="Ancien Mot de Passe" />
       				<input type="password" name="nouveau_mdp" placeholder="Nouveau Mot de Passe" >
       				<input type="submit" value="Suivant">
   				</p>
			</form>
		</div>
    </section>
    
    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>