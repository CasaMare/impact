<?php 

include $_SERVER['DOCUMENT_ROOT'].'/assets/functions/db.php';

if( isset($_POST['email']) && isset($_POST['password']) ){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $sql = "INSERT INTO users VALUES (null,'$email','$password')";
    if(db_query($sql,'insert') ){
        header('HTTP/1.1 200 success');
        echo 'success';
    }else{
        header('HTTP/1.1 400 invalid email');
    }
}else{
    header('HTTP/1.1 400 password or email is empty');
}