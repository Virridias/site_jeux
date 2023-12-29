<?php

function signupValidation($data)
{
    $isValid = true;
    //username >1 caractere
    $usernameIsValidData = usernameIsValid($data['username']);
    $error_username = $usernameIsValidData['msg'];
    $isValid = $usernameIsValidData['isValid'];

    //email voir regex
    $emailIsValidData = emailIsValid($data['email']);
    $error_email = $emailIsValidData['msg'];

    if ($isValid) {
        $isValid = $emailIsValidData['isValid'];
    }


    //pwd
    $error_pwd = '';
    $pwdIsValidData = pwdLenghtValidation($data['password']);
    $error_pwd = $pwdIsValidData['msg'];
    if ($isValid) {
        $isValid = $pwdIsValidData['isValid'];
    }


    return [
        "isValid" => $isValid,
        "error_username" => $error_username,
        "error_email" => $error_email,
        "error_pwd" => $error_pwd,
    ];
}

function usernameIsValid($username)
{
    if (strlen($username) < 2) {

        return [
            'isValid' => false,
            'msg' => "Votre nom d'utilisateur est trop court. il doit faire plus d'un caractère."
        ];
    }
    //get user by username
    $userInDB = getUserByUsername($username);

    if ($userInDB) {
        //error exist déja 
        return [
            'isValid' => false,
            'msg' => "Votre nom d'utilisateur est déjà utilisé."
        ];
    }

    return [
        'isValid' => true,
        'msg' => ''
    ];
}

function emailIsValid($email)
{

    $email_validation_regex = "/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
    if (!preg_match($email_validation_regex, $email)) {
        return [
            'isValid' => false,
            'msg' => "Format d'email invalid",
        ];
    }
    return [
        'isValid' => true,
        'msg' => '',
    ];
}

function pwdLenghtValidation($pwd)
{
    //minimum 8 max 16
    $length = strlen($pwd);

    if ($length < 8) {
        return [
            'isValid' => false,
            'msg' => 'Votre mot de passe est trop court. Doit être supérieur a 8 caractères'
        ];
    } elseif ($length > 16) {
        return [
            'isValid' => false,
            'msg' => 'Votre mot de passe est trop long. Doit être inférieur a 16 caractères'
        ];
    }
    return [
        'isValid' => true,
        'msg' => ''
    ];
}


function validationLoginUser($username, $password) {
    global $conn;

    // Requête préparée pour éviter les injections SQL
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);

            if ($password == $row['password']) {
                // Vérifier si l'utilisateur est un administrateur
                if ($row['role_id'] == 1) {
                    $token = bin2hex(random_bytes(32));

                    // Stocker le token dans la base de données
                    $updateTokenQuery = "UPDATE user SET token = ? WHERE id = ?";
                    $updateTokenStmt = mysqli_prepare($conn, $updateTokenQuery);

                    if ($updateTokenStmt) {
                        $userId = $row['id'];
                        mysqli_stmt_bind_param($updateTokenStmt, "si", $token, $userId);
                        mysqli_stmt_execute($updateTokenStmt);
                        mysqli_stmt_close($updateTokenStmt);

                        // Rediriger vers adminindex.php
                        header('Location: adminindex.php');
                        exit();
                    } else {
                        die("Erreur de préparation de la requête: " . mysqli_error($conn));
                    }
                } else {
                    // L'utilisateur n'est pas un administrateur
                    $token = bin2hex(random_bytes(32));

                    // Stocker le token dans la base de données
                    $updateTokenQuery = "UPDATE user SET token = ? WHERE id = ?";
                    $updateTokenStmt = mysqli_prepare($conn, $updateTokenQuery);

                    if ($updateTokenStmt) {
                        $userId = $row['id'];
                        mysqli_stmt_bind_param($updateTokenStmt, "si", $token, $userId);
                        mysqli_stmt_execute($updateTokenStmt);
                        mysqli_stmt_close($updateTokenStmt);

                        // Rediriger vers indexUser.php
                        header('Location: indexUser.php');
                        exit();
                    } else {
                        die("Erreur de préparation de la requête: " . mysqli_error($conn));
                    }
                }
            } else {
                // Mot de passe incorrect
                return false;
            }
        } else {
            // Utilisateur non trouvé
            return false;
        }

        mysqli_stmt_close($stmt);
    } else {
        die("Erreur de préparation de la requête: " . mysqli_error($conn));
    }
}
