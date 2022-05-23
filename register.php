<?php
    require 'admin/database.php';
    $db = Database::connect();
    if(isset($_POST['okinscrip']))
    {
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $email1 = htmlspecialchars($_POST['email1']);
      $email2 = htmlspecialchars($_POST['email2']);
      $email1 = htmlspecialchars($_POST['email1']);
      $passwd1 = sha1($_POST['passwd1']);
      $passwd2 = sha1($_POST['passwd2']);

      if(!empty($_POST['pseudo']) AND !empty($_POST['email1']) AND !empty($_POST['email2']) AND !empty($_POST['passwd1']) AND !empty($_POST['passwd2']))
      {
        $pseudolenght = strlen($pseudo);
        if ($pseudolenght <= 255) 
        {
          if($email1 == $email2)
          {
            if(filter_var($email1, FILTER_VALIDATE_EMAIL))
            {
              $reqmail = $db->prepare("SELECT * FROM users WHERE email = ?");
              $reqmail->execute(array($email1));
              $mailexist = $reqmail->rowCount();
              if($mailexist == 0)
              {
            
            if($passwd1 == $passwd2)
            {
              $statement = $db->prepare("INSERT INTO users(username, email, password) VALUES(?, ?, ?)");
              $statement->execute(array($pseudo, $email1, $passwd1));

              header('Location: succes.php');
            }
            else
            {
              $erreur = "Vos mot de passe ne correspondent pas";
            }
            }
            else
            {
              $erreur = "Adresse mail déjà utiliser";
            }
            }
            else
            {
              $erreur = "Votre adresse mail n'est pas valide !";
            }
          }
          else
          {
            $erreur = "Vos adresses mail ne correspondent pas !";
          }
        }
        else
        {
          $erreur = "Votre pseudo ne doit pas dépasseé 255 caractères !";
        }
      }
      else
      {
        
        $erreur = "Tous les champs doivent être remplie !!";
      }
    }
    Database::disconnect();
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

<h1 class="text-logo"><span class="glyphicon glyphicon-grain"></span> Inscription <span class="glyphicon glyphicon-grain"></span></h1>
<div class ="container">
<div class="alert alert-danger" role="alert">Si vous avez un compte <a href="index.php">cliquez ici </a>pour vous connecter</div>
    </div>
    </div>
    <div class ="container admin">
    
    <form action = "" method ="POST">
    
  <?php if(isset($erreur)){ ?> <p class = "errorM" style = "color: red;"><?= $erreur?> </p> <?php }?>
    
  <div class="form-group">

    <label for="pseudo">Pseudo</label>
    <input type="text" class="form-control" id="pseudo" placeholder = "Entrer un  pseudo" name = "pseudo" value = "<?php if(isset($pseudo)){echo $pseudo;} ?>">
  </div>

  <div class="form-group">
    <label for="email1">Email</label>
    <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder = "Entrer une adresse mail" name = "email1" value = "<?php if(isset($email1)){echo $email1;} ?>">
  </div>

  <div class="form-group">
    <label for="email2">Confirmez votre adresse mail</label>
    <input type="email" class="form-control" id="email2" aria-describedby="emailHelp" placeholder = "Entrer une adresse mail" name = "email2" value = "<?php if(isset($email2)){echo $email2;} ?>">
  </div>

  <div class="form-group">
    <label for="motdepasse1">Mot de passe</label>
    <input type="password" class="form-control" id="motdepasse1"  placeholder = "Entrer un mot de passe" name = "passwd1">
  </div>

  <div class="form-group">
    <label for="motdepasse2">Confirmez le mot de passe</label>
    <input type="password" class="form-control" id="motdepasse2"  placeholder = "Confirmez  le mot de passe" name = "passwd2">
  </div>

  <button type="submit" class="btn btn-primary" name = "okinscrip">S'inscrire</button>
</form>
</body>

</html>