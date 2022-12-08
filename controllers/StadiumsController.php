<?php
require_once dirname(__DIR__).'/config/database.php';
require_once dirname(__DIR__).'/models/StadiumsModel.php';


class controllerStade extends Stadiums{
 public function AddStade(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_REQUEST['save'])){
                // extract([$_POST]);
                $name      =$_POST['nameStadiums'];
                $capacity  =$_POST['capacity'];
                $location  =$_POST['location'];
                $pic       =$_FILES['stadiumPicture']['name'];
                $image     =$_FILES['stadiumPicture']['tmp_name'];

                $result =$this ->addStadiums($name,$location,$capacity,$pic);
                // $stadium = new Stadiums();
                // $stadium->addStadiums();
                // header("Location:../pages/admin/stadiums.php");

                header("Location:../pages/admin/stadiums.php") ;

            }
        }
    }
    function getStads(){
        $stadium = new Stadiums();
        return $stadium->getStads();
     }

     function deletstad(){
        if(isset($_GET['deleteStad'])) {
            $stadium = new Stadiums();
            $stadium->deleteStadium($_GET['deleteStad']);
        }
     }
 
}

$stadium = new controllerStade();
$stadium->AddStade();
$stadium->deletstad();






// dirname(__DIR__).'/pages/admin/stadiums.php';


?>