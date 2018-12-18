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
        <a id ="retour" href ="../Liste pièces/listepieces.php"> < Retour</a> 
        <h1> Salon </h1>
    	<div id="capteurs">
    		
            <div class="block"> 
            
                <div class="figure" >
                <p> <a href = "#"> <img src="../Images/iconelumiereblanche.png" alt="photo de lumiere eteinte" width="128" height="128"/></a> </p> </div>
                
                <div class="caractère"> Lumière <br>principal
                <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p></div>
            </div> 
            
                          
            <div class="block"> 
            
                <div class="figure">
                <p><a href = "#"><img src="../Images/iconelumierejaune.png" alt="photo de lumiere"width="128" height="128"/></a></p></div>
                <div class="caractère"> <div class="lampe" > Lampe <br> de chevet </div>
                <p><img src="../Images/iconereglagejaune.png" alt="logo réglage allumé" width="39" height="39"/></p></div>
            </div>    
            
            <div class="block"> 

                <div class="figure" >
                    <div class="pourcentage"> <p> <a href = "#"> 70%  </a> </p> </div> 
                </div>
                <div class="caractère" > Humidité
                <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p></div>
            </div>
            
            <div class="block">

                <div class="figure">
                <p><a href = "#"><img src="../Images/iconecadenas.png" alt="photo de cadenas"width="128" height="128"/></a></p></div>
                <div class="caractère"> Caméra de <br> surveillance
                <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p></div>
            </div> 
            
            <div class="block"> 
                
                <div class="figure">
                    
                <p><a href = "#"><img src="../Images/iconechauffage.png" alt="photo de cadenas"width="128" height="128"/></a></p></div>
                <div class="caractère"> Chauffage
                <p><img src="../Images/iconereglageblanc.png" alt="logo réglage" width="39" height="39"/></p>
                </div>
                
                <progress id="avancement" value="50" max="100"></progress>
                <span id="pourcentage"></span>
                <input type="button" onclick="modif(-10);" value="-">
                <input type="button" onclick="modif(10);" value="+">
                <script type ="text/javascript" src="codecapteur.js"> </script>
                

            </div>   
            
          
        
            <div class="block">
                    
                <div class= "figure"> 
                    <div class="plus">
                <p> <a href = "../AjoutCapteur/AjoutCapteur.php"> + </a> </p> 
                </div>
                </div>
                   
                <div class="caractère">
                Ajouter <br> un capteur </div>
             </div>
          
</div>
</section>
</body>