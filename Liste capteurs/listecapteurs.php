<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="codepiececss.css" />
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
                                <a href="MesInfos.html"><p>Mes infos</p></a>
                                <a href="NousContacter.html"><p>Contacter</p></a>
                                <a href="Accueil.html"><p id="borderNone">Deconnexion</p></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <section>
        <a href ="../Liste pièces/listepieces.php"> < Retour</a> 
        <h1> Salon </h1>
    	<div id="salon">
    		
            <div class="lumiereprincipale"> 
            
                <div class="imglumblanche" >
                <p> <a href = "xxx.html"> <img src="../Images/iconelumiereblanche.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p> </div>
                
                <div class="lumprin"> Lumière <br>principal
                <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="68" height="68"/></p></div>
            </div> 
            
                          
            <div class="lampedechevet"> 
            
                <div class="imglumbjaune">
                <p><a href = "xxx.html"><img src="../Images/iconelumierejaune.png" alt="photo de lumiere"width="128" height="128"/></a></p></div>
                <div class="lumchevet"> Lampe <br> de chevet
                <p><img src="../Images/iconereglagejaune.png" alt="logo réglage allumé" width="68" height="68"/></p></div>
            </div>    
            
            <div class="Humiditégene"> 

                <div class="pourcentage" >
                    <p> <a href = "xxx.html"> 70% </a> </p> </div>
                <div class="humidité" > Humidité
                <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="68" height="68"/></p></div>
            </div>
            
            <div class="Caméradesurveillance">

                <div class="imgcadenas">
                <p><a href = "xxx.html"><img src="../Images/iconecadenas.png" alt="photo de cadenas"width="128" height="128"/></a></p></div>
                <div class="camdesuv"> Caméra de <br> surveillance
                <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="68" height="68"/></p></div>
            </div> 
            
            <div class="Chauffage"> 

                <div class="imgchauffage">
                <p><a href = "xxx.html"><img src="../Images/iconechauffage.png" alt="photo de chauffage"width="128" height="128"/></a></p></div>
                <div class="chauff"> Chauffage
                <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="68" height="68"/></p></div>
            </div>    
            

            <div class="imgajoutcapteur">
                    
                <div class= "plus"> 
                <p> <a href = "../AjoutCapteur/AjoutCapteur.php"> + </a> </p> 
                </div>
                   
                <div class="ajoutcapteur">
                Ajouter <br> un capteur 
                </div>
            </div>
    	</div>	
    </section>
</body>