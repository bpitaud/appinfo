<?php
session_start();

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
        <link rel="stylesheet" href="../css/codecapteur.css" />
        <title>Domisep - Liste des capteurs</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="codecapteur.js"></script>
        <script src="codecontroleur.js"></script>
        <?php include('header_user.php') ?>

    </head>

    <body>
    
    <div id="retour">
    <?php
    require_once ('../controllers/ModifPieces.php');
    $pieceID = $_SESSION['selected_piece'];
    $piece = RecupPieceModif($pieceID);
    echo '
    <a href="../Views/listepieces.php?log='.$piece[0][3].'">  < Retour	
    </a>';
    require_once ('../Models/pieces.php');

                $piece = $_SESSION['selected_piece'];
                $pie = RecupPiecebyID($piece);
                echo'
                <h2>Capteur(s) de la pièce '.$pie[0][1].'</h2>';
    ?>

<?php
                $modif = input_test($_GET['modif']);
                if (isset($modif)) {
                    if ($modif == "true") {
                        echo "<p style='color:white;'>Votre capteur a bien été modifié.</p>";
                    } else if ($modif == "false") {
                        echo "<p style='color:red;'>Votre capteur n'a pas été modifié.</p>";
                    }
                }
                ?>

<?php
                $supp = input_test($_GET['supp']);
                if (isset($supp)) {
                    if ($supp == "true") {
                        echo "<p style='color:white;'>Votre capteur a bien été supprimé.</p>";
                    } else if ($supp == "false"){
                        echo "<p style='color:red;'>Votre capteur n'a pas été supprimé.</p>";
                    }
                }
                ?>

