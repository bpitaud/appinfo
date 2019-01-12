 <?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="liste_de_capteurs.css" />
    <title> Recherche d'un capteur</title>
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
            <?php
          require_once('../controllers/FormulaireRechercherPar.php');
          $utilisateurID = $_SESSION['selected_user'];
          $utilisateur = RecupUserID($utilisateurID);
          echo '
          <li><p class="admin"> SAV Client : '.$utilisateur[0][3].'</p></li>';
          ?>
 				</div>
                <li><a class="quitter" href="../RechercherPar/RechercherPar.php"><span>Quitter</span></a></li>
			</ul>
        </div>
    </div>
</header>

    
<?php
    echo '
    <nav>
    	<a href="../Menu/Menu.php?user='.$_SESSION['selected_user'].'">Menu</a>/<span id="compte_link">Recherche de capteur</span>
    </nav>';
    ?>


    <section>

      <form method="post" action="../controllers/RechercheCapteur.php">
      <?php
		try {
			$error = $_GET['recup'];
			if (isset($error) && $error == "error") {
				echo "<p style='color:red'>Le capteur n'existe pas. </p>";
			}
		} catch (Exception $e) {}
	?>
          <p>
                <input type="text" name="capteurID" placeholder="numéro de capteur">
          </p>
      </form>

        <p id="deco_supp" >
          <button class="bouton">Supprimer</button>
          <button class="bouton">Changer l'état</button>
        </p>
      </div>
     


<table summary="ligne 1 : Propriété capteurs, ligne 2 : Info capteur">

 <caption>Capteur</caption>
  <tr>
    <th>Numéro des capteurs</th>
    <th>Type</th>
    <th>Logement</th>
    <th>Pièce</th>
    <th>Etat</th>
  </tr>
  <?php
  require_once('../controllers/RechercheCapteur.php');
  $capteur = JoinCapteurModel($_GET['capteur'], $utilisateurID);
  if (!$capteur) {
    $capteur = JoinControleurModel($_GET['capteur'], $utilisateurID);
  }
  if ($capteur) {
    ?>
    <tr>
      <td><?php echo $capteur['capteurID']?></td>
      <td><?php echo $capteur['capteurTyp']?></td>
      <td><?php echo $capteur['logementNom']?></td>
      <td><?php echo $capteur['pieceNom']?></td>
      <td><?php echo $capteur['etat']?></td>
   </tr>

   <?php
    
  } else {
    
		try {
			$error = $_GET['recherche'];
			if (isset($error) && $error == "error") {
				echo "<p style='color:red'>Ce capteur n'existe pas</p>";
			}
		} catch (Exception $e) {}
	
  }
  ?>
  
</table>


    </section>
  </body> 
</html>