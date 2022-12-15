<?php
require_once(__DIR__.'/../classes/SignUp.class.php');
$dsn=new SignUp();
$emailS = $_SESSION["email"];


$getrow = $dsn->getRows("SELECT * FROM users WHERE email=?", array($emailS));
foreach ($getrow as $val);



if(isset($_POST["updateProfile"])){
    $name=$_POST["nameProfile"];
    $email=$_POST["emailProfile"];
    $userId = $_SESSION['id'];
    if($_POST["passwordProfile"] != ""){
    $password = htmlspecialchars(trim(md5($_POST["passwordProfile"])));
    $dsn->updateProfile("UPDATE users SET name =?, email =?, password =? WHERE id =?", array($name,$email,$password,$userId));
    }
    else{
        $dsn->updateProfile("UPDATE users SET name =?, email =? WHERE id =?", array($name,$email,$userId));
    }
    header('location:spectatorProfile.php');
}

if(isset($_POST["deleteProfile"])){

    $dsn->updateProfile("DELETE from users WHERE email =?", array($emailS));
    session_destroy();
    header('location: http://localhost/Gestion-des-Tickets---FIFA-World-Cup-Qatar-2022/index.php');
}



?>