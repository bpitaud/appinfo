<?php
session_start();
$_SESSION['language'] ='en';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../css/inscription.css" />
    <title> Domisep - Registration </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>

    <header>
        <div class="wrapper">
            <h1>DOMISEP</h1>
            <nav>
                <ul>
                    <li><a href="../english/home.php"><span>Home</span></a></li>
                    <div class="creationcompteheader">
                            <a href="../english/inscription.php"> Create an account </a>
                            
                    </div>
                    <div class="connexionheader">
                        <a href="../english/connexion.php"> Login </a> </div>

                    <li>
                        <div class="dropdownLang">
                            <div class="noHover">
                                <p>EN</p>
                            </div>
                            <div class="hover">
                                <p>EN</p>
                                <a href="../inscription.php"> FR </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>



    <h2> Create an account </h2>

    <section>
      
    	<div class="info">
        <form method="post" action="../../controllers/FormulaireInscription.php">
        <?php
			$error = test_input($_GET['inscription']);
			if (isset($error) && $error == "error") {
                echo "<p style='color:red'>Mail address already exists or the passwords are not the same. </p>";
            }
		
	?>
      			<input type="text" name="nom" placeholder="NAME" required />
                <input type="text" name="prenom" placeholder="FIRST NAME" required/>
                <input type="email" name="email" placeholder="ADRESS.MAIL@MAIL.COM" required/>
                <select name="genre" required>
       					<option value="genre"> GENDER </option>
                        <option value="feminin"> Female </option>	
                       <option value="masculin"> Male </option>	
       				</select>
                <input type="text" name="naissance" placeholder="BIRTH DATE" required />   
       			<input type="text" name="telephone" placeholder="TELEPHONE" required/>
      			<input type="text" name="adresse" placeholder="ADRESS " required />
                    <select name="pays" required>
                        <option value="pays"> COUNTRY </option>
       					<option value="france"> France </option>
       					<option value="royaume-Uni"> United Kingdom </option>
       					<option value="espagne"> Spain </option>
       					<option value="italie"> Italy </option>
       					<option value="etats-unis"> United States </option>
       					<option value="canada"> Canada </option>
       					<option value="chine"> China </option>
       					<option value="japon"> Japan </option>     	
       				</select>
                <input type="text" name="codepostale" placeholder="ZIPCODE" required />
                <input type="password" name="mdp" placeholder="Enter your password" required />
                <input type="password" name="conf_mdp" placeholder="Confirm your password" required />

            <div id="test">
    			<button class="bouton" type="reset">Cancel</button>
                <button class="bouton" type="submit">Submit</button>
            </div>
        </form>
    	</div>
    </section>
  </body>

  <footer>
    <p> WEBAC © Tous droits réservés <a href="../english/Mentions_legales.php" ><span>Legal Notice</span> </a><a href = "../english/cgu.php" ><span>Terms of Service</span></a></p>
</footer>
    
</html>