<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=db-barbat;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

/*connexion base de données pour compter les nombres de produit et nombre d'utilisateur 'database.php' affiche erreur donc j'ai crée celle ci pour ça */

?>