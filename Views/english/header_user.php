<?php
session_start();
$_SESSION['language'] ='en';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../css/headerUser.css" />
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
                    <li><a href="../english/listelogements.php"><span>Home</span></a>
                    </li>
                    <li>
                        <div class="dropdownLang">
                            <div class="noHover">
                                <p>EN</p>
                            </div>
                            <div class="hover">
                                <p>EN</p>
                                <a href="../listelogements.php"> FR </a>
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
                                <a href="../english/MesInfosUser.php"><p>My account</p></a>
                                <a href="../english/NousContacter.php"><p>Contact us</p></a>
                                <a href="../../controllers/deconnexion.php"><p id="borderNone">Logout</p></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <footer>
    	<p> WEBAC © All rights reserved |<a href="../english/Mentions_legales.php" ><span>Legal Notice</span> </a>|<a href = "../english/cgu.php" ><span>Terms of Service</span></a></p>
    </footer>

</html>