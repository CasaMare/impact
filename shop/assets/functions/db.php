<?php

function db_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db="impact";
/*
    $servername = "db4free.net";
    $username = "impact";
    $password = "1cIGrYFGNB";
    $db="impact";*/



    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}


function db_query(string $sql, string $type): array|bool
{
    if(!in_array($type,['select','insert','update','delete'])){
        throw new Exception('Invalid query type');
    }

    $conn = db_connection();

    $result = mysqli_query($conn, $sql, MYSQLI_USE_RESULT);

    if (!$result) {
        echo json_encode([
            "status" => "error",
            "message" => "Error: " . $sql . "<br>" . $conn->error
        ]);
        return false;
    }
    if('select' === $type){
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    return true;
}