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
        <link rel="stylesheet" href="../../css/MesInfosUser.css" />
        <title>Domisep - My information</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <?php include('header_user.php') ?>
    </head>

    <body>

    <h2> My information </h2>
    <?php
                require_once ('../../controllers/ModifInfosUser.php');
                $modif = test_input($_GET['modif']);
                if (isset($modif)) {
                    if ($modif == "true") {
                        echo "<p style='color:white;'>Your information have been modified.</p>";
                    } else if ($modif == "false") {
                        echo "<p style='color:red;'>Your information have been modified.</p>";
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
                <form action="../../controllers/SuppUser.php" 
                    method="post" onsubmit="return confirm
                    ('Are you sure you want to delete your account?')">
                        <input  value="Delete account" type="submit">
                    </form>   
                

<a href="../english/listelogements.php"> <input type="button" value="Cancel"></a>               
<a href="../english/ModifCompteUser.php"> <input type="button" value="Modify my informations"></a>   
			
                             
        </div>

        
</section>  
    
</body>
</html>  
  