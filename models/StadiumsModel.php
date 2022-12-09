<?php


class Stadiums extends Database{
   
    public $id;
    protected function addStadiums($name,$location,$capacity,$pic=NULL){
        if ($pic==NULL){
            $stmt = $this->con->prepare("INSERT INTO `stadiums`(`name`, `location`, `capacity`) VALUES (?,?,?)");
            $stmt->execute([$name,$location,$capacity]);
        } else{
            $stmt = $this->con->prepare("INSERT INTO `stadiums`(`name`, `location`, `capacity`, `image`) VALUES (?,?,?,?)");
            $stmt->execute([$name,$location,$capacity,$pic]);
        }
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
    public function update($name , $location , $capacity , $id , $image=NULL){
        if ($image!=NULL){
            $stmt = $this->con->prepare("UPDATE `stadiums` SET `name`=?,`location`=?,`capacity`=?,`image`=? WHERE id = ?");
            $stmt->execute([$name , $location , $capacity , $image , $id]);
        }
        else{
            $stmt = $this->con->prepare("UPDATE `stadiums` SET `name`=?,`location`=?,`capacity`=? WHERE id = ?");
            $stmt->execute([$name , $location , $capacity , $id]);
        }
        $res = $stmt->fetch();
        return $res;
    }
  
    



}
?>