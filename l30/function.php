<?php

if(isset($_GET["getList"])){
    get_data();
}else if(isset($_POST["add"])){
    set_data();
}else if($_POST['update']){
    update_data();
}else if($_POST['delete']){
    delete_data();
}


function get_data()
{
    if($todoList = db_query("SELECT * FROM todos", "select")){
        $response = '';
        foreach ($todoList as $todoItem){
            $response .= "<li id='task_{$todoItem['id']}' > <input id='{$todoItem['id']}' type='text' value='{$todoItem['text']}'>  
<span onclick='deleteItem({$todoItem['id']})' id='delete-button'>Delete</span> 
<span style='background: orange;' onclick='updateItem({$todoItem['id']})' id='delete-button'>Update</span>  
</li>";
        }

        echo $response;
    }

}

function set_data()
{
    $todo = htmlspecialchars($_POST['todo']);

    $sql = "INSERT INTO todos  VALUES (Null,'$todo')";

    db_query($sql, 'insert');
}


function delete_data()
{
    $id = htmlspecialchars($_POST['id']);

    $sql = "DELETE FROM todos WHERE id=$id";

    db_query($sql, 'delete');

}

function update_data()
{
    $id = htmlspecialchars($_POST['id']);
    $todo = htmlspecialchars($_POST['text']);

    $sql = "UPDATE todos SET text='{$todo}' WHERE id={$id}";

    db_query($sql, 'update');
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