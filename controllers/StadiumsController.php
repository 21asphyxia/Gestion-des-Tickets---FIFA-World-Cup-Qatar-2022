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
                if(!empty($_FILES["stadiumPicture"])) {
                    $pic=$this->uploadimage();
                    $result =$this ->addStadiums($name,$location,$capacity,$pic);
                }
                else{
                    $result =$this ->addStadiums($name,$location,$capacity);
                }
                header("Location:../pages/admin/stadiums.php") ;
            }else{
                return "updated";
            }
        }
    }

    public function UpdateStade(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_REQUEST['update'])){
                // extract([$_POST]);
                $id      =$_POST['stadium-id'];
                $name      =$_POST['nameStadiums'];
                $capacity  =$_POST['capacity'];
                $location  =$_POST['location'];
                if(!empty($_FILES["stadiumPicture"])) {
                    $pic=$this->uploadimage();
                    $result =$this ->update($name,$location,$capacity,$id,$pic);
                }
                else{
                    $result =$this ->update($name,$location,$capacity,$id);
                }
                header("Location:../pages/admin/stadiums.php") ;

            }else{
                return "updated";
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

    function uploadimage(){
        global $conn;
        $img_name = $_FILES['stadiumPicture']['name'];
        $img_size = $_FILES['stadiumPicture']['size'];
        $tmp_name = $_FILES['stadiumPicture']['tmp_name'];
        $error    = $_FILES['stadiumPicture']['error'];

        if ($error === 0){   
            if ($img_size > 1000000) 
            {
                $_SESSION['Error'] = "Sorry, your file is too large.";
                header('location: ../pages/admin/stadiums.php');
            }
            else
            {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);// return extension of image
                $img_ex_lc = strtolower($img_ex);
                
                $allowed_exs = array("jpg", "jpeg", "png"); 

                    if (in_array($img_ex_lc, $allowed_exs)) 
                    {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = '../assets/upload/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                    }
                    else {
                        $_SESSION['Error'] = "You can't upload files of this type";
                        header('location: ../pages/admin/stadiums.php');
                    }
            }
        }
        else{
            $_SESSION['Error'] = 'unknown error occurred!';
            header('location: ../pages/dashboard.php');   
        }
        return $new_img_name ;
    }
} 

$stadium = new controllerStade();
$stadium->AddStade();
$stadium->deletstad();
$stadium->UpdateStade();


if(isset($_POST['getStad'])){
    // header('Content-Type : application/json');
    
    echo json_encode($stadium->getSpecificStad($_POST['getStad']));
    die;
}






// dirname(__DIR__).'/pages/admin/stadiums.php';


?>