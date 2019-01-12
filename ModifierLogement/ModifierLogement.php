<?php 
session_start();

if (isset($_GET['selected']) && $_GET['selected'] != '') {
    $_SESSION['selected_logement'] = $_GET['selected'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="ModifierLogement.css" />
    <title>Modification d'un Logement</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

	<header>
        <div class="wrapper">
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <li>
                        <a href="../Liste logements/listelogements.php"><span>Home</span></a>
                    </li>
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
                    </li>
                    <li>
                        <div class="dropdown">
                            <div id="noHoverUser">
                                    <button class="boutonmenuprincipal"><p></p></button>
                            </div>
                            <div id="hoverUser">
                                <button class="boutonmenuprincipal"><p></p></button>
                                <?php
                                echo '
                                <a href="../mesInfosUser/MesInfosUser.php?user='.$logement[0][5].'"><p>Mes infos</p></a>';
                                ?>
                                <a href="../NousContacter/NousContacter.php"><p>Contacter</p></a>
                                <a href="../controllers/deconnexion.php"><p id="borderNone">Deconnexion</p></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section>
    	<div class="retour">
    		<p>   
           <a href='../Liste logements/listelogements.php'> < Retour </a>    
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
   				<p>
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
            
              <div id="bouton">
                <a type="submit" href="../Liste logements/listelogements.php">Annuler</a>
                
                <input onclick="myFunction()" value="Supprimer" type="submit">


                <script>
                function myFunction() {
                    var txt;
                    var r = confirm("Etes-vous sûr de vouloir supprimer ce logement?");
                    if (r == true) {
                        href = "../RechercherPar/RechercherPar.php";
                    } else {
                        txt = "none";
                    }
                    document.getElementById("demo").innerHTML = txt;
                }
                </script>
 
                <input type="submit" value="Valider">
              
            </div>
   				</p>
			</form>
		</div>
    </section>
    
    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>
</html>

