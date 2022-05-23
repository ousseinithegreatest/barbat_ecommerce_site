<?php
session_start();
    require 'admin/database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT items.idProduit, items.name, items.description, items.price, items.image, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.idProduit = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    Database::disconnect();

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<!DOCTYPE html>
<html lang = "fr">
<head>
        <title>BARBAT</title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    
    <body>
       <h1 class="text-logo"> BARBAT </span></h1>
         <div class="container admin">
            <div class="row">
               <div class="col-sm-6">
               <div class="form-actions">
                      <a class="btn btn-primary" href="accueil.php?idUser= <?php echo $_SESSION['idUser'] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                    <h1><strong>Produit</strong></h1>
                    <br>
                    <form>
                      <div class="form-group">
                        <label>Nom:</label><?php echo '  '.$item['name'];?>
                      </div>
                      <div class="form-group">
                        <label>Description:</label><?php echo '  '.$item['description'];?>
                      </div>
                      <div class="form-group">
                        <label>Prix:</label><?php echo '  '.number_format((float)$item['price'], 2, '.', ''). ' FCFA';?>
                      </div>
                    </form>
                    <br>
                </div> 
                <div class="col-sm-6 site">
                    <div class="thumbnail">
                        <img src="<?php echo 'images/'.$item['image'];?>" alt="...">
                        <div class="price"><?php echo number_format((float)$item['price'], 2, '.', ''). ' FCFA';?></div>
                          <div class="caption">
                            <h4><?php echo $item['name'];?></h4>
                            <p><?php echo $item['description'];?></p>
                          </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>

