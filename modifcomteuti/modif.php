<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="modif.css" />
    <title> ModifCompte </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>

  <body>

<header>
	<div class="wrapper">
    <h1><strong>DOMISEP</strong> <h1>
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
 					
 				</div>
                
			</ul>
        </div>
    </div>
</header>






    
    <nav>
    	<a href="../Menu/Menu.php">< Retour</a>
    </nav>
    <h2>Modification des informations du compte</h2>
    <section>
    	<div class="info">
    		<p>
            <p>
       			<input type="base" name="name" placeholder="ADRESS.EMAIL@MAIL.COM" required/>
      			<input type="base" name="number" placeholder="NOM" required />
                <input type="base" name="name" placeholder="PRENOM" required/>
                <select name="Genre" required>
       					<option value="genre"> GENRE </option>
                        <option value="féminin"> Féminin </option>	
                       <option value="féminin"> Féminin </option>	
       				</select>
                <input type="base" name="number" placeholder="JJ/MM/AAAA" required />
    			
    		</p>
    	</div>
    	<div class="info">
        <form method="post" action="../controllers/FormulaireAjoutCapteur.php">
   				<p>
       				<input type="base" name="name" placeholder="+33 6 00 00 00 00" required/>
      				<input type="base" name="number" placeholder="ADRESSE PRINCIPALE" required />
                      <select name="Pays" required>
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
      				<input type="base" name="number" placeholder="75 000" required />

            <div id="test">
    			<button class="bouton" href="../">Annuler</button>
                <button class="bouton">Valider</button>
            </div>
            </p>
        </form>
    	</div>
    </section>
    


  </body>
</html>