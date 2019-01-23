<?php
session_start();
$_SESSION['language'] ='fr';
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
        <link rel="stylesheet" href="../css/MesInfosUser.css" />
        <title>Domisep - Mes informations</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <?php include('header_user.php') ?>
    </head>

    <body>

    <h2> Mes informations </h2>
    <?php
                require_once ('../controllers/ModifInfosUser.php');
                $modif = test_input($_GET['modif']);
                if (isset($modif)) {
                    if ($modif == "true") {
                        echo "<p style='color:white;'>Vos informations ont été modifié.</p>";
                    } else if ($modif == "false") {
                        echo "<p style='color:red;'>Vos informations n'ont pas été modifié.</p>";
                    }
                }
                ?>

    <section>
    <div class="info">
        <?php
        $utilisateurID = $_SESSION['utilisateurID'];
        $utilisateur = RecupInfoUser($utilisateurID);
        foreach ($utilisateur as $utilisateur) {
        echo'
    		<p>
    			<em class="email">'.$utilisateur[3].'<br/></em>
    			<em class="text">'.$utilisateur[1].'<br/></em>
    			<em class="text">'.$utilisateur[2].'<br/></em>
    			<em class="text">'.$utilisateur[4].'<br/></em>
    			<em class="date">'.$utilisateur[5].'<br/></em>
                <em class="text">'.$utilisateur[6].'<br/></em>
    			<em class="text">'.$utilisateur[7].'<br/></em>
    			<em class="text">'.$utilisateur[8].'<br/></em>
    			<em class="number">'.$utilisateur[9].'<br/></em>
                </p>';}
                ?>
                <form action="../controllers/SuppUser.php" 
                    method="post" onsubmit="return confirm
                    ('Etes-vous sûr de vouloir supprimer votre compte?')">
                        <input  value="Supprimer le compte" type="submit">
                    </form>   
                

<a href="../Views/listelogements.php"> <input type="button" value="Annuler"></a>               
<a href="../Views/ModifCompteUser.php"> <input type="button" value="Modifier mes informations"></a>   
			
                             
        </div>

        
</section>  
    
</body>
</html>  
  