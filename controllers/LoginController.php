<?php
session_start();
require '../classes/SignUp.class.php';


$dsn = new SignUp();
if(isset($_POST["login"])){
    $email    = $_POST["emailLogin"];
    $password = $_POST["passwordLogin"];

    $row    = $dsn->NumberRow("SELECT * FROM users WHERE email = ? AND password=? ", array($email,$password));
    $getrow = $dsn->getRows("SELECT * FROM users WHERE email = ? AND password=? ", array($email, $password));
    foreach ($getrow as $val)
    if($row != 0){
        if($val["role"] == "admin"){
            header('location:../pages/admin/dashboard.php');
                $_SESSION["email"] = $email;
        }else{
            header('location:../pages/spectator/reservation.php');
        }
    }
}

