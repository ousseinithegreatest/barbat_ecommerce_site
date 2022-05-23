<?php
    session_start();

    require 'admin/database.php';
    $db = Database::connect();
    if(isset($_GET['idUser']) AND $_GET['idUser'] > 1)
    {
        $getid = intval($_GET['idUser']);
        $requser = $db->prepare('SELECT * FROM users WHERE idUser = ? ');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
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
<h1 class="text-logo"><span class="glyphicon glyphicon-grain"></span> Profil <span class="glyphicon glyphicon-grain"></span></h1>
    <div class ="container admin">
        <div class="profilcenter">
            <h2>Profil de <?php echo $userinfo['username']; ?> <h2>
            
            
                <img src="images/avatar.png" alt="..." class="img-thumbnail">
                <br><br>
                <h4>Pseudo : <?php echo $userinfo['username']; ?> </h4>
                <h4>Email : <?php echo $userinfo['email']; ?></h4>
                <?php
                    if(isset($_SESSION['idUser']) AND $userinfo['idUser'] == $_SESSION['idUser'])
                    {
                    ?>
                    <a href="#"><button type="button" class="btn btn-info">Editer mon profil</button></a>
                    <a href="deconnexion.php"><button type="button" class="btn btn-danger">Se déconnecter</button></a>
                    <?php
                    }
                ?>
        </div>

    </div>
</body>

</html>
<?php
}
?>    