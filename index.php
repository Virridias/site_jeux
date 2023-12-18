<?php
require_once('functions/functions.php');
require_once ("functions/crud.php");
require_once ("config/connexion.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Connexion
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="pages/login.php">Connexion</a></li>
                        <li><a class="dropdown-item" href="pages/signup.php">Crée compte</a></li>
                        <li>
                    </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="pages/panier.php">Panier</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<?php

// Supposons que $produits soit votre tableau de produits avec des images
$produits = array(
    array("nom" => "Attari", "prix" => 99.99, "image" => "media/attari.jpg"),
    array("nom" => "Game boy color", "prix" => 126.27, "image" => "media/gameboyvert.jpg"),
    array("nom" => "Game cube", "prix" => 86.47, "image" => "media/gamecube.png"),
    array("nom" => "Nintendo 64", "prix" => 175.69, "image" => "media/n64.png"),
    array("nom" => "Playstation 1", "prix" => 94.97, "image" => "media/ps1.png"),
    array("nom" => "Xbox", "prix" => 96.88, "image" => "media/xbox.jpg"),
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

</body>
</html>