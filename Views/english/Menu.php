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
		<meta charset="utf-8">
		<link href="../../css/Menu.css" rel="stylesheet" media="all" type="text/css">
		<title>Menu</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<?php include('header_admin.php') ?>
	</head>
	
		<body>
		
		<div class="retour">
    		<p>
            <?php
            echo'
    		<a href="../english/ConfClient.php"> < Back		
            </a>';
            ?>
    	</p>
    	</div>
	
			<?php
			$utilisateurID = $_SESSION['selected_user'];
			echo'
			<div class="page">
			
				<a href = "../english/Compte_Admin.php?user='.$_SESSION["selected_user"].'"><div id="conteneur1">
					<div class="element1">Account</div>
				</div></a>
			
				<a href = "../english/Liste_de_capteurs.php?user='.$_SESSION["selected_user"].'"><div id="conteneur2">
					<div class="element2">Sensors</div>
				</div></a>
			</div>';
			?>
	
		</body>
		
	</html>