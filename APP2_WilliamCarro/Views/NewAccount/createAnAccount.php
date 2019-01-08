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
<h2> Fill the form to create a new account. </h2>

<section>
  
    <div class="info">
    <form method="post" action="..APP2_WilliamCarro/Controllers/newAccountForm.php">
            <p> Login: </p><input type="text" name="Login" placeholder="" required />
            <p> Passeword: </p><input type="text" name="Passeword" placeholder="" required/>
            <p> Repeat passeword: </p><input type="email" name="Repeat_passeword" placeholder="" required/>

        <div id="test">
            <!--<button class="bouton" type="reset">Annuler</button>-->
            <button class="bouton" type="submit">Valider</button>
        </div>
    </form>
    </div>
</section>
</body>
</html>