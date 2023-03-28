<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/stylefront.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Connexion/Inscription</title>
</head>

<body>
    <header>

    </header>
    <div class="container">
        <form action="" method="post" name="form-register" class="form-register">
            <label for="loginname">Nom :</label>
            <input type="text" name="loginname" id="loginname">
            <label for="login">Prénom :</label>
            <input type="text" name="login" id="login">
            <label for="loginemail">Email :</label>
            <input type="text" name="loginemail" id="loginemail">
            <label for="loginpassword">Mot de passe :</label>
            <input type="text" name="loginpassword" id="loginpassword">
            <label for="loginpasswordr">Répéter votre mot de passe</label>
            <input type="text" name="loginpasswordr" id="loginpasswordr">
            <button type="reset" name="reset">Annuler</button>
            <button type="submit" name="submit">Valider</button>
            <button type="button" class="btn-loginform">Déjà membre ? Connectez vous</button>
        </form>
        <form action="" method="post" name="form-login" class="form-login">
            <label for="registeremail">Email :</label>
            <input type="text" name="registeremail" id="registeremail">
            <label for="registerpassword">Mot de passe :</label>
            <input type="text" name="registerpassword" id="registerpassword">
            <button type="reset">Annuler</button>
            <button type="submit">Valider</button>
            <button type="button" class="btn-registerform">Vous n'êtes pas membre ? Inscrivez vous</button>
        </form>
    </div>
    <footer>

    </footer>
    <script type="text/javascript" src="../assets/js/scriptfront.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>