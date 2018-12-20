<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="ModifCompteUser.css" />
    <title> ModifCompte </title>
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

  
    <nav>
    	<a href="../mesinfosuti/mesinfosuti.php">< Retour</a>
    </nav>
    
    <h2>Modification de mes informations</h2>

<section>
    	<div class="info">
        <form method="post" action="../controllers/ModifInfosUser.php">
            <p>
       			
      			<input type="text" name="number" placeholder="NOM"  />
                <input type="text" name="name" placeholder="PRENOM" />
                <input type="email" name="name" placeholder="ADRESS.EMAIL@MAIL.COM"/>
                <select name="Genre" required>
       					<option value="genre"> GENRE </option>
                        <option value="féminin"> Féminin </option>	
                       <option value="féminin"> Féminin </option>	
       				</select>
                <input type="date" name="number" placeholder="JJ/MM/AAAA" />
    			<input type="text" name="name" placeholder="+33 6 00 00 00 00" />
      				<input type="text" name="number" placeholder="ADRESSE PRINCIPALE"  />
                      <select name="Pays">
                        <option value="pays"> PAYS </option>	
       					<option value="france"> France </option>
       					<option value="royaume-Uni"> Royaume-Uni </option>
       					<option value="espagne"> Espagne </option>
       					<option value="italie"> Italie </option>
       					<option value="etats-unis"> Etats-Unis </option>
       					<option value="canada"> Canada </option>
       					<option value="chine"> Chine </option>
       					<option value="japon"> Japon </option>     	
       				</select>
                      <input type="text" name="number" placeholder="75 000" required />
                      <input type="password" name="ancien_mdp" placeholder="ANCIEN MOT DE PASSE"/>
                      <input type="password" name="nouveau_mdp" placeholder="NOUVEAU MOT DE PASSE"/>
                      <button class="bouton">Valider</button>
                      <button class="bouton" href="../">Annuler</button>
                    
    		</p>
        </form>
    	</div>
</section>
</body>
</html>