<?php
$con = mysqli_connect("localhost", "root", "", "electronix");

if (mysqli_connect_errno()) {
    echo "Failed to connect : " . mysqli_connect_error();
}

$email_l = $_POST["log_email"];
$password_l = $_POST["log_pas"];

$mesage = "0";

$sql = "SELECT * FROM `ad_log`";
$run_user = mysqli_query($con, $sql);

while ($row_user = mysqli_fetch_array($run_user)) {
   
    $pass = $row_user["apwd"];
    $user = $row_user["aname"];

    if($pass == $password_l && $user ==$email_l ){
        $mesage = "ok";
    }
}

echo $mesage
?>