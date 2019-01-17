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
                    <?php
                    echo'
       				<input type="text" name="nom" placeholder="'.$piece[1].'" />
                      <input type="text" name="surface" placeholder="'.$piece[2].'" />';
                    ?>
              <div class="bouton">
                <?php
                echo '
                <a type="submit" href="../Liste pièces/listepieces.php?log='.$piece[3].'">Annuler</a>';
                ?>
                <input type="submit" value="Valider">
              
            </div>
            </form>
            
            <div class="bouton1">
                    <form action="../controllers/SuppPiece.php?capteur=<?php echo $_SESSION['selected_piece'] ?>" 
                    method="get" onsubmit="return confirm
                    ('Etes-vous sûr de vouloir supprimer cette pièce?')">
                        <input  value="Supprimer" type="submit">
                    </form>   
                </div>

		</div>
    </section>
    
    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>


