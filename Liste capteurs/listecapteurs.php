<?php
//session_start();
//require_once('../Models/database.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="codecapteur.css" />
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

    
    <div id="retour">
    <a href="../mesInfosUser/MesInfosUser.php">< Retour</a>
    </div>

    <h2> Salon </h2>

    <article>
    	<div id="capteurs">
        <?php
        /*
        $listCapteurName = getCapteurName($_SESSION["pieceID"]);
        $listControleurName = getControleurName($_SESSION["pieceID"]);
        print_r ($listCapteurName);
        $listCapteurID = getCapteurID($_SESSION["pieceID"]);
        $listControleurID = getControleurID($_SESSION["pieceID"]);
        print_r ($listControleurID);
        */
        require_once('../controllers/FormulaireAjoutCapteur.php');
        $listCapteurName = getCapteurName('1');
        $listControleurName = getControleurName('1');
        $listCapteurID = getCapteurID('1');
        $listControleurID = getControleurID('1');
        $html = "";
        $idBlock = 0;
        echo $idBlock;
        if (empty($listCapteurID) != 1){ // Si la liste capteurID est vide cela ne sert à rien d'executer ce code
            for ($i = 0; $i < count($listCapteurID) ;$i++) {
                $type = getCapteurType($listCapteurID[$i]);
                $etat = getCapteurEtat($listCapteurID[$i]);
                if (getCapteurEtat($listCapteurID[$i])==0 ) { // Image du type éteint
                    $onOff = 'off';
                    $idBlock++;
                    echo $idBlock;
                    $html .= '
                    <section class="block" id = "'.$idBlock.'" onClick="reply_click(this.idBlock)"> 
                    <div class = "blanc">
                    <div class="figure" >';
                    //echo getCapteurType($listCapteurID[$i]);
                    switch (getCapteurType($listCapteurID[$i])){ //OR getControlleurType($listID[$i])
                        case "lumière": //1:
                            $html .= '<p> <a href = "#"> <img src="../Images/capteur/off/iconeLumiere.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p>';
                            break;
                        case "caméra de surveillance":
                            $html .= '<p><a href = "#"><img src="../Images/capteur/off/iconeCamera.png" alt="photo de cadenas"width="128" height="128"/></a></p>';
                            break;
                        case "humidité":
                            $html .= '<p> <a href = "#"> 70%  </a> </p>';
                            break;
                        case "température":
                            $html .= '<p> <a href = "#"> 20°  </a> </p>';
                            break; 
                    }
                } // image du type allumé
                else {
                    $onOff = 'on';
                    $idBlock++;
                    echo $idBlock;
                    $html .= '
                    <section class="block" id = "'.$idBlock.'"  onClick="reply_click(this.idBlock)"> 
                    <div class = "jaune">
                    <div class="figure" >';
                    switch (getCapteurType($listCapteurID[$i])){
                        case "lumière":
                            $html .= '<p> <a href = "#"> <img src="../Images/capteur/on/iconeLumiere.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p>';
                            break;
                        case "caméra de surveillance":
                            $html .= '<p><a href = "#"><img src="../Images/capteur/on/iconeCamera.png" alt="photo de cadenas"width="128" height="128"/></a></p>';
                            break;
                        case "humidité":
                            $html .= '<p> <a href = "#"> 70%  </a> </p>';
                            break;
                        case "température":
                            $html .='<p> <a href = "#"> 20°  </a> </p>';
                            break;
                    }
                }
                $html .= 
        '   </div>
            <div class="caractère"> 
                '.$listCapteurName[$i].'
                <p><img src="../Images/capteur/'.$onOff.'/iconeReglage.png" alt="logo réglage" width="39" height="39"/></p>
            </div>
        </div>
        </section> '; 
            }
        }
        //Controller 
        if (empty($listControleurID) != 1){ // Si la liste controleurID est vide cela ne sert à rien d'executer ce code
            for ($i = 0; $i < count($listControleurID) ;$i++) { //off
                $etat = getControleurEtat($listControleurID[$i]);
                $type = getControleurType($listControleurID[$i]);
                if (getControleurEtat($listControleurID[$i])==0 ) { // Image du type éteint
                    $onOff = 'off';
                    $idBlock++;
                    echo $idBlock;
                    $html .= '
                    <section class="block" id = "'.$idBlock.'"  onClick="reply_click(this.idBlock)"> 
                    <div class = "blanc">
                    <div class="figure" >';
                    //echo getControleurType($listControleurID[$i]);
                    switch (getControleurType($listControleurID[$i])){ //OR getControlleurType($listID[$i])
                        case "chauffage":
                            $html .= '<p><a href = "#"><img src="../Images/capteur/off/iconeChauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p>';
                            break;
                    }
                } else { //on
                    $onOff = 'on';
                    $idBlock++;
                    echo $idBlock;
                    $html .= '
                    <div class="block"id = "'.$idBlock.'"  onClick="reply_click(this.idBlock)"> 
                    <div class = "jaune">
                    <div class="figure" >';
                    switch (getControleurType($listControleurID[$i])){
                        case "chauffage":
                        $html .= '<p><a href = "#"><img src="../Images/capteur/on/iconeChauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p>';
                        break;
                    }
                }
                $html .= 
        '       <progress id="avancement" value="50" max="100"></progress>
                <span id="pourcentage"></span>
                <input type="button" onclick="modif(-10);" value="-">
                <input type="button" onclick="modif(10);" value="+">
                <script type ="text/javascript" src="codecapteur.js"> </script>
            </div>
            <div class="caractère"> 
                '.$listControleurName[$i].'
                <p><img src="../Images/capteur/'.$onOff.'/iconeReglage.png" alt="logo réglage" width="39" height="39"/></p>
            </div>
        </div>
        </section> ';
            }
        }
        echo $html;
        // Prend 

        // Faire java script pour le onclic les images et le nom du capteur passe en jaune et modifie dans la base de donnée l'état à 1
        ?>


        <!--
            <!- lumiere ->
            <div class="block"> 
                <div class="figure" >
                    <p> <a href = "#"> <img src="../Images/iconelumiereblanche.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p> 
                </div>
                <div class="caractère"> 
                    Lumière<br>principal
                    <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                </div>
            </div>  

            <!- Lampe ->
            <div class="block"> 
                <div class="figure">
                    <p><a href = "#"><img src="../Images/iconelumierejaune.png" alt="photo de lumiere"width="128" height="128"/></a></p>
                </div>
                <div class="caractère"> 
                    <div class="lampe" > 
                        Lampe <br> de chevet 
                    </div>
                    <p><img src="../Images/iconereglagejaune.png" alt="logo réglage allumé" width="39" height="39"/></p>
                </div>
            </div>  

            <!- Humidite ->
            <div class="block"> 
                <div class="figure" >
                    <div class="pourcentage"> 
                        <p> <a href = "#"> 70%  </a> </p> 
                    </div> 
                </div>
                <div class="caractère" > 
                    Humidité
                    <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                </div>
            </div>

            <!- camera ->
            <div class="block">
                <div class="figure">
                    <p><a href = "#"><img src="../Images/iconecadenas.png" alt="photo de cadenas"width="128" height="128"/></a></p>
                </div>
                <div class="caractère"> 
                    Caméra de <br> surveillance
                    <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                </div>
            </div> 

            <!- chauffage ->
            <div class="block"> 
                <div class="figure">
                    <p><a href = "#"><img src="../Images/iconechauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p>
                </div>
                <div class="caractère"> 
                    Chauffage
                    <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                </div>
            </div>   
            -->

            <!-- + -->
            <div class="block">       
                <div class= "figure"> 
                    <div class="plus">
                        <p> <a href = "../AjoutCapteur/AjoutCapteur.php"> + </a> </p> 
                    </div>
                </div>
                <div class="caractère">
                    Ajouter <br/> un capteur 
                </div>
            </div>
        </div>
        <script type="text/javascript">
        //document.getElementByTagName("section").addEventListener("click", getIdBlock);
        /*function reply_click(clicked_idBlock){
            alert(clicked_idBlock);
        }*/

        
            var sections = document.getElementsByTagName("section");
            var sectionsCount = sections.length;
            for (var i = 0; i <= sectionsCount; i += 1) {
                sections[i].onclick = function(e) {
                 alert(this.id);
                };
            }
        

        </script>
    <?php
        //require_once('../controllers/ModifControleurs.php');
        //require_once('../controllers/ModifCapteurs.php');
        //ModifEtatCapteur($capteurID, $etat);
    ?>
</article>

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>
</html>