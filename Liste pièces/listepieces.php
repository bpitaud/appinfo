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
        <link rel="stylesheet" href="listepiecescss.css" />
        <title>Domisep - Liste des pièces</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>

    <body>
        <header>
        <div class="wrapper">
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <li><a href="../Liste logements/listelogements.php"><span>Home</span></a></li>
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
        <?php echo "<a href='../Liste logements/listelogements.php?user=".$_SESSION["utilisateurID"]."'> < Retour </a>";?> 
        <h2>Pièce(s) du logement</h2>
    	<div id="pieces">
            <?php
            require_once ('../controllers/FormulaireAjoutPiece.php');
                        $piece = RecupPieceController($_SESSION["selected_logement"]);
                        foreach ($piece as $piece){
                            echo ('
                            <div class="block" >
                                <div class="figure">
                                    <p> <a href = "../Liste capteurs/listecapteurs.php" ><img src="../Images/iconesalon.png" alt="photo de salon" width="128" height="128"></p> 
                                </div>
                                <div class="Caractere"> 
                                    '.$piece[1].'
                                <p><a href = "../Modifierpiece/Modifierpiece.php"> <img src="../Images/iconereglageblanc.png" alt="logo réglage" widt="46" height="46"/></a></p>
                                </div>
                                
                            </div>
                            ');
                        }
                        
                        /*for ($i = 0; $i < count($list) ;$i++) {
                            echo'
                            <div class="block" >
                                <div class="figure">
                                    <p> <a href = "../Liste capteurs/listecapteurs.php" ><img src="../Images/iconesalon.png" alt="photo de salon" width="128" height="128"></p> 
                                </div>
                                <div class="Caractere"> 
                                    '.$list[$i].'
                                <p><a href = "../Modifierpiece/Modifierpiece.php"> <img src="../Images/iconereglageblanc.png" alt="logo réglage" widt="46" height="46"/></a></p>
                                </div>
                                
                            </div>
                            ';
                        }*/
            ?>
            <?php
            echo "
            <div class='block'> 
                <div class='figure'>
                    <div class='plus' >   
                    <a href='../AjoutPiece/AjoutPiece.php?selected=".$_SESSION["selected_logement"]."'> <input type='button' value='+'></a>               
                    </div>      
                </div>
             
            </div>";
        ?>
    </section>

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body> 