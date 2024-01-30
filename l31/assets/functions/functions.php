<?php




if($_POST['addContactUs']){
    addContactUs();
}

function addContactUs()
{
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $created_at = time();

    $sql = "INSERT INTO contactus  VALUES (Null,'$name','$email','$phone','$created_at')";

    if(!db_query($sql, 'insert')){
        header('HTTP/1.1 500 Internal Server Error');
    }

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


function db_connection()
{
    /*
$servername = "localhost";
$username = "root";
$password = "";
$db="impact_test";*/

    $servername = "sql11.freemysqlhosting.net";
    $username = "sql11679804";
    $password = "RQx48VKk4N";
    $db="sql11679804";

    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}