<?php

    session_start();
    if(empty($_SESSION)){ 

        header ("Location:login.php?login=0");
    }
    require 'admin/db.php';
    if(isset($_GET['idUser']) AND $_GET['idUser'] > 1)
    {
        $getid = intval($_GET['idUser']);
        $requser = $bdd->prepare('SELECT * FROM users WHERE idUser = ? ');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
        
?>

<!DOCTYPE html>
<html lang = "fr">
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
        <!--<div>Panier</div>-->
        <div class="container site">
        <!--<div class="panier">Panier</div>-->
            <?php
				require 'admin/database.php';
			 
                echo '
            <nav class="navbar navbar-default navbar-light bg-light">
            <div class="navbar-header">
                <button type="button" class="navbar navbar-toggle" data-toggle="collapse" data-target="#main_menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>';
            echo ' 
            <div class="collapse navbar-collapse" id="main_menu">
                <ul class="nav navbar-nav navbar-left">';
                $db = Database::connect();
                $statement = $db->query('SELECT * FROM categories');
                $categories = $statement->fetchAll();
                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                    echo '<li role="presentation" class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                    else
                    echo '<li role="presentation"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                }
               echo '<li class="nav-item"><a class="nav-link" href="panier2.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>';
               
               echo '<li class="nav-item"><a class="nav-link"  href="profil.php?idUser='.$userinfo['idUser'].'"><span class="glyphicon glyphicon-user"></span>'.  $_SESSION['username'] .'</a></li>';

               ?> 
               <?php
                echo '</ul>
                
            </div>
            
            </nav>';
            Database::disconnect();
                ?>
                
                <div class="jumbotron jumbotron-fluid" style = "background: url(images/bckgrd.jpg);
                color: white;">
                    <div class="container">
                        <h1 class="display-4">Bienvenue sur BARBAT</h1>
                        <p class="lead"></p>
                    </div>
                </div>
                <?php
                echo '<div class="tab-content">';

                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                        echo '<div class="tab-pane active" id="' . $category['id'] .'">';
                    else
                        echo '<div class="tab-pane" id="' . $category['id'] .'">';
                    
                    echo '<div class="row">';
                    
                    $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                    $statement->execute(array($category['id']));
                    while ($item = $statement->fetch()) 
                    {
                        echo '<div class="col-sm-6 col-md-4">';
                        echo '<div class="thumbnail">';
                        echo '<img  src="images/' . $item['image'] . '" alt="..." class= "img-thumbnail">';
                        echo '<div class="price">' . number_format($item['price'], 2, '.', ''). ' FCFA</div>';
                        echo '<div class="caption">';
                        echo '<h4>' . $item['name'] . '</h4>
                                        <p>' . $item['description'] . '</p>';
                                        echo '<a href="details.php?id='.$item['idProduit'].'" class="btn btn-order" role="button"><span class="glyphicon glyphicon-eye-open"></span> Voir le produit</a><br><br>';
                                        echo '<a href="panier1.php?id='.$item['idProduit'].'" class="btn btn-order btn-warning" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter panier</a>';
                                    echo '</div>
                                </div>
                            </div>';
                    }
                   
                   echo    '</div>
                        </div>';
                }
                Database::disconnect();
                echo  '</div>';
            ?>
            <footer class="footer-distributed">

<div class="footer-left">

    <h3><span>BARBAT</span></h3>


    <p class="footer-company-name">BARBAT &copy; 2020</p>
</div>

<div class="footer-center">

    <div>
        <i class="fa fa-map-marker"></i>
        <p><span>21 Point-E</span> Dakar, Sénégal</p>
    </div>

    <div>
        <i class="fa fa-phone"></i>
        <p>+221 77 094 01 13</p>
    </div>

    <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:ousseinijiko@gmail.com" style ="color: black;">ousseinijiko@gmail.com</a></p>
    </div>

</div>

            <div class="footer-right">

    <p class="footer-company-about" style ="color: #ffff;">
        <span>A propos de nous</span>
        Site E-commerce de référence en Arique ! 
    </p>

</div>

</footer>	
        </div>
    </body>
</html>

<?php

}

?>    