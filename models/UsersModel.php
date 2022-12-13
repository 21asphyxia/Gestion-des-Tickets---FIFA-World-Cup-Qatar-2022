<?php
require_once __DIR__.'/../config/database.php';

class Users extends Database
{

    public function update($table,$para=array(),$id){
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'"; 
        }

        $sql="UPDATE  $table SET " . implode(',', $args);

        $sql .=" WHERE id=$id";
        $result = $this->con->query($sql);
    }


    public $sql;

    public function select($table,$rows="*",$where = null){
        if ($where != null) {
            $sql="SELECT $rows FROM $table WHERE $where";
        }else{
            $sql="SELECT $rows FROM $table";
        }

        $this->sql = $result = $this->con->query($sql);
    }

    
}
