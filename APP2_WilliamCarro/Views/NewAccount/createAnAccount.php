<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="createAnAccount.css" />
    <title> Inscription </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<html>
<body>
<h2> Fill the form to create a new account. </h2>

<section>
    <form method="post" action="..APP2_WilliamCarro/Controllers/newAccountForm.php">  
            <p> Login: <input type="text" name="Login" placeholder="" required /> </p>
            <div id ="row">
                <p> Passeword: <input type="password" name="Passeword" placeholder="" required/> </p>
                <p> Repeat passeword: <input type="password" name="Repeat_passeword" placeholder="" required/> </p>
            <div>
            <!--<button class="bouton" type="reset">Annuler</button>-->
            <button class="bouton" type="submit">Submit</button>
    </form>
</section>
</body>
</html>