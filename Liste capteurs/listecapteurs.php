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
        if (empty($listCapteurID) != 1){ // Si la liste capteurID est vide cela ne sert à rien d'executer ce code
            for ($i = 0; $i < count($listCapteurID) ;$i++) {
                $type = getCapteurType($listCapteurID[$i]);
                $etat = getCapteurEtat($listCapteurID[$i]);
                if (getCapteurEtat($listCapteurID[$i])==0 ) { // Image du type éteint
                    $onOff = 'off';
                    $idBlock++;
                    // capteurID Etat Type => .$listCapteurID[$i]." ".$getCapteurEtat($listCapteurID[$i])." capteur.
                    $html .= '
                    <section class="block">
                    <div class = "figure" id="figure'.$idBlock.'"  onClick="modifyHTML('.$listCapteurID[$i].",".getCapteurEtat($listCapteurID[$i]).',"controleur",'.$idBlock.')">';
                    switch (getCapteurType($listCapteurID[$i])){ //OR getControlleurType($listID[$i])
                        case "lumiere": //1:
                            $html .= '<p> <a href = "#" id = "lumiere"> <img name = "img'.$idBlock.'" src="../Images/capteur/'.$onOff.'/iconeLumiere.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p>';
                            break;
                        case "camera":
                            $html .= '<p><a href = "#"><img name = "img'.$idBlock.'" src="../Images/capteur/'.$onOff.'/iconeCamera.png" alt="photo de cadenas"width="128" height="128"/></a></p>';
                            break;
                        case "humidite":
                            $html .= '<p> <a href = "#"> 70%  </a> </p>';
                            break;
                        case "temperature":
                            $html .= '<p> <a href = "#"> 20°  </a> </p>';
                            break; 
                    }
                } // image du type allumé
                else {
                    $onOff = 'on';
                    $idBlock++;
                    $html .= '
                    <section class="block"> 
                    <div class = "figure" id="figure'.$idBlock.'"  onClick="modifyHTML('.$listCapteurID[$i].",".getCapteurEtat($listCapteurID[$i]).',"controleur",'.$idBlock.')">';
                    switch (getCapteurType($listCapteurID[$i])){
                        case "lumiere":
                            $html .= '<p> <a href = "#"> <img name = "img'.$idBlock.'" src="../Images/capteur/'.$onOff.'/iconeLumiere.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p>';
                            break;
                        case "camera":
                            $html .= '<p><a href = "#"><img name = "img'.$idBlock.'" src="../Images/capteur/'.$onOff.'/iconeCamera.png" alt="photo de cadenas"width="128" height="128"/></a></p>';
                            break;
                        case "humidite":
                            $html .= '<p> <a href = "#"> 70%  </a> </p>';
                            break;
                        case "temperature":
                            $html .='<p> <a href = "#"> 20°  </a> </p>';
                            break;
                    }
                }
                $html .= 
            '</div>
            <div class="caractere" id="caractere'.$idBlock.'"> 
                <p><img name = "reglage'.$idBlock.'" src="../Images/capteur/'.$onOff.'/iconeReglage.png" alt="logo réglage" width="39" height="39"/></p>
                <h4> '.$listCapteurName[$i].' </h4>
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
                    // id = "'.$listControleurID[$i]." ".getControleurEtat($listControleurID[$i])." controleur".'"  onClick="reply_click(this.idBlock)"
                    $html .= ' 
                    <section class="block">  
                    <div class = "figure" id="figure'.$idBlock.'"  onClick="modifyHTML('.$listCapteurID[$i].",".getCapteurEtat($listCapteurID[$i]).',"controleur",'.$idBlock.')">';
                    //echo getControleurType($listControleurID[$i]);
                    switch (getControleurType($listControleurID[$i])){ //OR getControlleurType($listID[$i])
                        case "chauffage":
                            $html .= '<p><a href = "#"><img name = "img'.$idBlock.'" src="../Images/capteur/'.$onOff.'/iconeChauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p>';
                            break;
                    }
                } else { //on
                    $onOff = 'on';
                    $idBlock++;
                    $html .= '
                    <section class="block"> 
                    <div class = "figure" id="figure'.$idBlock.'"  onClick="modifyHTML('.$listCapteurID[$i].",".getCapteurEtat($listCapteurID[$i]).',"controleur",'.$idBlock.')">';
                    switch (getControleurType($listControleurID[$i])){
                        case "chauffage":
                        $html .= '<p><a href = "#"><img name = "img'.$idBlock.'" src="../Images/capteur/'.$onOff.'/iconeChauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p>';
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
            <div class="caractere" id="caractere'.$idBlock.'"> 
                <p><img name = "reglage'.$idBlock.'" src="../Images/capteur/'.$onOff.'/iconeReglage.png" alt="logo réglage" width="39" height="39"/></p>
                <h4>'.$listControleurName[$i].'</h4>
            </div>
        </section> ';
            }
        }
        echo $html;
        // Faire java script pour le onclic les images et le nom du capteur passe en jaune et modifie dans la base de donnée l'état à 1
        ?>
            <!-- + -->
            <section class="block">       
                <div class= "figure"> 
                    <div class="plus">
                        <p> <a href = "../AjoutCapteur/AjoutCapteur.php"> + </a> </p> 
                    </div>
                </div>
                <div class="caractere" id = "caracterePlus">
                    <h4> Ajouter <br/> un capteur </h4> 
                </div>
            </section>
        <script>
            let reglageON = new Image(); 
            let reglageON.src = "C:\xampp\htdocs\xampp\appinfo\Images\capteur\on\iconeReglage.png";

            let reglageOFF = new Image(); 
            let reglageOFF.src = "C:\xampp\htdocs\xampp\appinfo\Images\capteur\off\iconeReglage.png";

            let lumiereON = new Image(); 
            let lumiereON.src = "C:\xampp\htdocs\xampp\appinfo\Images\capteur\on\iconeLumiere.png";

            let lumiereOFF = new Image(); 
            let lumiereOFF.src = "C:\xampp\htdocs\xampp\appinfo\Images\capteur\off\iconeLumiere.png";

            let cameraON = new Image(); 
            let cameraON.src = "C:\xampp\htdocs\xampp\appinfo\Images\capteur\on\iconeCamera.png";

            let cameraOFF = new Image(); 
            let cameraOFF.src = "C:\xampp\htdocs\xampp\appinfo\Images\capteur\off\iconeCamera.png";

            let chauffageON = new Image(); 
            let chauffageON.src = "C:\xampp\htdocs\xampp\appinfo\Images\capteur\on\iconeChauffage.png";

            let chauffageOFF = new Image(); 
            let chauffageOFF.src = "C:\xampp\htdocs\xampp\appinfo\Images\capteur\off\iconeChauffage.png";

            //fonction modifie les images du capteur/controleur et de réglage en jaune 
            function modifyImg (idBlock) {
                alert (cameraON);
                let x = element.getElementsByTagId("reglage"+idBlock+"");
                let v = x.getAttribute("src");
                if(v == reglageON) {
                    v = reglageOFF;
                }else if(v == reglageOFF) {
                    v = reglageON;
                }
                x.setAttribute("src", v);

                let z = element.getElementsByTagId("img"+idBlock+"");
                let v1 = z.getAttribute("src");
                if(v1 == cameraON) {
                    v1 = cameraOFF;
                }else if(v1 == cameraOFF) {
                    v1 = cameraON;
                }
                else if(v1 == lumiereON) {
                    v1 = lumiereOFF;
                }else if(v1 == lumiereOFF) {
                    v1 = lumiereON;
                }
                else if(v1 == chauffageON) {
                    v1 = chauffageOFF;
                }else if(v1 == chauffageOFF) {
                    v1 = chauffageON;
                }
                z.setAttribute("src", v1);
            }

            //Fonction modifie avec ajax (permet de ne pas recharger la page) la bordure en jaune + le texte + appel la fonction modifImage
            function modifyHTML(id,etat,type,idBlock) {
            alert("Hey");
            alert(id.", ".etat.", ".type.", ".idBlock);
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);

                    modifyImg (idBlock);
                    if (etat == 0) {
                        document.getElementById("figure"+idBlock+"").style.border = "1px solid white";;
                        document.getElementById("caractere"+idBlock+"").style.color = "white";
                    } else {
                        document.getElementById("figure"+idBlock+"").style.border = "1px solid #FFDA44";
                        document.getElementById("caractere"+idBlock+"").style.color = "#FFDA44";
                    }
                }
            };
            let arr = [type, id, etat];
            alert( arr[0].", ".arr[1]", ".arr[2]);
            xmlhttp.open("GET",".php?q="+arr,true);
            xmlhttp.send();
        }


        </script>














