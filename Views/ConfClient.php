<?php
session_start();

if (isset($_GET['user']) && $_GET['user'] != '') {
    $_SESSION['selected_user'] = $_GET['user'];
}
$_SESSION['language'] ='fr';

// if(!isset($_SESSION["connexion"]) or $_SESSION["connexion"] = 0  or empty($_SESSION["connexion"])) {
//   header("Location: connexion.php");
// }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/ConfClient.css" />
    <title> Confirmation Client </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_admin.php') ?>
  </head>

  <body>

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
        <em class="espace">Adresse email : '.$utilisateur[0][3].' </em>
      
    
        
      
    		<div class="bouton">
        <a href="../Views/Menu.php?user='.$_SESSION['selected_user'].'"> <input type="button" value="Valider"></a>
        </div>';
        ?>
  	   </div>
    </div>

  </body>
</html>