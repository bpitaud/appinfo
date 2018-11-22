<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="liste_de_capteurs.css" />
    <title> Compte </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>

  <body>

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
    	<a href="../Menu/Menu.php">Menu</a>/<span id="compte_link">Liste des capteurs</span>
    </nav>


    <section>
      <form method="post" action="TraitementPaysLogement.php">
          <p>
                <input type="text" value="" name="capt" placeholder="Rechercher un numéro de capteur">
          </p>
      </form>

        <p id="deco_supp" >
          <button class="bouton">Supprimer</button>
          <button class="bouton">Déconnecter</button>
        </p>
      </div>
     


<table summary="ligne 1 : Propriété capteurs, ligne 2 : Info capteur">
 <caption>Capteur</caption>
  <tr>
    <th>Numéro des capteur</th>
    <th>Type</th>
    <th>Maison</th>
    <th>Pièce</th>
    <th>Etat</th>
  </tr>
  <tr>
      <td>LU120578</td>
      <td>Lumière</td>
      <td>Home</td>
      <td>Cuisine</td>
      <td>Connecté</td>
   </tr>
</table>



    </section>
    


    <footer>
    	<p > Connecté en tant que : ADRESSE_EMAIL_ADMIN</p>
    </footer>


  </body>
</html>