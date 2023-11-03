<h2>Page de resultats</h2>
</br>
<?php
require_once "../functions/crud.php";
require_once "../functions/functions.php";


var_dump($_POST);

if (isset($_POST) && $_POST["action"] == "signup"){

    //validation
    $validationData = signupValidation($_POST);
    //Si ma validation est ok je passe a la suite sinon jaffiche les messages d'erreur

    //vérifier si deja dans la base

    //enregistré mon utilisateur
    if ($validationData['isValid']) {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'username' => $_POST['username'],
        ];
        $result = createUser($data);

    }
   

    // Si l'enregistrement a fonctionneé : rediriger vers index.php
}
//Votre enregistrement s'est bien effectué
//vous etes bien connecté
?>

