<?php
require '../classes/SignUp.class.php';


$dsn = new SignUp();
if(isset($_POST["login"])){
    $email    = $_POST["emailLogin"];
    $password = $_POST["passwordLogin"];

    $row    = $dsn->NumberRow("SELECT * FROM users WHERE email = ? AND password=? ", array($email,$password));
    $getrow = $dsn->getRows("SELECT * FROM users WHERE email = ? AND password=? ", array($email, $password));
    foreach ($getrow as $val)
    if($row != 0){
        $_SESSION["id"] = $val["id"];
        $_SESSION["email"] = $email;
        if($val["role"] == "admin"){
            header('location:../pages/admin/dashboard.php');
        }else{
            header('location:../index.php');
        }
    }
}

