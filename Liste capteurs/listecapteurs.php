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

    <section>
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
        $html1 = '<div class="block"> 
        <div class="figure" >';
        $html2 = "";
        $html3 = "";
        $html4 = "";
        if (empty($listCapteurID) != 1){ // Si la liste capteurID est vide cela ne sert à rien d'executer ce code
            for ($i = 0; $i < count($listCapteurID) ;$i++) {
                $type = getCapteurType($listCapteurID[$i]);
                $etat = getCapteurEtat($listCapteurID[$i]);
                if (getCapteurEtat($listCapteurID[$i])==0 ) { // Image du type éteint
                    //echo getCapteurType($listCapteurID[$i]);
                    switch (getCapteurType($listCapteurID[$i])){ //OR getControlleurType($listID[$i])
                        case "lumière": //1:
                            $html2.= '<p> <a href = "#"> <img src="../Images/iconelumiereblanche.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p>';
                            break;
                        case "caméra de surveillance":
                            $html2 .= '<p><a href = "#"><img src="../Images/iconecamera.png" alt="photo de cadenas"width="128" height="128"/></a></p>';
                            break;
                        case "humidité":
                            $html2 .= '<p> <a href = "#"> 70%  </a> </p>';
                            break;
                        case "température":
                            $html2 .= '<p> <a href = "#"> 20°  </a> </p>';
                            break;
                        
                    } 
                } // image du type allumé
                else {
                    switch (getCapteurType($listCapteurID[$i])){
                        case "lumière":
                            $html2 .= '<p> <a href = "#"> <img src="../Images/iconelumiereblanche.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p>';
                            break;
                        case "caméra de surveillance":
                            $html2 .= '<p><a href = "#"><img src="../Images/iconecadenas.png" alt="photo de cadenas"width="128" height="128"/></a></p>';
                            break;
                        case "humidité":
                            $html2 .= '<p> <a href = "#"> 70%  </a> </p>';
                            break;
                        case "température":
                            $html2 .='<p> <a href = "#"> 20°  </a> </p>';
                            break;
                        default :
                            break;
                    }
                }
                $html2 .= 
        '</div>
        <div class="caractère"> 
            '.$listCapteurName[$i].'
            <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
        </div>
        </div> '; 
            }
        }
        if (empty($listControleurID) != 1){ // Si la liste controleurID est vide cela ne sert à rien d'executer ce code
            for ($i = 0; $i < count($listControleurID) ;$i++) {
                $etat = getControleurEtat($listControleurID[$i]);
                $type = getControleurType($listControleurID[$i]);
                if (getControleurEtat($listControleurID[$i])==0 ) { // Image du type éteint
                    //echo getControleurType($listControleurID[$i]);
                    switch (getControleurType($listControleurID[$i])){ //OR getControlleurType($listID[$i])
                        case "chauffage":
                            $html3 .= '<p><a href = "#"><img src="../Images/iconechauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p>
                            <progress id="avancement" value="50" max="100"></progress>
                            <span id="pourcentage"></span>
                            <input type="button" onclick="modif(-10);" value="-">
                            <input type="button" onclick="modif(10);" value="+">
                            <script type ="text/javascript" src="codecapteur.js"> </script>';
                            break;
                        default :
                            break;
                    }
                } else {
                    switch (getControleurType($listControleurID[$i])){
                        case "chauffage":
                        $html3 .= '<p><a href = "#"><img src="../Images/iconechauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p>
                        <progress id="avancement" value="50" max="100"></progress>
                        <span id="pourcentage"></span>
                        <input type="button" onclick="modif(-10);" value="-">
                        <input type="button" onclick="modif(10);" value="+">
                        <script type ="text/javascript" src="codecapteur.js"> </script>';
                        break;
                    default :
                        break;
                    }
                }
                $html3 .= 
        '</div>
        <div class="caractère"> 
            '.$listControleurName[$i].'
            <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
        </div>
        </div> ';
            }
        }
        echo $html1.$html2.$html3;
        
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
</section>

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>
</html>