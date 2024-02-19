<?php 

include $_SERVER['DOCUMENT_ROOT'].'/assets/functions/db.php';

if( isset($_POST['email']) && isset($_POST['password']) ){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $sql = "SELECT * FROM users WHERE email='$email'";
    if( $user = db_query($sql,'select') ){
        $mainPassword = $user[0]['password'];
        if($mainPassword === $password){
            header('HTTP/1.1 200 success');
            echo 'success';
        }else{
            header('HTTP/1.1 400 invalid password');
        }
    }else{
        header('HTTP/1.1 400 invalid email');
    }
}else{
    header('HTTP/1.1 400 password or email is empty');
}