<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="inscription.css" />
    <title> Inscription </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<html>
<body>
<h2> Créer un compte </h2>

<section>
  
    <div class="info">
    <form method="post" action="../controllers/FormulaireInscription.php">
              <input type="text" name="nom" placeholder="NOM" required />
            <input type="text" name="prenom" placeholder="PRENOM" required/>
            <input type="email" name="email" placeholder="ADRESSE.EMAIL@MAIL.COM" required/>
            <select name="genre" required>
                       <option value="genre"> GENRE </option>
                    <option value="feminin"> Féminin </option>	
                   <option value="masculin"> Masculin </option>	
                   </select>
            <input type="date" name="naissance" placeholder="DATE DE NAISSANCE" required />   
               <input type="text" name="telephone" placeholder="TELEPHONE" required/>
              <input type="text" name="adresse" placeholder="ADRESSE PRINCIPALE" required />
                <select name="pays" required>
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
            <input type="text" name="codepostale" placeholder="CODE POSTAL" required />
            <input type="password" name="mdp" placeholder="Entrer votre mot de passe" required />
            <input type="password" name="conf_mdp" placeholder="Confirmer mot de passe" required />

        <div id="test">
            <button class="bouton" type="reset">Annuler</button>
            <button class="bouton" type="submit">Valider</button>
        </div>
    </form>
    </div>
</section>
</body>
</html>