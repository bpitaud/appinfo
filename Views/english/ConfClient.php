<?php
session_start();
$_SESSION['language'] ='en';

if (isset($_GET['user']) && $_GET['user'] != '') {
    $_SESSION['selected_user'] = $_GET['user'];
}

if(!isset($_SESSION["connexion"]) || $_SESSION["connexion"] == 0) {
  header("Location: connexion.php");
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../css/ConfClient.css" />
    <title> Confirmation User </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_admin.php') ?>
  </head>

  <body>

    <h2>Confirmation User</h2>

    <div id="conteneur">
    	<div class="texte">
      <?php
      require_once('../../controllers/FormulaireRechercherPar.php');
      $utilisateurID = $_SESSION['selected_user'];
			$utilisateur = RecupUserID($utilisateurID);
			echo'

				<em class="espace">Name : '.$utilisateur[0][1].'</br></em>
				<em class="espace">First name : '.$utilisateur[0][2].'</br></em>
				<em class="espace">Telephone number : '.$utilisateur[0][6].' </br></em>
        <em class="espace">Mail address : '.$utilisateur[0][3].' </em>
      
    
        
      
    		<div class="bouton">
        <a href="../english/Menu.php?user='.$_SESSION['selected_user'].'"> <input type="button" value="Submit"></a>
        </div>';
        ?>
  	   </div>
    </div>

  </body>
</html>