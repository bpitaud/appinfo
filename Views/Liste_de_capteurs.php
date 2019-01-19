<?php
  session_start();

  if (isset($_GET['capteur']) && $_GET['capteur'] != '') {
    $_SESSION['selected_capteur'] = $_GET['capteur'];
}
if (isset($_GET['controleur']) && $_GET['controleur'] != '') {
  $_SESSION['selected_capteur'] = $_GET['controleur'];
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/liste_de_capteurs.css" />
    <title> Recherche d'un capteur</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="ListeCapteurAdmin.js"></script>

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
                <li><a class="quitter" href="../Views/RechercherPar.php"><span>Quitter</span></a></li>
			</ul>
        </div>
    </div>
</header>

    
<?php
    echo '
    <nav>
    	<a href="../Views/Menu.php?user='.$_SESSION['selected_user'].'">Menu</a>/<span id="compte_link">Recherche de capteur</span>
    </nav>';
    ?>

    <section>

      <form method="post" action="../controllers/RechercheCapteur.php">

      <?php
			$error = $_GET['recup'];
			if (isset($error) && $error == "error") {
        echo "<p style='color:red'>Le capteur n'existe pas. </p>";
			}	
	    ?>
          <p>
                <input type="text" name="capteurID" placeholder="numéro de capteur">
          </p>
      </form>

      <div class="bouton1">
                    <form action="../controllers/SuppCapteurAdmin.php?capteur=<?php echo $_SESSION['selected_capteur'] ?>" 
                    method="get" onsubmit="return confirm
                    ('Etes-vous sûr de vouloir supprimer ce capteur?')">
                        <input  value="Supprimer" type="submit">
                    </form>   
                </div>
      </div>
     
  

<table summary="ligne 1 : Propriété capteurs, ligne 2 : Info capteur">

 <caption>Capteur</caption>
  <tr>
    <th>Numéro du capteur</th>
    <th>Type</th>
    <th>Logement</th>
    <th>Pièce</th>
    <th>Etat</th>
  </tr>
  <?php
  require_once('../controllers/RechercheCapteur.php');
  $capteur = JoinCapteurModel($_GET['capteur'], $_GET['user']);
  if (!$capteur) {
    $capteur = JoinControleurModel($_GET['controleur'], $_GET['user']);
  }
  if ($capteur) {
    ?>
   <tr class='tableau'>
      <td><?php echo $capteur['capteurID']?></td>
      <td><?php echo $capteur['capteurTyp']?></td>
      <td><?php echo $capteur['logementNom']?></td>
      <td><?php echo $capteur['pieceNom']?></td>
     
      <?php
      $etat=$capteur['etat'];
      if ($etat == '1'){
        echo'
          <td>ON</td>';
      }
      else {
        echo' 
          <td>OFF</td>';
      }
      ?>
   </tr> 

   <?php
  
  } else {
    
		try {
			$error = $_GET['recherche'];
			if (isset($error) && $error == "error") {
				echo "<p style='color:red'>Ce capteur n'existe pas.</p>";
			}
		} catch (Exception $e) {}
	
  }
  ?>
<p id="change_etat" >
<?php
      echo"
      <form method='post' action='../controllers/ChangementEtatAdmin.php'>
        <input type='hidden' value=".$capteur['capteurID']." name='capteur' id='capteur'/>
        <input type='hidden' value='changer_etat' name='changement' id='changement'/>
        <button  class='bouton' type='submit'>changer etat</button>
        </form>"
        ?>
</p>
         
</table>

    </section>
  </body> 
</html>