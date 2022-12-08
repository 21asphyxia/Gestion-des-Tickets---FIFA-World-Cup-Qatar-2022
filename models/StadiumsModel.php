<?php


class Stadiums extends Database{
   
    public $id;
    protected function addStadiums($name,$location,$capacity,$pic){
       
        // $name      =$_POST['nameStadiums'];
        // $capacity  =$_POST['capacity'];
        // $location  =$_POST['location'];
        // $pic       =$_FILES['stadiumPicture']['name'];
        // $image     =$_FILES['stadiumPicture']['tmp_name'];

        $stmt = $this->con->prepare("INSERT INTO `stadiums`(`name`, `location`, `capacity`, `image`) VALUES (?,?,?,?)");
        $stmt->execute([$name,$location,$capacity,$pic]);
        // move_uploaded_file($image, '../assets/img/upload_img/'.$pic);

    }

    public function getStads(){
        $stmt = $this->con->prepare("SELECT * FROM stadiums ORDER BY id ASC");
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }
    public function getSpecificStad($id){
        $stmt = $this->con->prepare("SELECT * FROM stadiums WHERE id = $id");
        $stmt->execute();
        $res = $stmt->fetch();
        return $res;
    }
    public function deleteStadium($id){
       
        $stmt = $this->con->prepare("DELETE FROM `stadiums`WHERE id = ?");
        if ($stmt->execute([$id])){
            header('Location:../pages/admin/stadiums.php');
        }

    }
    public function edit($id){
        // $this->id = $id;
        $stmt = $this->con->prepare("SELECT * FROM stadiums WHERE id = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        return $id;
    }
    public function update($name , $location , $capacity , $image , $id){
        // $id = $this->id;
        // UPDATE `stadiums` SET `id`='[value-1]',`name`='[value-2]',`location`='[value-3]',`capacity`='[value-4]',`image`='[value-5]' WHERE 1
        $stmt = $this->con->prepare("UPDATE `stadiums` SET `name`=?,`location`=?,`capacity`=?,`image`=? WHERE id = ?");
        $stmt->execute([$name , $location , $capacity , $image , $id]);
        $res = $stmt->fetch();
        return $res;
    }
  
    



}
?>