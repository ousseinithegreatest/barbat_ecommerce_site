<!DOCTYPE html>
<html lang = "fr">
<head>
        <title>BARBAT</title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../js/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo"> ADMINISTRATEUR </span></h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Liste des articles   </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
              <?php
                  require 'db.php';
                  $reponse = $bdd->query("SELECT COUNT(*) AS nbproduit FROM items");
                  $donnees = $reponse->fetch();
              ?>


                <div class="alert alert-success col-md-6" role="alert">
                  <h4 align="center">Nombres de produits</h4>
                  <h4 align = "center"><?= $donnees['nbproduit']; ?><h4>
                </div>
                  <!--                                                 -->

                  <?php
                  require 'db.php';
                  $reponse = $bdd->query("SELECT COUNT(*) AS nbusers FROM users");
                  $donnees = $reponse->fetch();
                  ?>
                <div class="alert alert-danger col-md-6" role="alert">
                  <h4 align="center">Nombre d'utilisateurs</h4>
                  <h4 align = "center"><?= $donnees['nbusers']; ?><h4>
                </div>
                
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Description</th>
                      <th>Prix (FCFA)</th>
                      <th>Catégorie</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT items.idProduit, items.name, items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.idProduit DESC');
                        while($item = $statement->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'. $item['name'] . '</td>';
                            echo '<td>'. $item['description'] . '</td>';
                            echo '<td>'. number_format($item['price'], 2, '.', '') . '</td>';
                            echo '<td>'. $item['category'] . '</td>';
                            echo '<td width=300>';
                            echo '<a class="btn btn-default" href="view.php?id='.$item['idProduit'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                            echo ' ';
                            echo '<a class="btn btn-primary" href="update.php?id='.$item['idProduit'].'"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$item['idProduit'].'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
