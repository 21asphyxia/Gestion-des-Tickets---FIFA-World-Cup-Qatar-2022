<?php
require '../classes/SignUp.class.php';


if (isset($_POST["signup"])) {
    $fullName        = htmlspecialchars(trim($_POST['fullname']));
    $email           = htmlspecialchars(trim($_POST['email']));
    $password        = htmlspecialchars(trim(md5($_POST['password'])));
    $confirmpassword = htmlspecialchars(trim(md5($_POST["confirm-password"])));
    $dsn = new SignUp();
    $row = $dsn->NumberRow("SELECT * FROM users WHERE email=?", array($email));
    if($row != 0){
        echo "This email already exist";
    }else{
        $dsn->Insertdata("INSERT INTO users (name, email, password, role) Values (?,?,?,?)", array($fullName, $email, $password, 'spectator'));
        header('location:../index.php');
    }
}
