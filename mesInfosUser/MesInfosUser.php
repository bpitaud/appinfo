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
                    <li>
                    
                    <a href="../Liste logements/listelogements.php"><span>Home</span></a></li>
                    
                    </li>
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
    
    

    <h2> Mes informations </h2>
    <section>
    <div class="info">
        <?php
        require_once ('../controllers/ModifInfosUser.php');
        $utilisateurID = $_SESSION['utilisateurID'];
        $utilisateur = RecupInfoUser($utilisateurID);
        foreach ($utilisateur as $utilisateur) {
        echo'
    		<p>
    			<em class="email">'.$utilisateur[3].'<br/></em>
    			<em class="text">'.$utilisateur[1].'<br/></em>
    			<em class="text">'.$utilisateur[2].'<br/></em>
    			<em class="text">'.$utilisateur[4].'<br/></em>
    			<em class="date">'.$utilisateur[5].'<br/></em>
                <em class="text">'.$utilisateur[6].'<br/></em>
    			<em class="text">'.$utilisateur[7].'<br/></em>
    			<em class="text">'.$utilisateur[8].'<br/></em>
    			<em class="number">'.$utilisateur[9].'<br/></em>
                
                <button onclick="myFunction()" class="bouton">Supprimer mon compte</button> 
</p>';}
?>

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
  