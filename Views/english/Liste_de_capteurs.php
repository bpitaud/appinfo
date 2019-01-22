<?php
session_start();

$_SESSION['language'] ='en';

  if (isset($_GET['capteur']) && $_GET['capteur'] != '') {
    $_SESSION['selected_capteur'] = $_GET['capteur'];
}
if (isset($_GET['controleur']) && $_GET['controleur'] != '') {
  $_SESSION['selected_capteur'] = $_GET['controleur'];
}


// function tes($data) {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }

// if(!isset($_SESSION["connexion"]) or $_SESSION["connexion"] = 0  or empty($_SESSION["connexion"])) {
//   header("Location: connexion.php");
// }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../css/liste_de_capteurs.css" />
    <title> Find a sensor</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php include('header_admin.php') ?>

  </head>

  <body>
    
<?php
    echo '
    <nav>
    	<a href="../english/Menu.php?user='.$_SESSION['selected_user'].'">Menu</a>/<span id="compte_link">Find a sensor</span>
    </nav>';
    ?>

    <section>

      <form method="post" action="../../controllers/RechercheCapteur.php">

          <p>
                <input type="text" name="capteurID" placeholder="sensor number">
          </p>
      </form>

      <div class="bouton1">
                    <form action="../../controllers/SuppCapteurAdmin.php?capteur=<?php echo $_SESSION['selected_capteur'] ?>" 
                    method="get" onsubmit="return confirm
                    ('Are you sure you want to delete this sensor?')">
                        <input  value="Delete" type="submit">
                    </form>   
                </div>
      </div>

      <?php
      require_once('../../controllers/RechercheCapteur.php');
			$error = test_input($_GET['recup']);
			if (isset($error) && $error == "error") {
        echo "<p style='color:red'>This sensor doesn't exist. </p>";
      }	
      
      $supp = test_input($_GET['supp']);
			if (isset($supp) && $supp == "true") {
        echo "<p style='color:white'>The sensor has been deleted. </p>";
			}	else if (isset($supp) && $supp == "false") {
        echo "<p style='color:red'>The sensor hasn't been deleted or doesn't exist. </p>";
      }

      $none = test_input($_GET['capteur']);
			if (isset($none) && $none == "none") {
        echo "<p style='color:red'>You didn't select any sensor. </p>";
			}	
	    ?>
     
  

<table summary="ligne 1 : Propriété capteurs, ligne 2 : Info capteur">

 <caption>Sensor</caption>
  <tr>
    <th> Sensor number</th>
    <th>Type</th>
    <th>Home</th>
    <th>Room</th>
    <th>State</th>
  </tr>
  <?php
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
      if ($etat == '1' or $etat == '2' or $etat == '3' or $etat == '4' or $etat == '5' ){
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
    
			$error = test_input($_GET['recherche']);
			if (isset($error) && $error == "error") {
				echo "<p style='color:red'>This sensor doesn't exist.</p>";
      }
    }
      
  ?>
<p id="change_etat" >
<?php
      echo"
      <form method='post' action='../../controllers/ChangementEtatAdmin.php'>
        <input type='hidden' value=".$capteur['capteurID']." name='capteur' id='capteur'/>
        <input type='hidden' value='changer_etat' name='changement' id='changement'/>
        <button  class='bouton' type='submit'>change state</button>
        </form>"
        ?>
</p>
         
</table>

    </section>
  </body> 
</html>