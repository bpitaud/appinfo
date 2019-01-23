<?php
session_start();
$_SESSION['language'] ='en';
if(!isset($_SESSION["connexion"]) || $_SESSION["connexion"] == 0) {
  header("Location: connexion.php");
}
?> 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../css/ModifCompteUser.css" />
    <title> Domisep - Modification of my information </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_user.php') ?>
  </head>

<body>

  <div id="retour">
    <a href="../english/MesInfosUser.php">< Back</a>
  </div>

  <h2>Modification of my information</h2>

<section>


    	<div class="info">
        <form method="post" action="../../controllers/ModifInfosUser.php">
        <?php
        require('../../controllers/ModifInfosUser.php');
        $utilisateurID = $_SESSION['utilisateurID'];
        $utilisateur = RecupInfoUser($utilisateurID);
        echo '
            <p>	
      			<input type="text" name="nom" placeholder="'.$utilisateur[0][1].'"  />
                <input type="text" name="prenom" placeholder="'.$utilisateur[0][2].'" />
                <input type="email" name="email" placeholder="'.$utilisateur[0][3].'"/>
                <select name="genre" placeholder="'.$utilisateur[0][4].'"  >
                        <option value="masculin"> Male </option>	
                       <option value="feminin"> Female </option>	
       				</select>
                <input type="text" name="naissance" placeholder="'.$utilisateur[0][5].'" />
    			<input type="text" name="telephone" placeholder="'.$utilisateur[0][6].'" />
      				<input type="text" name="adresse" placeholder="'.$utilisateur[0][7].'"  />
                      <select name="pays" placeholder="'.$utilisateur[0][8].'" >	
       					<option value="france"> France </option>
       					<option value="royaume-Uni"> United Kingdom </option>
       					<option value="espagne"> Spain </option>
       					<option value="italie"> Italy </option>
       					<option value="etats-unis"> United States </option>
       					<option value="canada"> Canada </option>
       					<option value="chine"> China </option>
       					<option value="japon"> Japan </option>     	
       				</select>
                      <input type="text" name="codepostale" placeholder="'.$utilisateur[0][9].'" />
                      <input type="password" name="ancien_mdp" placeholder="Old password"/>
                      <input type="password" name="nouveau_mdp" placeholder="New password"/>
                      <div id="test">
                      <button class="bouton" type="submit"> Submit </button>
                      <button class="bouton" href="../">Cancel</button>
                    </div>
            </p>';
            ?>
        </form>
    	</div>
</section>

</body>
</html>