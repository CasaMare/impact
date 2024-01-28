<?php
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

if(isset($_POST["add"])){
    set_data();
}else if($_POST['update']){
    //
}else if($_POST['delete']){
    //
}

function update_data(){
    //
}


function delete_data(){
    //
}


function set_data(){
    global $conn;
    $todo = $_POST['todo'];

    $sql = "INSERT INTO todos  VALUES (Null,'$todo')";
        
    if (mysqli_query($conn, $sql)) {
        get_data();
    } else {
        echo json_encode(array("status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error));
    }

}

function get_data(){

    global $conn;

    $sql = "Select * from todos";

    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            $task = $row["text"];
            $id = $row["id"];
            echo  "<li id='task_$id' > $task </li>";      
        }
    } 
}

