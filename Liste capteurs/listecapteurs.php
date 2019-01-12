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
        document.getElementByTagName("section").addEventListener("click", getIdBlock);
        function reply_click(clicked_idBlock){
            alert(clicked_idBlock);
        }

        
            var sections = document.getElementsByTagName("section");
            var sectionsCount = sections.length;
            for (var i = 0; i <= sectionsCount; i += 1) {
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
    
</article>

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>
</html>