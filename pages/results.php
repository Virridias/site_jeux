<h2>Page de résultat</h2>
<?php
require_once "../config/connexion.php";
require_once "../functions/crud.php";
require_once "../functions/functions.php";
require_once "../functions/validation.php";

if (!empty($_POST)) {

    //faire un switch case

    if ($_POST["action"] == "signup") {


        //validation
        $validationData = signupValidation($_POST);
        // si ma validation est ok je passe à la suite 
        //sinon j'affiche les messages d'erreur





        //enregistrer mon utilisateur
        if ($validationData['isValid']) {
            $data = [
                'email' => $_POST['email'],
                'password' => encodePwd($_POST['password']),
                'username' => $_POST['username'],
            ];

            $result = createUser($data);
        }


    //redirect login

        //si l'enregistrement a fonctionné : rediriger vers index.php
    }

    if ($_POST["action"] == "login") {
        var_dump("je suis dans mon action login");
        $username = $_POST['username'];
        $password = encodePwd($_POST['password']);
    
        if (validationLoginUser($username, $password)) {
            // Démarrez la session et redirigez vers la page d'accueil, par exemple
            session_start();
            $_SESSION['username'] = $username;
            header("Location: indexUser.php");
            exit();
        } else {
            // Affichez un message d'erreur, par exemple
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }
    

}else{
        //redirect vers signup
        $url = '../';
        header('Location: ' . $url);
}

?>