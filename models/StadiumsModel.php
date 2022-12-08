<?php


class Stadiums extends Database{
   

    protected function addStadiums($name,$location,$capacity,$pic){
       
        // $name      =$_POST['nameStadiums'];
        // $capacity  =$_POST['capacity'];
        // $location  =$_POST['location'];
        // $pic       =$_FILES['stadiumPicture']['name'];
        // $image     =$_FILES['stadiumPicture']['tmp_name'];


        $stmt = $this->con->prepare("INSERT INTO `stadiums`(`name`, `location`, `capacity`, `image`) VALUES (?,?,?,?)");
        $stmt->execute([$name,$location,$capacity,$pic]);
        move_uploaded_file($image, '../assets/img/upload_img/'.$pic);

    }

    public function getStads(){
        $stmt = $this->con->prepare("SELECT * FROM stadiums ORDER BY id ASC");
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }
    public function deleteStadium($id){
       
        $stmt = $this->con->prepare("DELETE FROM `stadiums`WHERE id = ?");
        if ($stmt->execute([$id])){
            header('Location:../pages/admin/stadiums.php');
        }

    }
  
    



}
?>