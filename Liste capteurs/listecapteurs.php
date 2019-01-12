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
    ?>
    </div>
    <article>
    	<div id="capteurs">
        <?php
            require_once __DIR__.'/../controllers/FormulaireAjoutCapteur.php';
            $capteurs = RecupCapteurControleur($_SESSION['selected_piece']);
            if (count($capteurs) == 0) {
                echo "<li> Vous n'avez pas encore de capteurs pour cette pièce.</li>";
            } else {
                foreach ($capteurs as $capteur) {
                    $type=$capteur[2];
                    if ($type == 'lumiere'){
                        echo '
                        <div class="'.$capteur[1].' block"> 
                            <div class="component-on figure show" >
                                <p> <a href = "#"> <img src="../Images/Capteur/on/iconeLumiere.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p> 
                            </div>
                            <div  class="component-off figure hide">
                            <p><a href = "#"><img src="../Images/Capteur/off/iconeLumiere.png" alt="photo de lumiere"width="128" height="128"/></a></p>
                        </div>
                            <div class="caractère">' 
                                .$capteur[0].'
                                <p><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                            </div>
                        </div>  ';}
                    elseif ($type == 'humidite'){
                        echo '
                        <div class="block"> 
                            <div class="figure" >
                                <div class="pourcentage"> 
                                    <p>  70%  </a> </p> 
                                </div> 
                            </div>
                            <div class="caractère" > 
                                '.$capteur[0].'
                            <p><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                            </div>
                        </div>';}
                    elseif ($type == 'camera'){
                        echo '
                        <div class="'.$capteur[1].' block">
                            <div class="component-on figure show">
                                <p><a href = "#"><img src="../Images/Capteur/on/iconeCamera.png" alt="photo de cadenas"width="128" height="128"/></a></p>
                            </div>
                            <div  class="component-off figure hide">
                            <p><a href = "#"><img src="../Images/Capteur/off/iconeCamera.png" alt="photo de cadenas"width="128" height="128"/></a></p>
                        </div>
                            <div class="caractère"> 
                                '.$capteur[0].'
                                <p><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                            </div>
                        </div> ';}
                    elseif ($type == 'chauffage'){
                        echo '
                        <div class="'.$capteur[1].' block"> 
                            <div class="component-on figure show">
                                <p><a href = "#"><img src="../Images/Capteur/on/iconeChauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p>
                            </div>
                            <div  class="component-off figure hide">
                            <p><a href = "#"><img src="../Images/Capteur/off/iconeChauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p>
                        </div>
                            <div class="caractère"> 
                                '.$capteur[0].'
                            <p><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                            </div>
                        </div>';}
                                
                }
            }

                ?>
         

            
            <div class="block">       
                <div class= "figure"> 
                    <div class="plus">
                        <?php
                        echo'
                        <p> <a href = "../AjoutCapteur/AjoutCapteur.php?piece='.$_SESSION['selected_piece'].'"> + </a> </p>'; 
                        ?>
                    </div>
                </div>
                <div class="caractère">
                    Ajouter <br/> un capteur 
                </div>
            </div>
        </div>
        <script type="text/javascript">
        document.getElementByTagName("section").addEventListener("click", getIdBlock);
        function reply_click(clicked_idBlock){
            alert(clicked_idBlock);
        }

        
            var sections = document.getElementsByTagName("section");
            var sectionsCount = sections.length;
            for (var i = 0; i <= sectionsCount; i += 1) {
                sections[i].onclick = function(e) {
                 alert(this.id);
                };
            }
        

        </script>
    
</article>

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>
</html>