<?php
session_start();
$_SESSION['language'] ='en';

if (isset($_GET['user']) && $_GET['user'] != '') {
    $_SESSION['selected_user'] = $_GET['user'];
}

if(!isset($_SESSION["connexion"]) || $_SESSION["connexion"] == 0) {
    header("Location: connexion.php");
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../css/Compte_Admin.css" />
    <title> User Account</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php include('header_admin.php') ?>
  </head>

    <?php
    echo '
    <nav>
    	<a href="../english/Menu.php?user='.$_SESSION['selected_user'].'">Menu</a>/<span id="compte_link">Account</span>
    </nav>';
    ?>
    <h2>Account</h2>

    <?php
                require_once ('../../controllers/FormulaireRechercherPar.php');
                $modif = test($_GET['modif']);
                if (isset($modif)) {
                    if ($modif == "true") {
                        echo "<p style='color:white;'>Your informations have been modified.</p>";
                    } else if ($modif == "false")  {
                        echo "<p style='color:red;'>Your informations haven't been modified.</p>";
                    }
                }
                ?>



    <section>
    	<div class="info">
        <?php
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
                    <form action="../../controllers/SuppUserAdmin.php?user=<?php echo $_SESSION['selected_user'] ?>" 
                    method="get" onsubmit="return confirm
                    ('Are you sure you want to delete this user ?')">
                        <input  value="delete" type="submit">
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

                <a href="../english/ModifCompte.php?user='.$_SESSION['selected_user'].'"> <input class="bouton" type="button" value="Modify the informations"></a>
                <a href="../english/NouveauMdpAdmin.php?user='.$_SESSION['selected_user'].'"> <input class="bouton" type="button" value="Change the password"></a>               
    			
    		</p>
        </div>';
        ?>
    </section>
    
  </body>
</html>