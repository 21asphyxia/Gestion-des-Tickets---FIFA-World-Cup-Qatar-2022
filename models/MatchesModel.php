<?php
// matches model
class MatchesModel {
    private $db;
    private $table = 'matches';

    public function __construct(){
        $this->db = new Database;
    }

    public function getMatches(){
        $this->db->query('SELECT * FROM '.$this->table.' ORDER BY id DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getMatchById($id){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function addMatch($data){
        $this->db->query('INSERT INTO '.$this->table.' (country, coach, groups, picture) VALUES (:country, :coach, :groups, :picture)');
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':coach', $data['coach']);
        $this->db->bind(':groups', $data['groups']);
        $this->db->bind(':picture', $data['picture']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function updateMatch($data){
        $this->db->query('UPDATE '.$this->table.' SET country = :country, coach = :coach, groups = :groups, picture = :picture WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':coach', $data['coach']);
        $this->db->bind(':groups', $data['groups']);
        $this->db->bind(':picture', $data['picture']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteMatch($id){
        $this->db->query('DELETE FROM '.$this->table.' WHERE id = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}