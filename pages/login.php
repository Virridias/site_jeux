<?php
//if token is ok redirect sur index
include ('../templats/header.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <style>
        <?php 
        require_once '../CSS/style.css';
        
        ?>
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <form action="results.php" method="post">
            <input hidden name="action" value="login">
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Se Connecter</button>
            <a href="signup.php" class="register-button">S'Inscrire</a>
        </form>
    </div>
</body>
</html>
