<?php
require_once(__DIR__.'/../config/database.php');

// matches model
class MatchesModel {
    private $db;

    public function __construct(){
        $dbInstance = new Database;
        $this->db = $dbInstance->con;
    }

    public function getMatches(){
        $sql = $this->db->prepare(
            'SELECT matches.id,matches.date,matches.image,team_1.name as team1_name,team_2.name as team2_name,stadiums.name as stadium_name,stadiums.capacity FROM matches
            LEFT JOIN stadiums ON matches.stadium_id = stadiums.id
            JOIN teams as team_1 ON matches.team1_id = team_1.id
            JOIN teams as team_2 ON  matches.team2_id = team_2.id');
        $sql->execute();
        $results=$sql->fetchAll(PDO::FETCH_ASSOC);
        
        return $results;
    }

    public function getMatchById($id){
        $sql = $this->db->prepare(
            'SELECT matches.id,matches.date,matches.image,team_1.name as team1_name,team_2.name as team2_name,stadiums.name as stadium_name,stadiums.capacity FROM matches
            LEFT JOIN stadiums ON matches.stadium_id = stadiums.id
            JOIN teams as team_1 ON matches.team1_id = team_1.id
            JOIN teams as team_2 ON  matches.team2_id = team_2.id
            WHERE matches.id = :id');
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql;
    }

    public function addMatch(){
        $sql = $this->db->prepare('INSERT INTO matches (date,image, team1_id, team2_id, stadium_id) VALUES (:date , :image, (SELECT id FROM teams WHERE name =  :team_1), (SELECT id FROM teams WHERE name = :team_2) , (SELECT id FROM stadiums WHERE name = :stadium))');
        $this->db->bindParam(':date', $_POST['date']);
        $this->db->bindParam(':image', $_POST['image']);
        $this->db->bindParam(':team_1', $_POST['team_1']);
        $this->db->bindParam(':team_2', $_POST['team_2']);
        $this->db->bindParam(':stadium', $_POST['stadium']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function updateMatch($id){
        $sql = $this->db->prepare('UPDATE matches SET date = :date , image = :image, team1_id = (SELECT id FROM teams WHERE name =  :team_1) , team2_id = (SELECT id FROM teams WHERE name = :team_2) , stadium_id = (SELECT id FROM stadiums WHERE name = :stadium) WHERE id = :id');
        $this->db->bindParam(':id', $id);
        $this->db->bindParam(':date', $_POST['date']);
        $this->db->bindParam(':image', $_POST['image']);
        $this->db->bindParam(':team_1', $_POST['team_1']);
        $this->db->bindParam(':team_2', $_POST['team_2']);
        $this->db->bindParam(':stadium', $_POST['stadium']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteMatch($id){
        $sql = $this->db->prepare('DELETE FROM matches WHERE id = :id');
        $this->db->bindParam(':id', $_GET['id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}