<?php

use PDO;
use PDOException;

class Stadiums extends Connection{


    // **************** Proprieties ****************
    private $id;
    private $name;
    private $capacity;
    private $location;
    private $image;
    

    //*********** Setters *****************
    public function setId($id){
        $this->id = $id;
    }
    
    public function setName($name){
        $this->name = $name;
    }

    public function setCapacity($capacity){
        $this->capacity = $capacity;
    }

    public function setLocation($location){
        $this->location = $location;
    }

    public function setImage($image){
        $this->image = $image;
    }


    //************* Show method *************
    function read(){
        try{
            $sql = "SELECT * FROM stadiums";
            $statment = $this->con()->prepare($sql);

            $statment->execute();

            return $statment->fetchAll();

        }catch (PDOException $e){
            echo    $e->getMessage();
            return false;
        }
    }


    // *********** Add method *************
    function add(){
        try{
            $sql = "INSERT INTO stadiums VALUES (NULL, :name, :capacity, :location, :image)";
            $statment = $this->con()->prepare($sql);

            $statment->bindParam(':name', $this->name, PDO::PARAM_STR);
            $statment->bindParam(':capacity', $this->capacity, PDO::PARAM_STR);
            $statment->bindParam(':location', $this->location, PDO::PARAM_STR);
            $statment->bindParam(':image', $this->image, PDO::PARAM_STR);

            $statment->execute();

            // ************ Close statement **************
            unset($statment);

            return true;

        }catch (PDOException $e) {
            echo    $e->getMessage();
            return false;
        }
    }


    //*************** Delete method *************
    function delete(){
        try{
            $sql = "DELETE FROM stadiums WHERE id = :id";
            $statment = $this->con()->prepare($sql);

            $statment->bindParam(':id', $this->id, PDO::PARAM_INT);

            $statment->execute();

            // Close statement
            unset($statment);

            return true;
            
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}


?>