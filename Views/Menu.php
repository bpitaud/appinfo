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
		<?php include('header_admin.php') ?>
	</head>
	
		<body>
	
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