<?php 
session_start();

if (isset($_GET['log']) && $_GET['log'] != '') {
    $_SESSION['selected_logement'] = $_GET['log'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/ModifierLogement.css" />
    <title>Modification d'un Logement</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>   
           <a href='../Views/listelogements.php'> < Retour </a>    
    	</p>
        </div>
        <?php
        require ('../controllers/ModifLogements.php');
        $logementID = $_SESSION['selected_logement'];
        $logement = RecupLogement($logementID);
                echo"
        <h1>Modifier un logement: ".$logement[0][1]."<span>.................</span></h1>";
        ?>
		<div class="formulaire">
            <form method="post" action="../controllers/ModifLogements.php">
            <?php
            echo'
   			
       				<input type="text" name="nom" placeholder="'.$logement[0][1].'" />
      				<input type="text" name="adresse" placeholder="'.$logement[0][2].'" />
       				<input type="text" name="codepostale" placeholder="'.$logement[0][3].'" />
       				<input type="text" name="surface" placeholder="'.$logement[0][4].'" >
       				<select name="'.$logement[0][6].'" >
       					<option value="france"> France </option>
       					<option value="royaume-uni"> Royaume-Uni </option>
       					<option value="espagne"> Espagne </option>
       					<option value="italie"> Italie </option>
       					<option value="etats-unis"> Etats-Unis </option>
       					<option value="canada"> Canada </option>
       					<option value="chine"> Chine </option>
       					<option value="japon"> Japon </option>     	
                       </select>';
                ?>
            
              <div class="bouton">
                <a type="submit" href="../Views/listelogements.php">Annuler</a>
                <input type="submit" value="Valider">
              
            </div>	
            </form>
        
            <div class="bouton1">
                    <form action="../controllers/SuppLogement.php?capteur=<?php echo $_SESSION['selected_logement'] ?>" 
                    method="get" onsubmit="return confirm
                    ('Etes-vous sûr de vouloir supprimer ce logement?')">
                        <input  value="Supprimer" type="submit">
                    </form>   
                </div>
		</div>
    </section>
    
    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>
</html>

