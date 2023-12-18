<?php
require_once('../functions/functions.php');
require_once ("../functions/crud.php");
require_once ("../config/connexion.php");
include ('../templats/header.php');




// Supposons que $produits soit votre tableau de produits avec des images
$produits = array(
    array("nom" => "Attari", "prix" => 99.99, "image" => "../media/attari.jpg"),
    array("nom" => "Game boy color", "prix" => 126.27, "image" => "../media/gameboyvert.jpg"),
    array("nom" => "Game cube", "prix" => 86.47, "image" => "../media/gamecube.png"),
    array("nom" => "Nintendo 64", "prix" => 175.69, "image" => "../media/n64.png"),
    array("nom" => "Playstation 1", "prix" => 94.97, "image" => "../media/ps1.png"),
    array("nom" => "Xbox", "prix" => 96.88, "image" => "../media/xbox.jpg"),
);

// Boucle foreach pour afficher les produits avec des images
foreach ($produits as $produit) {
    echo '<div style="border: 1px solid #ccc; padding: 10px; margin: 10px; text-align: center;">';
    echo '<img src="' . $produit["image"] . '" alt="' . $produit["nom"] . '" style="max-width: 100px; max-height: 100px;"><br>';
    echo "Nom du produit: " . $produit["nom"] . "<br>";
    echo "Prix: " . $produit["prix"] . " €<br>";
    echo '</div>';
}

?>
