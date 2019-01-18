<?php
session_start();
?> 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/ModifCompteUser.css" />
    <title> Modification de Compte </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
  </head>

<body>

  <div id="retour">
    <a href="../Views/MesInfosUser.php">< Retour</a>
  </div>

  <h2>Modification de mes informations</h2>

<section>


    	<div class="info">
        <form method="post" action="../controllers/ModifInfosUser.php">
        <?php
        require('../controllers/ModifInfosUser.php');
        $utilisateurID = $_SESSION['utilisateurID'];
        $utilisateur = RecupInfoUser($utilisateurID);
        echo '
            <p>	
      			<input type="text" name="nom" placeholder="'.$utilisateur[0][1].'"  />
                <input type="text" name="prenom" placeholder="'.$utilisateur[0][2].'" />
                <input type="email" name="email" placeholder="'.$utilisateur[0][3].'"/>
                <select name="'.$utilisateur[0][4].'" >
                        <option value="masculin"> Masculin </option>	
                       <option value="féminin"> Féminin </option>	
       				</select>
                <input type="text" name="naissance" placeholder="'.$utilisateur[0][5].'" />
    			<input type="text" name="telephone" placeholder="'.$utilisateur[0][6].'" />
      				<input type="text" name="adresse" placeholder="'.$utilisateur[0][7].'"  />
                      <select name="'.$utilisateur[0][8].'">	
       					<option value="france"> France </option>
       					<option value="royaume-Uni"> Royaume-Uni </option>
       					<option value="espagne"> Espagne </option>
       					<option value="italie"> Italie </option>
       					<option value="etats-unis"> Etats-Unis </option>
       					<option value="canada"> Canada </option>
       					<option value="chine"> Chine </option>
       					<option value="japon"> Japon </option>     	
       				</select>
                      <input type="text" name="codepostale" placeholder="'.$utilisateur[0][9].'" />
                      <input type="password" name="ancien_mdp" placeholder="Ancien mot de passe"/>
                      <input type="password" name="nouveau_mdp" placeholder="Nouveau mot de passe"/>
                      <div id="test">
                      <button class="bouton" type="submit">Valider</button>
                      <button class="bouton" href="../">Annuler</button>
                    </div>
            </p>';
            ?>
        </form>
    	</div>
</section>

    <footer>
    	<p> WEBAC © Tous droits réservés </p>
    </footer>

</body>
</html>