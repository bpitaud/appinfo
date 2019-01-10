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

        <h1><strong>DOMISEP</strong><br/>Administrator</h1>
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
                <li><a class="quitter" href="../RechercherPar/RechercherPar.php"><span>Quit</span></a></li>
            </ul>
        </div>
    </div>
</header>


    
    <nav>
    	<a href="../Menu/Menu.php">Menu</a>/<span id="compte_link">Account</span>
    </nav>
    <h2>Account</h2>


    <section>
    	<div class="info">
    		<p>
    			<em class="base">ADRESS.EMAIL@MAIL.COM <br/></em>
    			<em class="base">LAST NAME<br/></em>
    			<em class="base">NAME<br/></em>
    			<em class="base">GENDER<br/></em>
    			<em class="base2">JJ/MM/AAAA<br/></em>
    			<button onclick="myFunction()" class="bouton">Delete account</button>





<script>
function myFunction() {
    var txt;
    var r = confirm("Are you sure you want to delete this customer's account?");
    if (r == true) {
        href = "..English/RechercherPar/RechercherPar.php";
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
    			<em class="base"> MAIN ADDRESS<br/></em>
    			<em class="base">COUNTRY<br/></em>
    			<em class="base2">75 000<br/></em>

    			<a href="..English/ModifCompteAdmin/ModifCompte.php"> <input type="button" value="Edit my informations"></a>               
    			<button onclick="myFunction1()" class="bouton">Reset password</button>
                    <script>
                    function myFunction1() {
                        var txt;
                        var r = confirm("Are you sure you want to reset this client's password?");
                        if (r == true) {
                            <a href = "..English/RechercherPar/RechercherPar.php"></a>;
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
    	<p> Connected as : ADRESSE_EMAIL_ADMIN</p>
    </footer>


  </body>
</html>