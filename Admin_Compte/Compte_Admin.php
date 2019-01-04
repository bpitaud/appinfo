<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="Compte_Admin.css" />

    <!--<script src="Popupsup.js"></script>-->

    <title> Compte </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>


<header>
    <div class="wrapper">

        <h1><strong>DOMISEP</strong><br/>Administrateur</h1>
        <div class="haut">      
            <ul>
                <div class="haut_droite">
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
                <li><p class="admin"> SAV Client : ADRESSE.EMAIL@mail.com</p></li>
                </div>
                <li><a class="quitter" href="../RechercherPar/RechercherPar.php"><span>Quitter</span></a></li>
            </ul>
        </div>
    </div>
</header>


    
    <nav>
    	<a href="../Menu/Menu.php">Menu</a>/<span id="compte_link">Compte</span>
    </nav>
    <h2>Compte</h2>


    <section>
    	<div class="info">
    		<p>
    			<em class="base">ADRESS.EMAIL@MAIL.COM <br/></em>
    			<em class="base">NOM<br/></em>
    			<em class="base">PRENOM<br/></em>
    			<em class="base">GENRE<br/></em>
    			<em class="base2">JJ/MM/AAAA<br/></em>
    			<button onclick="myFunction()" class="bouton">Supprimer le compte</button>





<script>
function myFunction() {
    var txt;
    var r = confirm("Etes-vous sûr de vouloir supprimer le compte de ce client ?");
    if (r == true) {
        href = "../RechercherPar/RechercherPar.php";
    } else {
        txt = "none";
    }
    document.getElementById("demo").innerHTML = txt;
}
</script>



    		</p>
    	</div>
    	<div class="info">
    		<p>
    			<em class="base">+33 6 00 00 00 00<br/></em>
    			<em class="base">ADRESSE PRINCIPALE<br/></em>
    			<em class="base">PAYS<br/></em>
    			<em class="base2">75 000<br/></em>

    			<a href="../ModifCompteAdmin/ModifCompte.php"> <input type="button" value="Modifier mes informations"></a>               
    			<button onclick="myFunction1()" class="bouton">Réinitialiser le mot de passe</button>
                    <script>
                    function myFunction1() {
                        var txt;
                        var r = confirm("Etes-vous sûr de vouloir réinitialiser le mot de passe de ce client ?");
                        if (r == true) {
                            <a href = "../RechercherPar/RechercherPar.php"></a>;
                        } else {
                            txt = "none";
                        }
                        document.getElementById("demo").innerHTML = txt;
                    }
                    </script>
    		</p>
    	</div>
    </section>
    <footer>
    	<p> Connecté en tant que : ADRESSE_EMAIL_ADMIN</p>
    </footer>


  </body>
</html>