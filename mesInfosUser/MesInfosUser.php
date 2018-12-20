<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="MesInfosUser.css" />
        <title>Domisep - Mes informations</title>
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
                                <a href="Accueil.html"><p id="borderNone">Deconnexion</p></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    
    <h2> Mes informations </h2>
<section>
    <div class="info">
    		<p>
    			<em class="base">ADRESS.EMAIL@MAIL.COM <br/></em>
    			<em class="base">NOM<br/></em>
    			<em class="base">PRENOM<br/></em>
    			<em class="base">GENRE<br/></em>
    			<em class="base2">JJ/MM/AAAA<br/></em>
                <em class="base">+33 6 00 00 00 00<br/></em>
    			<em class="base">ADRESSE PRINCIPALE<br/></em>
    			<em class="base">PAYS<br/></em>
    			<em class="base2">75 000<br/></em>
                <em class="base">+33 6 00 00 00 00<br/></em>
    			<em class="base">ADRESSE PRINCIPALE<br/></em>
    			<em class="base">PAYS<br/></em>
    			<em class="base2">75 000<br/></em>
                <button onclick="myFunction()" class="bouton">Supprimer mon compte</button>


<script>
function myFunction() {
    var txt;
    var r = confirm("Etes-vous sûr de vouloir supprimer votre compte ?");
    if (r == true) {
        href = "../RechercherPar/RechercherPar.php";
    } else {
        txt = "none";
    }
    document.getElementById("demo").innerHTML = txt;
}
</script>



<div class="button1">
<a href="../ModifCompteUser/ModifCompteUser.php"> <input type="button" value="Modifier mes informations"></a>               
</div>   

    	
    		
    			
</section>  

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>
    
</body>
</html>