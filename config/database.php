<?php
class Database {
    private $host = "localhost";
    private $db_name = "fifa";
    private $username = "root";
    private $pwd = "";
    protected function connect(){
        try{
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name.';'; // mysql data source name : mysql is the driver name
        $pdo = new PDO($dsn,$this->username,$this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
        }
        catch(PDOException $e){
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
?>