<?php
                $supp = input_test($_GET['capteur']);
                if (isset($supp)) {
                    if ($supp == "existe") {
                        echo "<p style='color:red;'>Ce capteur existe déjà pour vous ou un autre utilisateur.</p>";
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
                        if ($capteur[4] == true) {
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
                            <p><a href = "../Views/ModifCapteur.php?capteur='.$capteur[1].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                            '.$capteur[0].'
                            </div>
                        </div>  ';    
                        } else {
                            echo '
                        <div class="'.$capteur[1].' block"> 
                            <div class="component-on figure hide" >
                                <p style="color:#FFDA44"> <a href = "#"> <img src="../Images/Capteur/on/iconeLumiere.png" alt="photo de lumiere eteinte" width="128" height="128"/></a>
                                <br/><br/> ON </p> 
                            </div>
                            <div  class="component-off figure show">
                            <p><a href = "#"><img src="../Images/Capteur/off/iconeLumiere.png" alt="photo de lumiere"width="128" height="128"/></a>
                            <br/><br/> OFF </p>
                        </div>
                            <div class="caractère">
                            <p><a href = "../Views/ModifCapteur.php?capteur='.$capteur[1].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                            '.$capteur[0].'
                            </div>
                        </div>  ';
                        }
                    }
                    elseif ($type == 'humidite'){
                        if ($capteur[4] == true) {
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
                            <p><a href = "../Views/ModifCapteur.php?capteur='.$capteur[1].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                            '.$capteur[0].'
                            </div>
                        </div>';}
                        else {
                            echo '
                        <div class="'.$capteur[1].' block"> 
                            <div class="component-on figure hide" style=" color:#FFDA44" >
                                <div style=" color:#FFDA44" class="pourcentage"> 
                                    <p style=" color:#FFDA44">  5%  </a>
                                    </p> 
                                </div> 
                                <br/><br/> ON 
                            </div>
                            <div class="component-off figure show" style=" color: white" >
                                <div class="pourcentage"> 
                                    <p style=" color:white">  5%  </a> 
                                    </p>
                                </div> 
                                <br/><br/> OFF 
                            </div>
                            <div class="caractère" > 
                            <p><a href = "../Views/ModifCapteur.php?capteur='.$capteur[1].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                            '.$capteur[0].'
                            </div>
                        </div>';}
                        }
                    elseif ($type == 'camera'){
                        if ($capteur[4] == true) {
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
                            <p><a href = "../Views/ModifCapteur.php?capteur='.$capteur[1].'"> <img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                                '.$capteur[0].'
                            </div>
                        </div> ';}
                        else {
                            echo '
                            <div class="'.$capteur[1].' block">
                                <div class="component-on figure hide">
                                    <p style=" color:#FFDA44"><a href = "#"><img src="../Images/Capteur/on/iconeCamera.png" alt="photo de cadenas"width="128" height="128"/></a>
                                    <br/><br/> ON </p>
                                </div>
                                <div  class="component-off figure show">
                                <p><a href = "#"><img src="../Images/Capteur/off/iconeCamera.png" alt="photo de cadenas"width="128" height="128"/></a>
                                <br/><br/> OFF </p>
                            </div>
                                <div class="caractère">
                                <p><a href = "../Views/ModifCapteur.php?capteur='.$capteur[1].'"> <img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                                    '.$capteur[0].'
                                </div>
                            </div> ';} 
                        }
                    
                    elseif ($type == 'temperature'){
                        if ($capteur[4] == true) {
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
                            <p><a href = "../Views/ModifCapteur.php?capteur='.$capteur[1].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                            '.$capteur[0].'
                            </div>
                        </div>';}
                        else {
                            echo '
                        <div class="'.$capteur[1].' block"> 
                            <div class="component-on figure hide" style=" color:#FFDA44" >
                                <div class="pourcentage"> 
                                    <p style=" color:#FFDA44">  22°C  </a>
                                    </p> 
                                </div> 
                                <br/><br/> ON 
                            </div>
                            <div class="component-off figure show" style=" color: white" >
                                <div class="pourcentage"> 
                                    <p style=" color:white">  22°C  </a> 
                                    </p>
                                </div> 
                                <br/><br/> OFF 
                            </div>
                            <div class="caractère" > 
                            <p><a href = "../Views/ModifCapteur.php?capteur='.$capteur[1].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                            '.$capteur[0].'
                            </div>
                        </div>';}
                        }
                }
                foreach ($controleurs as $controleurs) {
                    $type=$controleurs[2];
                    $etat =$controleurs[3];

                    if ($etat == '0') {
                        echo '
                    <div class="'.$controleurs[0].' block"> 
                        
                        <div  class="fig show">
                        <p><a href = "#"><img src="../Images/Capteur/off/iconeChauffage.png" alt="photo de chauffage"width="128" height="128"/></a>
                        <br/><br/> OFF </p>
                        </p>
                    </div>
                        <div class="caractère"> 
                        <p><a href = "../Views/ModifControleur.php?capteur='.$controleurs[0].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                            '.$controleurs[1].'
                       
                        <div class = "compteur">
                            <div class="img image-up">
                            <form action="../controllers/changementetatcontroleur.php" method="post">
                            <input type="hidden" value='.$controleurs[0].' name="controleur" id="controleur"/>
                            <input type="hidden" value="add_etat" name="up" id="up"/>
                            <button type="submit" name ="up"> <img src="../Images/sort-up.png" style="height:20px;width:20px;" alt="Submit"></button>
                            </form>
                            </div>
                            
                             
                                <div id="number">'.$etat.'</div>
                            
                                
                        </div>

                        
                    </div>';}

                    else if ($etat == '5') {
                    
                    echo '
                    <div class="'.$controleurs[0].' block"> 
                        <div class="fig show">
                            <p style=" color:#FFDA44"><a href = "#"><img src="../Images/Capteur/on/iconeChauffage.png" alt="photo de chauffage"width="128" height="128"/></a>
                            <br/><br/> ON </p>
                            </p>
                        </div>
                        
                        
                        <div class="caractère"> 
                        <p><a href = "../Views/ModifControleur.php?capteur='.$controleurs[0].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                            '.$controleurs[1].'                          

                            <div class = "compteur">
                            
                            <div class="img image-down">
                            <form action="../controllers/changementetatcontroleur.php" method="post">
                            <input type="hidden" value='.$controleurs[0].' name="controleur" id="controleur"/>
                            <input type="hidden" value="del_etat" name="down" id="down"/>
                            <button type="submit" name ="down"> <img src="../Images/sort-down.png" style="height:20px;width:20px;" alt="Submit"></button>
                            </form>
                            </div>
                             
                            <div id="number">'.$etat.'</div>
                            
                                
                        </div>
                    </div>';}

                    else if ($etat == '1' or $etat=='2' or $etat=='3' or $etat=='4') {
                    
                        echo '
                        <div class="'.$controleurs[0].' block"> 
                            <div class="fig show">
                                <p style=" color:#FFDA44"><a href = "#"><img src="../Images/Capteur/on/iconeChauffage.png" alt="photo de chauffage"width="128" height="128"/></a>
                                <br/><br/> ON </p>
                                </p>
                            </div>
                           
                            
                            <div class="caractère"> 
                            <p><a href = "../Views/ModifControleur.php?capteur='.$controleurs[0].'"><img src="../Images/Capteur/off/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></a></p>
                                '.$controleurs[1].' 
                                                          

                                <div class = "compteur">
                            <div class="img image-up">
                            <form action="../controllers/changementetatcontroleur.php" method="post">
                            <input type="hidden" value='.$controleurs[0].' name="controleur" id="controleur"/>
                            <input type="hidden"  value="add_etat" name="up" id="up"/>
                            <button type="submit" name ="up" > <img src="../Images/sort-up.png" style="height:20px;width:20px;" alt="Submit"></button>
                            </form>
                            </div>
                            <div class="img image-down">
                            <form action="../controllers/changementetatcontroleur.php" method="post">
                            <input type="hidden" value='.$controleurs[0].' name="controleur" id="controleur"/>
                            <input type="hidden" value="del_etat" name="down" id="down"/>
                            <button type="submit" name ="down"> <img src="../Images/sort-down.png" style="height:20px;width:20px;" alt="Submit"></button>
                            </form>
                            </div>
                             
                            <div id="number">'.$etat.'</div>
                            
                                
                        </div>
                        </div>';}
                    }
                }        
            

            ?> 
           
        </div>
        

            <?php
            echo'
            </div>
            <a href="../Views/AjoutCapteur.php?piece='.$_SESSION['selected_piece'].'"> <div class="ajoutcapteur">
             <p>+  Ajouter un capteur</p>  
        </div></a>';
        ?>

</section>
    
</body>
</html>