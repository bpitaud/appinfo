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
    <link rel="stylesheet" href="../css/ModifCompte.css" />
    <title> Modification de Compte </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_admin.php') ?>
  </head>

  <body>

    <?php
    echo'
    <nav>
    	<a href="../Views/Menu.php?user='.$_SESSION['selected_user'].'">Menu</a>/<a href="../Views/Compte_Admin.php?user='.$_SESSION['selected_user'].'">Compte</a>/<span id="compte_link">Modifier</span>
    </nav>';
    ?>
    <h2>Modification des informations du compte</h2>
    <section>
    	<div class="info">
        <form method="post" action="../controllers/ModifInfosAdmin.php">
            <?php
            echo'
            <p>
       			<input type="email" name="email" placeholder="'.$utilisateur[0][3].'"/>
      			<input type="text" name="nom" placeholder="'.$utilisateur[0][1].'" />
                <input type="text" name="prenom" placeholder="'.$utilisateur[0][2].'" />
                <select name="genre" placeholder="'.$utilisateur[0][4].'"  >
                        <option value="masculin"> Masculin </option>	
                       <option value="feminin"> Féminin </option>	
       				</select>
                <input type="text" name="naissance" placeholder="'.$utilisateur[0][5].'" />
                <input type="text" name="telephone" placeholder="'.$utilisateur[0][6].'" />
      				<input type="text" name="adresse" placeholder="'.$utilisateur[0][7].'" />
                      <select name="pays" placeholder="'.$utilisateur[0][8].'" >	
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
                      

            <div id="test">
    			<button class="bouton" href="../Compte_Admin.php?user='.$_SESSION['selected_user'].'">Annuler</button>
                <button class="bouton" type="submit">Valider</button>
            </div>
            </p>
            ';
            ?>
        </form>
    	</div>
    
    </section>
  </body>
</html>