<!--
        <script type="text/javascript">
        //document.getElementByTagName("section").addEventListener("click", getIdBlock);
        /*function reply_click(clicked_idBlock){
            alert(clicked_idBlock);
        }*/
            let sections = document.getElementsByTagName("section");
            let sectionsCount = sections.length;
            for (let i = 0; i <= sectionsCount; i += 1) {
                sections[i].onclick = function(e) {
                //alert(this.id);
                let str = this.id;
                let res = str.split(" ");
                modifyHTML(res[0],res[1],res[2]); //res[0] => id / res[1] => etat / res[2] => type
                //function qui prend en argument l'id, qui modifi le block html et envoie une requette ajax pour modifier la base de donnée 
                };
            }
            function modifyHTML (id,etat,type) {
                if (etat == 0) {
                    let onOff = "off";
                    let liste = document.getElementByTagClass("class");
                    for (let i = 0; i<document.getElementByClass("class").length;i++){
                        liste[i].style.border = "1px solid white";
                        liste[i].style.color = "white"; 
                    }
                } else {
                    let onOff = "on";
                    let liste = document.getElementByTagClass("class");
                    for (let i = 0; i<document.getElementByClass("class").length;i++){
                        liste[i].style.border = "border : 1px solid #FFDA44";
                        liste[i].style.color = "#FFDA44"; 
                    }
                }
                //modify texte grace à son ID
                document.getElementByTagName("strong").innerHTML = onOff; //modifi tout les paths des images de on à off (ce qui permait de passer d'une image blanche à jaune)
                /*
                //Récupére texte grace à son ID
                let elt = document.getElementById('mon-texte');
                let monTexte = elt.innerText || elt.textContent;    
                */
            }
            // fonction php => ModifEtatControleur($controleurID, $etat); => recupérer du html et envoyer à phph via ajax => controller ou capteur / ID / Etat
        </script>
    <?php
        //require_once('../controllers/ModifControleurs.php');
        //require_once('../controllers/ModifCapteurs.php');
        //ModifEtatCapteur($capteurID, $etat);
    ?>
    -->
    </div>
    </article>

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>
</html>