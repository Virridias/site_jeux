<?php

function showData($title, $data)
{
    echo "</br></br><h2>" . $title . "</h2>";
    var_dump($data);
}

function selectUserByIdIndex($id)
{
    // récupérer une ligne dans user
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = " . $id);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_row($result);

    return $data;
}

function selectUserByIdAssoc($id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = " . $id);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);

    return $data;
}

function getAllUsersAssoc()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user");

    $data = [];
    $i = 0;
    while ($rangeeData = mysqli_fetch_assoc($result)) {
        $data[$i] = $rangeeData;
        $i++;
    };

    /* $imax = mysqli_num_rows($result);

    for ($i = 0; $i < $imax; $i++) {
        $rangeeData = mysqli_fetch_assoc($result);
        $data[$i] = $rangeeData;
    } */

    return $data;
}


function getAllUsersIndex()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user");

    $data = [];
    $i = 0;
    while ($rangeeData = mysqli_fetch_row($result)) {
        $data[$i] = $rangeeData;
        $i++;
    };

    /* $imax = mysqli_num_rows($result);

    for ($i = 0; $i < $imax; $i++) {
        $rangeeData = mysqli_fetch_row($result);
        $data[$i] = $rangeeData;
    } */

    return $data;
}
