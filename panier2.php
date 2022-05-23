<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="./js/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<div class ="container admin">
    
    <h1 align="center">Mon panier</h1>
    <?php
     $user = $_SESSION['idUser'];
    echo '<a href="accueil.php?idUser='.$user.'"><button type="submit" class="btn btn-primary"> Retour</button></a>'
    ?>
    <br>
    <br>
      <?php
      require 'admin/db.php';
      $user = $_SESSION['idUser'];
      $query=$bdd->query("SELECT * FROM panier WHERE idUser= $user ORDER BY idPanier DESC");
      ?>
    <table class="table table-striped table-primary">
        <th>IdPanier</th>
        <th>IdUser</th>
        <th>Client</th>
        <th>Libélle</th>
        <th>Prix</th>
        <th>Date</th>
        <th>Rétirer</th>
      <?php
      while($infos=$query->fetch()){
          echo '<tr>';
          echo "<td>". $infos['idPanier']. "</td>";
          echo "<td>".$user. "</td>";
          echo "<td>".$infos['client']. "</td>";
          echo "<td>". $infos['libelle']. "</td>";
          echo "<td>". $infos['prix']. "</td>";
          echo "<td>". $infos['date']. "</td>";
          echo '<td> <a href="dindil.php?idPanier='.$infos['idPanier'].'"><button>Rétirer</button></a></td>';
          echo '</tr>';
      }
      ?>
     
    </table>
    </div>
    

</body>
</html>