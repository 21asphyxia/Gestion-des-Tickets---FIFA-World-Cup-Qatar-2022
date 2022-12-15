<?php
require_once(__DIR__.'/../config/database.php');
require_once(__DIR__.'/../models/MatchesModel.php');

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
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getTicketByUserId($id){
        $match = new MatchesModel;
        $sql = $this->db->prepare(
            'SELECT * FROM tickets WHERE spectator_id = :id');
        $sql->bindParam(':id', $id);
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $key => $value){
            $results[$key]['match'] = $match->getMatchById($value['match_id']);
            // $results[$key]['match']['home_team'] = $team->select("teams","name","id=".$results[$key]['match']['team1_id']);
            // $results[$key]['match']['away_team'] = $team->select("teams","name","id=".$results[$key]['match']['team2_id']);
            // echo "<pre>";
            // print_r($results);
        }
        
        return $results;
    }

    public function reserveTicket(){
        $sql = $this->db->prepare('INSERT INTO tickets (serial_number, match_id, spectator_id,time) VALUES (:serial, :match, :spectator, :time)');
        $uniqid = uniqid();
        $sql->bindParam(':serial', $uniqid);
        $sql->bindParam(':match', $_GET['id']);
        $sql->bindParam(':spectator', $_SESSION['id']);
        $date = date("Y-m-d H:i:s");
        $sql->bindParam(':time', $date);
        if($sql->execute()){
            return true;
        } else {
            return false;
        }


    }
}
?>