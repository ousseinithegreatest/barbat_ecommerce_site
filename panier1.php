<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
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
    <?php
        if (!empty($_GET['id'])) {
            $idproduit = htmlentities($_GET['id']);
            require 'admin/db.php';
            $reponse = $bdd->prepare('SELECT * FROM items WHERE idProduit = ?');
            $reponse->execute(array($idproduit));
            $produit = $reponse->fetch();


            $sql = $bdd->prepare('INSERT INTO panier (client,libelle,prix,idUser) VALUES(?,?,?,?)');
            $sql->execute(array($_SESSION['username'],$produit['name'],$produit['price'],$_SESSION['idUser']));
            header("Location:accueil.php?idUser=". $_SESSION['idUser']);
          
        }
    ?>

</body>
</html>