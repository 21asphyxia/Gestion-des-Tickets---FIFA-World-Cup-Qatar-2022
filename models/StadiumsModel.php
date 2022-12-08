<?php


class Stadiums extends Database{
   

    protected function addStadiums($name,$location,$capacity,$image){
       
        // $name      =$_POST['nameStadiums'];
        // $capacity  =$_POST['capacity'];
        // $location  =$_POST['location'];
        // $pic       =$_FILES['stadiumPicture']['name'];
        // $image     =$_FILES['stadiumPicture']['tmp_name'];


        $stmt = $this->con->prepare("INSERT INTO `stadiums`(`name`, `location`, `capacity`, `image`) VALUES (?,?,?,?)");
        $stmt->execute([$name,$location,$capacity,$image]);
        // move_uploaded_file($image, '../assets/img/'.$image);

    }

    public function getStads(){
        $stmt = $this->con->prepare("SELECT * FROM stadiums");
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }
    


}


?>