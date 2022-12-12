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

    public function addMatch($image=false){
        if($image == false){
            $image = NULL;
        }
        $sql = $this->db->prepare('INSERT INTO matches (date,image, team1_id, team2_id, stadium_id,description) VALUES (:date , :image, (SELECT id FROM teams WHERE name =  :team_1), (SELECT id FROM teams WHERE name = :team_2) , (SELECT id FROM stadiums WHERE name = :stadium), :description');
        $sql->bindParam(':date', $_POST['date']);
        $sql->bindParam(':image', $image);
        $sql->bindParam(':team_1', $_POST['team_1']);
        $sql->bindParam(':team_2', $_POST['team_2']);
        $sql->bindParam(':stadium', $_POST['stadium']);
        $sql->bindParam(':description', $_POST['description']);
        if($sql->execute()){
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

    private function uploadImage(){
        $uploadFolder = __DIR__."/../assets/upload/";
        $fileName = basename($_FILES["image"]["name"]);
        $uploadFile = $uploadFolder. $fileName;
        $imageFileType = strtolower(pathinfo($uploadFile,PATHINFO_EXTENSION));
        // Check if it's an image or fake
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check == false)
        {
            $_SESSION['imageError'] = "File is not an image.";
            return false;
        }
        // Check file size
        if ($_FILES["image"]["size"] > 20000000) {
            $_SESSION['imageError'] = "Sorry, your file is too large.";
            return false;
        }
        // Allow JPG, JPEG, PNG, GIF
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $_SESSION['imageError'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return false;
        }
    
        // Upload the file if everything is ok
        $uploadedFile = uniqid().$fileName;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFolder.$uploadedFile)){ 
            return $uploadedFile;
        } else {
            $_SESSION['imageError'] = "Sorry, there was an error uploading your file.";
        }
    } 
}