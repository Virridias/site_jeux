<?php


function signupValidation($data)
{
    $isValide = true;
    //username >1 caractere
    $error_username = "";
    if (strlen($data['username']) < 2) {
        $isValide = false;
        $error_username = "Votre nom d'utilisateur est trop court. il doit avoir plus de 1 caractere";
    }

    //email regex pour email
    $error_email = "";
    //password min 8 max 16
    $error_pwd = "";
    $validationData = pwdLengthValidation($data['password']);
    if (!$validationData['isValid']) {
        $error_pwd = $validationData['msg'];
        $isValide = $validationData['isValid'];
    }



    return [
        "isValid" => $isValide,
        "error_username" => $error_username,
        "error_email" => $error_email,
        "error_pwd" => $error_pwd,
    ];
}

function pwdLengthValidation($pwd)
{
    $length = strlen($pwd);
    $responses = [
        'isValid' => true,
        'msg' => ''
    ];
    if ($length < 8) {
        $responses = [
            'isValid' => false,
            'msg' => 'Votre mot de passe est trop court. Doit etre superieur a 8 caracteres',
        ];
    } elseif ($length > 16) {
        $responses = [
            'isValid' => false,
            'msg' => 'Votre mot de passe est trop long. Doit etre inferieur a 16 caracteres'
        ];
    }
    return $responses;
}
