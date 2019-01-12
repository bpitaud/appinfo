<?php 
session_start();

if (isset($_GET['piece']) && $_GET['piece'] != '') {
    $_SESSION['selected_piece'] = $_GET['piece'];
} 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="Modifierpiece.css" />
    <title>Modification d'une pièce</title>
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
                                <a href="../mesInfosUser/MesInfosUser.php"><p>Mes infos</p></a>
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
            <?php 
            require ('../controllers/ModifPieces.php');
            $pieceID = $_SESSION['selected_piece'];
            $piece = RecupPieceModif($pieceID);
            echo '
    		<a href="../Liste pièces/listepieces.php?log='.$piece[0][3].'">  < Retour	
            </a>';
            ?>
    	</p>
    	</div>
        <?php
            foreach ($piece as $piece){
                echo"
        <h1>Modifier une pièce: ".$piece[1]."<span>.................</span></h1>";
    }
        ?>		<div class="formulaire">
            <form method="post" action="../controllers/ModifPieces.php">
            
   				<p>
                    <?php
                    echo'
       				<input type="text" name="nom" placeholder="'.$piece[1].'" />
                      <input type="text" name="surface" placeholder="'.$piece[2].'" />';
                    ?>
              <div id="bouton">
                <?php
                echo '
                <a type="submit" href="../Liste pièces/listepieces.php?log='.$piece[3].'">Annuler</a>';
                ?>
                <input onclick="myFunction()" value="Supprimer" type="submit">


                <script>
                function myFunction() {
                    var txt;
                    var r = confirm("Etes-vous sûr de vouloir supprimer cette pièce?");
                    if (r == true) {
                        href = "../Liste pièces/listepiece.php";
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


