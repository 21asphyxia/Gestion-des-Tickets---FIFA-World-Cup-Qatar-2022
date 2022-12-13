<?php
require_once('C:\xampp\htdocs\Gestion-des-Tickets---FIFA-World-Cup-Qatar-2022\classes\SignUp.class.php');
$dsn=new SignUp();
$emailS = $_SESSION["email"];


$getrow = $dsn->getRows("SELECT * FROM users WHERE email=?", array($emailS));
foreach ($getrow as $val);



if(isset($_POST["updateProfile"])){
    $name=$_POST["nameProfile"];
    $email=$_POST["emailProfile"];
    $password = $_POST["passwordProfile"];
    $dsn->updateProfile("UPDATE users SET name =?, email =?, password =? WHERE email =?", array($name,$email,$password,$emailS));
    $_SESSION["email"] = $email;
    header('location:profile.php');
}

if(isset($_POST["deleteProfile"])){

    $dsn->updateProfile("DELETE from users WHERE email =?", array($emailS));
    session_destroy();
    header('location: http://localhost/Gestion-des-Tickets---FIFA-World-Cup-Qatar-2022/index.php');
}



?>