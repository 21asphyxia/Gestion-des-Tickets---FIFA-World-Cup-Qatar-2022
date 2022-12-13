<?php
require_once(__DIR__.'/../config/database.php');

// Tickets model
class Tickets {
    private $db;

    public function __construct(){
        $dbInstance = new Database;
        $this->db = $dbInstance->con;
    }

    public function getTickets(){
        $sql = $this->db->prepare(
            'SELECT * FROM tickets');
        $sql->execute();
        $results=$sql->fetchAll(PDO::FETCH_ASSOC);
        
        return $results;
    }

    public function getTicketById($id){
        $sql = $this->db->prepare(
            'SELECT * FROM tickets WHERE id = :id');
        $sql->bindParam(':id', $id);
        $sql->execute();
        $results = $sql->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    public function reserveTicket(){
        $sql = $this->db->prepare('INSERT INTO tickets (serial_number, match_id, spectator_id,time) VALUES (:serial, :match, :spectator, :time)');
        $sql->bindParam(':serial', uniqid());
        $sql->bindParam(':match', $_GET['id']);
        $sql->bindParam(':spectator', $_SESSION['id']);
        $sql->bindParam(':time', date("Y-m-d H:i:s"));
        if($sql->execute()){
            return true;
        } else {
            return false;
        }


    }
}
?>