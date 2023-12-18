<?php

include ('../templats/header.php')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        <?php 
        require_once '../CSS/style.css';
        
        ?>
    </style></head>
<body>
    <div class="login-container">
        <h2>Inscription</h2>
        <form action="results.php" method="post">
            <input hidden type="text" value="signup" name="action">
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="email">Adresse couriel :</label>
                <input type="text" id="email" name="email">
            </div>
            <button type="submit">S'Inscrire</button>
        </form>
        
        <p>Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>
    </div>
</body>
</html>