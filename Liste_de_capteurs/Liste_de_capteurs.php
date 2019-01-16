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
			$error = $_GET['recup'];
			if (isset($error) && $error == "error") {
        echo "<p style='color:red'>Le capteur n'existe pas. </p>";
			}	
	    ?>
          <p>
                <input type="text" name="capteurID" placeholder="numéro de capteur">
          </p>
      </form>

        <p id="deco_supp" >
        <button onclick="myFunction()" class="bouton">Supprimer </button>
        <!-- <button class="bouton"><a href="../controllers/ChangementEtatAdmin.php"> Changer l'état</a></button> -->
        
        
        
      
        </p>
      </div>
     
      <script>
function myFunction() {
    var txt;
    var r = confirm("Etes-vous sûr de vouloir supprimer ce capteur ?");
    if (r == true) {
        document.location.href = "../controllers/SuppCapteur.php?capteur=" ;
    } else {
        href = "../Liste_de_capteurs/Liste_de_capteurs.php";
    }
    document.getElementById("demo").innerHTML = txt;
}
</script>

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
  $capteur = JoinCapteurModel($_GET['capteur'], $_GET['user']);
  if (!$capteur) {
    $capteur = JoinControleurModel($_GET['capteur'], $_GET['user']);
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

<?php
      echo"
      <form method='post' action='../controllers/ChangementEtatAdmin.php'>
        <input type='hidden' value=".$capteur['capteurID']." name='capteur' id='capteur'/>
        <input type='hidden' value='changer_etat' name='changement' id='changement'/>
        <button  class='bouton' type='submit'>changer etat</button>
        </form>"
        ?>
  
</table>


    </section>
  </body> 
</html>



<!-- <p id="deco_supp" >
        <form method="POST" action="../controllers/SuppCapteurAdmin.php" onsubmit="myFunction()">
        <input class="bouton" type="submit" value="Supprimer"> </form>
        <button class="bouton"><a href="../controllers/ChangementEtat.php"> Changer l'état</a></button>
      
        </p>
      </div>
     
      <script>
function myFunction() {
    var txt;
    var r = confirm("Etes-vous sûr de vouloir supprimer ce capteur ?");
    if (r == true) {
        //document.location.href = "../controllers/SuppCapteur.php";
    } else {
        //href = "../Liste_de_capteurs/Liste_de_capteurs.php";
    }
    document.getElementById("demo").innerHTML = txt;
}
</script> -->