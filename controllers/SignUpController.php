<?php
require '../classes/SignUp.class.php';


if (isset($_POST["signup"])) {
    $fullName        = $_POST['fullname'];
    $email           = $_POST['email'];
    $password        = $_POST['password'];
    $confirmpassword = $_POST["confirm-password"];
    $dsn = new SignUp();
    $row=$dsn->NumberRow("SELECT * FROM users WHERE email=?", array($email));
    if($row != 0){
        $erreur = "THIS EMAIL ALREADY EXIST";
    }else{
        $dsn->Insertdata("INSERT INTO users (name, email, password, role) Values (?,?,?,?)", array($fullName, $email, $password, 'spectator'));
        header('location:../index.php');
    }
}