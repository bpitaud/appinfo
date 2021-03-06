<?php 
session_start();
$_SESSION['language'] ='fr';

if (isset($_GET['piece']) && $_GET['piece'] != '') {
    $_SESSION['selected_piece'] = $_GET['piece'];
} 
if(!isset($_SESSION["connexion"]) || $_SESSION["connexion"] == 0) {
    header("Location: connexion.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/Modifierpiece.css" />
    <title>Domisep - Modification d'une pièce</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>
            <?php 
            require ('../controllers/ModifPieces.php');
            $pieceID = $_SESSION['selected_piece'];
            $piece = RecupPieceModif($pieceID);
            echo '
    		<a href="../Views/listepieces.php?log='.$piece[0][3].'">  < Retour	
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
                <a type="submit" href="../Views/listepieces.php?log='.$piece[3].'">Annuler</a>';
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

    
</body>
</html>


