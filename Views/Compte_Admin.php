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
    <link rel="stylesheet" href="../css/Compte_Admin.css" />
    <title> Compte utilisateur</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_admin.php') ?>
  </head>

    <?php
    echo '
    <nav>
    	<a href="../Views/Menu.php?user='.$_SESSION['selected_user'].'">Menu</a>/<span id="compte_link">Compte</span>
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
                <div class="bouton1">';
                ?>
                    <form action="../controllers/SuppUserAdmin.php?user=<?php echo $_SESSION['selected_user'] ?>" 
                    method="get" onsubmit="return confirm
                    ('Etes-vous sûr de vouloir supprimer ce compte utilisateur?')">
                        <input  value="Supprimer" type="submit">
                    </form>   
                </div>
            </p>
        </div>
        <?php
        echo '
    	<div class="info">
        
    		<p>
    			<em class="text">'.$utilisateur[0][6].'<br/></em>
    			<em class="text">'.$utilisateur[0][7].'<br/></em>
    			<em class="text">'.$utilisateur[0][8].'<br/></em>
    			<em class="text">'.$utilisateur[0][9].'<br/></em>

                <a href="../Views/ModifCompte.php?user='.$_SESSION['selected_user'].'"> <input class="bouton" type="button" value="Modifier mes informations"></a>
                <a href="../Views/NouveauMdpAdmin.php?user='.$_SESSION['selected_user'].'"> <input class="bouton" type="button" value="Réinitialisation de mot de passe"></a>               
    			
    		</p>
        </div>';
        ?>
    </section>
    
  </body>
</html>