<?php
 require_once __DIR__.'/../config/database.php';

class SignUp extends Database {

   public function Insertdata($query,$param=[]){
    try{
        $sqlstatment = $this->con->prepare($query);
        $sqlstatment->execute($param);
    }catch(Exception $e){
            $e->getMessage();
    }

   }
   public function NumberRow($query,$param){
       try{
        $sqlstatment = $this->con->prepare($query);
        $sqlstatment->execute($param);
            return $sqlstatment->rowcount();
       }catch(Exception $e){
            $e->getMessage();
       }
   }
   public function getRows($query,$param=[]){
    try{
        $sqlstatment = $this->con->prepare($query);
        $sqlstatment->execute($param);
        return $sqlstatment->fetchAll(PDO::FETCH_ASSOC);
       }catch(Exception $e){
            $e->getMessage();
       }
   }

   public function updateProfile($query,$param=[]){
    try{
        $sqlstatment = $this->con->prepare($query);
        $sqlstatment->execute($param);
       }catch(Exception $e){
            $e->getMessage();
       }
   }

}