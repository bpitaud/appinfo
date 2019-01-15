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
        <link rel="stylesheet" href="codecapteur.css" />
        <title>Domisep - Liste des capteurs</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="codecapteur.js"></script>

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

    
    <div id="retour">
    <?php
    require_once ('../controllers/ModifPieces.php');
    $pieceID = $_SESSION['selected_piece'];
    $piece = RecupPieceModif($pieceID);
    echo '
    <a href="../Liste pièces/listepieces.php?log='.$piece[0][3].'">  < Retour	
    </a>';
    require_once ('../Models/pieces.php');

                $piece = $_SESSION['selected_piece'];
                $pie = RecupPiecebyID($piece);
                echo'
                <h2>Capteur(s) de la pièce '.$pie[0][1].'</h2>';
    ?>

<?php
                $modif = $_GET['modif'];
                if (isset($modif)) {
                    if ($modif == "true") {
                        echo "<p style='color:white;'>Votre capteur a bien été modifié.</p>";
                    } else {
                        echo "<p style='color:red;'>Votre capteur n'a pas été modifié.</p>";
                    }
                }
                ?>

    </div>
    <section>
    	<div id="capteurs">
        <?php
            require_once __DIR__.'/../controllers/FormulaireAjoutCapteur.php';
            $capteurs = RecupCapteurControleur($_SESSION['selected_piece']);
            $controleurs = RecupControleursController($_SESSION['selected_piece']);

            if (count($capteurs) == 0 && count($controleurs)==0) {
                echo "<li> Vous n'avez pas encore de capteurs pour cette pièce.</li>";
            } elseif (count($capteurs) !== 0 or count($controleurs) !==0){
                foreach ($capteurs as $capteur) {
                    $type=$capteur[2];
                    if ($type == 'lumiere'){
                        echo '
                        <div class="'.$capteur[1].' block"> 
                            <div class="component-on figure show" >
                                <p style="color:#FFDA44"> <a href = "#"> <img src="../Images/Capteur/on/iconeLumiere.png" alt="photo de lumiere eteinte" width="128" height="128"/></a>
                                <br/><br/> ON </p> 
                            </div>
                            <div  class="component-off figure hide">
                            <p><a href = "#"><img src="../Images/Capteur/off/iconeLumiere.png" alt="photo de lumiere"width="128" height="128"/></a>
                            <br/><br/> OFF </p>
                        </div>
                            <div class="caractère">
                            <p><a href = "../ModifierCapteur/ModifCapteur.php?capteur='.$capteur[1].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                            '.$capteur[0].'
                            </div>
                        </div>  ';}
                    elseif ($type == 'humidite'){
                        echo '
                        <div class="'.$capteur[1].' block"> 
                            <div class="component-on figure show" style=" color:#FFDA44" >
                                <div style=" color:#FFDA44" class="pourcentage"> 
                                    <p style=" color:#FFDA44">  5%  </a>
                                    </p> 
                                </div> 
                                <br/><br/> ON 
                            </div>
                            <div class="component-off figure hide" style=" color: white" >
                                <div class="pourcentage"> 
                                    <p style=" color:white">  5%  </a> 
                                    </p>
                                </div> 
                                <br/><br/> OFF 
                            </div>
                            <div class="caractère" > 
                            <p><a href = "../ModifierCapteur/ModifCapteur.php?capteur='.$capteur[1].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                            '.$capteur[0].'
                            </div>
                        </div>';}
                    elseif ($type == 'camera'){
                        echo '
                        <div class="'.$capteur[1].' block">
                            <div class="component-on figure show">
                                <p style=" color:#FFDA44"><a href = "#"><img src="../Images/Capteur/on/iconeCamera.png" alt="photo de cadenas"width="128" height="128"/></a>
                                <br/><br/> ON </p>
                            </div>
                            <div  class="component-off figure hide">
                            <p><a href = "#"><img src="../Images/Capteur/off/iconeCamera.png" alt="photo de cadenas"width="128" height="128"/></a>
                            <br/><br/> OFF </p>
                        </div>
                            <div class="caractère">
                            <p><a href = "../ModifierCapteur/ModifCapteur.php?capteur='.$capteur[1].'"> <img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                                '.$capteur[0].'
                            </div>
                        </div> ';}
                    
                    elseif ($type == 'temperature'){
                        echo '
                        <div class="'.$capteur[1].' block"> 
                            <div class="component-on figure show" style=" color:#FFDA44" >
                                <div class="pourcentage"> 
                                    <p style=" color:#FFDA44">  22°C  </a>
                                    </p> 
                                </div> 
                                <br/><br/> ON 
                            </div>
                            <div class="component-off figure hide" style=" color: white" >
                                <div class="pourcentage"> 
                                    <p style=" color:white">  22°C  </a> 
                                    </p>
                                </div> 
                                <br/><br/> OFF 
                            </div>
                            <div class="caractère" > 
                            <p><a href = "../ModifierCapteur/ModifCapteur.php?capteur='.$capteur[1].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                            '.$capteur[0].'
                            </div>
                        </div>';}
                }
                foreach ($controleurs as $controleurs) {
                    $type=$controleurs[2];

                    if ($type == 'chauffage'){
                        echo '
                        <div class="'.$controleurs[0].' block"> 
                            <div class="component-on figure show">
                                <p style=" color:#FFDA44"><a href = "#"><img src="../Images/Capteur/on/iconeChauffage.png" alt="photo de chauffage"width="128" height="128"/></a>
                                <br/><br/> ON </p>
                                </p>
                            </div>
                            <div  class="component-off figure hide">
                            <p><a href = "#"><img src="../Images/Capteur/off/iconeChauffage.png" alt="photo de chauffage"width="128" height="128"/></a>
                            <br/><br/> OFF </p>
                            </p>
                        </div>
                            <div class="caractère"> 
                            <p><a href = "../ModifierControleur/ModifControleur.php?capteur='.$controleurs[0].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                                '.$controleurs[1].'
                            </div>
                        </div>';}
                    }        
                }

                ?>        
            </div>
        

            <?php
            echo'
            </div>
            <a href="../AjoutCapteur/AjoutCapteur.php?piece='.$_SESSION['selected_piece'].'"> <div class="ajoutcapteur">
             <p>+  Ajouter un capteur</p>  
        </div></a>';
        ?>

</section>

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>
</html>