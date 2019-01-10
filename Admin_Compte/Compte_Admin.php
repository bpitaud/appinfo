<?php
session_start();

if (isset($_GET['user']) && $_GET['user'] != '') {
    $_SESSION['selected_user'] = $_GET['user'];
}

?>

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
                    <?php
          require_once('../controllers/FormulaireRechercherPar.php');
          $utilisateurID = $_SESSION['selected_user'];
          $utilisateur = RecupUserID($utilisateurID);
          echo '
          <li><p class="admin"> SAV Client : '.$utilisateur[0][3].'</p></li>';
          ?>
                </div>
                <li><a class="quitter" href="../RechercherPar/RechercherPar.php"><span>Quitter</span></a></li>
            </ul>
        </div>
    </div>
</header>


    <?php
    echo '
    <nav>
    	<a href="../Menu/Menu.php?user='.$_SESSION['selected_user'].'">Menu</a>/<span id="compte_link">Compte</span>
    </nav>';
    ?>
    <h2>Compte</h2>

    <?php
                $modif = $_GET['modif'];
                if (isset($modif)) {
                    if ($modif == "true") {
                        echo "<p style='color:white;'>Vos informations ont été modifié.</p>";
                    } else {
                        echo "<p style='color:red;'>Vos informations n'ont pas été modifié.</p>";
                    }
                }
                ?>



    <section>
    	<div class="info">
        <?php
        require_once ('../controllers/FormulaireRechercherPar.php');
        $utilisateurID = $_SESSION['selected_user'];
        $utilisateur = RecupUserID($utilisateurID);
        echo'
    		<p>
    			<em class="email">'.$utilisateur[0][3].' <br/></em>
    			<em class="text">'.$utilisateur[0][1].'<br/></em>
    			<em class="text">'.$utilisateur[0][2].'<br/></em>
    			<em class="text">'.$utilisateur[0][4].'<br/></em>
    			<em class="date">'.$utilisateur[0][5].'<br/></em>
    			<button onclick="myFunction()" class="bouton">Supprimer le compte</button>
            </p>
    	</div>
    	<div class="info">
        
    		<p>
    			<em class="text">'.$utilisateur[0][6].'<br/></em>
    			<em class="text">'.$utilisateur[0][7].'<br/></em>
    			<em class="text">'.$utilisateur[0][8].'<br/></em>
    			<em class="text">'.$utilisateur[0][9].'<br/></em>

                <a href="../ModifCompteAdmin/ModifCompte.php?user='.$_SESSION['selected_user'].'"> <input class="bouton" type="button" value="Modifier mes informations"></a>
                <a href="../NouveauMdpAdmin/NouveauMdpAdmin.php?user='.$_SESSION['selected_user'].'"> <input class="bouton" type="button" value="Réinitialisation de mot de passe"></a>               
    			
    		</p>
        </div>';
        ?>
    </section>
    
  </body>
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
</html>