<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/headerUser.css" />
        <title>Header utilisateur</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>

    <body>
    <header>
    <div class='domisep'>
    <h1>DOMISEP</h1>
    </div> 
        <div class="wrapper">
            <nav>
                <ul>
                    <li><a href="../Views/listelogements.php"><span>Home</span></a>
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
                                <a href="../Views/MesInfosUser.php"><p>Mes infos</p></a>
                                <a href="../Views/NousContacter.php"><p>Contacter</p></a>
                                <a href="../controllers/deconnexion.php"><p id="borderNone">Deconnexion</p></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>

</html>