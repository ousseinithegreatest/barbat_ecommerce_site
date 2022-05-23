<?php
session_start();

    require 'admin/database.php';
    $db = Database::connect();
    if(isset($_POST['okinscripconnect']))
    {
        $mailconnect = htmlspecialchars($_POST['emailconnect']);
        $passwdconnect = sha1($_POST['passwdconnect']);
        if(!empty($mailconnect) AND !empty($passwdconnect))
        {
            $requser = $db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $requser->execute(array($mailconnect, $passwdconnect));
            $userexist = $requser->rowCount();
            if($userexist == 1)
            {
                $userinfo = $requser->fetch();
                $_SESSION['idUser'] = $userinfo['idUser'];
                $_SESSION['username'] = $userinfo['username'];
                $_SESSION['email'] = $userinfo['email'];
                header("Location: accueil.php?idUser=".$_SESSION['idUser']);

            }
            else
            {
                $erreur = "Le mail ou le mot de passe est incorrect !";
            }
        }
        else
        {
            $erreur = "Tous les champs doivent être remplies";
        }
    }
  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
        <title>BARBAT</title>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="./js/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./css/styles.css">
    </head>
<body>
<div class="container">
<div class="jumbotron jumbotron-fluid" style="background: url(images/bckgrd4.jpg)">
  <div class="container">
    <h1 class="display-4">BARBAT</h1>
    <p class="lead">Connecter vous pour commercer !</p>
  </div>
</div>
</div>
<!--<h1 class="text-logo">Connexion</h1> -->
    <div class ="container admin">
    <div class="alert alert-danger" role="alert">Si vous n'avez pas de compte <a href="register.php">cliquez ici</a> pour vous connecter</div>
    <div class="profilcenter">
    <form action = "index.php" method ="POST">
    <?php if(isset($erreur)){ ?> <p class = "errorM" style = "color: red;"><?= $erreur?> </p> <?php }?>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder = "Entrer votre adresse mail" name = "emailconnect">
  </div>
  <div class="form-group">
    <label for="motdepasse">Mot de passe</label>
    <input type="password" class="form-control" id="motdepasse"  placeholder = "Entrer votre mot de passe" name = "passwdconnect">
  </div>

  <button type="submit" class="btn btn-primary" name = "okinscripconnect">Se connecter</button>
  <br>
  <?php
  if(!empty($message)){
    echo '<div class="alert alert-danger">';
    echo $message;
    echo'</div>';
  }
  ?>
</form>
    </div>    

</body>

</html>