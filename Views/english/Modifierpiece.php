<?php 
session_start();
$_SESSION['language'] ='en';

if (isset($_GET['piece']) && $_GET['piece'] != '') {
    $_SESSION['selected_piece'] = $_GET['piece'];
} 
// if(!isset($_SESSION["connexion"]) or $_SESSION["connexion"] = 0  or empty($_SESSION["connexion"])) {
//     header("Location: connexion.php");
// }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../css/Modifierpiece.css" />
    <title>Domisep - Modify a room</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
</head>
<body>

    <section>
    	<div class="retour">
    		<p>
            <?php 
            require ('../../controllers/ModifPieces.php');
            $pieceID = $_SESSION['selected_piece'];
            $piece = RecupPieceModif($pieceID);
            echo '
    		<a href="../english/listepieces.php?log='.$piece[0][3].'">  < Back	
            </a>';
            ?>
    	</p>
    	</div>
        <?php
            foreach ($piece as $piece){
                echo"
        <h1>Modify the room: ".$piece[1]."<span>.................</span></h1>";
    }
        ?>		<div class="formulaire">
            <form method="post" action="../../controllers/ModifPieces.php">
                    <?php
                    echo'
       				<input type="text" name="nom" placeholder="'.$piece[1].'" />
                      <input type="text" name="surface" placeholder="'.$piece[2].'" />';
                    ?>
              <div class="bouton">
                <?php
                echo '
                <a type="submit" href="../english/listepieces.php?log='.$piece[3].'">Cancel</a>';
                ?>
                <input type="submit" value="Submit">
              
            </div>
            </form>
            
            <div class="bouton1">
                    <form action="../../controllers/SuppPiece.php?capteur=<?php echo $_SESSION['selected_piece'] ?>" 
                    method="get" onsubmit="return confirm
                    ('Are you sure you want to delete this room?')">
                        <input  value="Delete" type="submit">
                    </form>   
                </div>

		</div>
    </section>

    
</body>
</html>


