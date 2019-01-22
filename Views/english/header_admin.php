<?php
session_start();
$_SESSION['language'] ='en';

if (isset($_GET['user']) && $_GET['user'] != '') {
    $_SESSION['selected_user'] = $_GET['user'];
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../css/header_admin.css" />
    <title> Account </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>

  <body>

  <header>
  <div class="wrapper">

        <h1><strong>DOMISEP</strong><br/>Administrator</h1>
        <div class="haut">    
      <ul>
        <div class="haut_droite">
        <li>
          <div class="dropdownLang">
              <div class="noHover">
                  <p>EN</p>
              </div>
              <div class="hover">
                <p>EN</p>
                <a href="../RechercherPar.php"> FR </a>
              </div>
          </div>
          </li>
          <?php
          require_once('../../controllers/FormulaireRechercherPar.php');
          $utilisateurID = $_SESSION['selected_user'];
          $utilisateur = RecupUserID($utilisateurID);
          echo '
          <li><p class="admin"> ASS User : '.$utilisateur[0][3].'</p></li>';
          ?>
        </div>
          <li><a class="quitter" href="../english/RechercherPar.php"><span>Exit</span></a></li>
      </ul>
        </div>
    </div>
</header>

  </body>
</html>
