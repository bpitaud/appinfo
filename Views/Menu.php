<?php
session_start();

if (isset($_GET['user']) && $_GET['user'] != '') {
    $_SESSION['selected_user'] = $_GET['user'];
}

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link href="../css/Menu.css" rel="stylesheet" media="all" type="text/css">
		<title>Menu</title>
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

    
    		<!--CODE DE LA PAGE-->
			<?php
			$utilisateurID = $_SESSION['selected_user'];
			echo'
			<div class="page">
			
				<a href = "../Views/Compte_Admin.php?user='.$_SESSION["selected_user"].'"><div id="conteneur1">
					<div class="element1">Compte</div>
					<!--<img src="../Images/compte.png" alt="Compte" />-->
				</div></a>
			
				<a href = "../Views/Liste_de_capteurs.php?user='.$_SESSION["selected_user"].'"><div id="conteneur2">

					<!--<img src="../Images/House.png" alt="House" />-->
					<div class="element2">Capteurs</div>
				</div></a>
			</div>';
			?>
	
		</body>
		
	</html>