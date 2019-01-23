<?php 
session_start();
$_SESSION['language'] ='en';

if (isset($_GET['log']) && $_GET['log'] != '') {
    $_SESSION['selected_logement'] = $_GET['log'];
}
// if(!isset($_SESSION["connexion"]) or $_SESSION["connexion"] = 0  or empty($_SESSION["connexion"])) {
//     header("Location: connexion.php");
// }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../css/ModifierLogement.css" />
    <title>Domisep - Modify a home</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>   
           <a href='../english/listelogements.php'> < Back </a>    
    	</p>
        </div>
        <?php
        require ('../../controllers/ModifLogements.php');
        $logementID = $_SESSION['selected_logement'];
        $logement = RecupLogement($logementID);
                echo"
        <h1>Modify a home: ".$logement[0][1]."<span>.................</span></h1>";
        ?>
		<div class="formulaire">
            <form method="post" action="../../controllers/ModifLogements.php">
            <?php
            echo'
   			
       				<input type="text" name="nom" placeholder="'.$logement[0][1].'" />
      				<input type="text" name="adresse" placeholder="'.$logement[0][2].'" />
       				<input type="text" name="codepostale" placeholder="'.$logement[0][3].'" />
       				<input type="text" name="surface" placeholder="'.$logement[0][4].'" >
       				<select name="pays" placeholder="'.$logement[0][6].'" >
       					<option value="france"> France </option>
       					<option value="royaume-uni"> United Kingdom </option>
       					<option value="espagne"> Spain </option>
       					<option value="italie"> Italy </option>
       					<option value="etats-unis"> United States </option>
       					<option value="canada"> Canada </option>
       					<option value="chine"> China </option>
       					<option value="japon"> Japan </option>     	
                       </select>';
                ?>
            
              <div class="bouton">
                <a type="submit" href="../english/listelogements.php">Cancel</a>
                <input type="submit" value="Submit">
              
            </div>	
            </form>
        
            <div class="bouton1">
                    <form action="../../controllers/SuppLogement.php?capteur=<?php echo $_SESSION['selected_logement'] ?>" 
                    method="get" onsubmit="return confirm
                    ('Are you sure you want to delete this home?')">
                        <input  value="Delete" type="submit">
                    </form>   
                </div>
		</div>
    </section>
    
</body>
</html>

