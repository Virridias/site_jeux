<?php

include ('../templats/header.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: page_d_accueil.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $url_img = $_POST['url_img'];
    $description = $_POST['description'];
    $console = $_POST['console'];
    $year = $_POST['year'];

    $query = $connexion->prepare("INSERT INTO Product (name, qty, price, url_img, description, console, year) VALUES (?, ?, ?, ?, ?, ?, ?)");

    $query->bind_param("sidsiss", $name, $qty, $price, $url_img, $description, $console, $year);

    $query->execute();

}
?>

<form method="post" action="ajout_produit.php">
    <label for="name">Nom du produit:</label>
    <input type="text" name="name" required>

    <label for="qty">Quantité:</label>
    <input type="number" name="qty" required>

    <label for="price">Prix:</label>
    <input type="text" name="price" required>

    <label for="url_img">URL de l'image:</label>
    <input type="text" name="url_img">

    <label for="description">Description:</label>
    <textarea name="description" required></textarea>

    <label for="console">Console:</label>
    <input type="text" name="console" required>

    <label for="year">Année:</label>
    <input type="number" name="year">

    <input type="submit" value="Ajouter produit">
</form>
