<?php
    require 'admin/db.php';
    if (!empty($_GET['idPanier'])) {
        $idpanier = htmlentities($_GET['idPanier']);
        $sql = $bdd->prepare('DELETE FROM panier WHERE idPanier = ?');
        $sql->execute(array($idpanier));
        header('Location:panier2.php');
    }else{
        header('Location:panier2.php');
    }
?>