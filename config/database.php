<?php
class Database {
    private $host = "localhost";
    private $dbName = "fifa";
    private $username = "root";
    private $password = "";
    
    public $con;

    public function __construct(){
        $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName.';charset=utf8', $this->username, $this->password);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return true;
    }

    public function __destruct()
    {
        $this->con = null;
    }
}
?>