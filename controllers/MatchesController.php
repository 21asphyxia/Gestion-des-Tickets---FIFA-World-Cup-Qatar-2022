<?php 
    //INCLUDES
    require(__DIR__.'/../models/MatchesModel.php');
    require(__DIR__.'/../models/TeamsModal.php');
    require(__DIR__.'/../models/StadiumsModel.php');
    

    //READ FUNCTION
    $readMatches = new MatchesModel();
    $matches = $readMatches->getMatches();
    $teams = new Teams();
    $teams->select("teams","*");
    $readTeams = $teams->sql->fetchAll(PDO::FETCH_ASSOC);
    $stadiums = new Stadiums();
    $readStadiums=$stadiums->getStads();


    //SAVE FUNCTION
    if (isset($_POST['save'])) {
        $errors = array();
    //Check if all fields are filled
        if(empty($_POST['date']))        $errors['date'] = "Date is required";
        if(empty($_POST['team_1']))              $errors['team_1'] = "First team is required";
        if(empty($_POST['team_2']))           $errors['team_2'] = "Second team is required";
        if(empty($_POST['stadium']))              $errors['stadium'] = "Stadium is required";
        if(empty($_POST['description']))        $errors['description'] = "Description is required";
        
        //Check if there are errors
        if (count($errors) == 0) {
            //SQL insert query if there are no errors and image is uploaded
            if (isset($_FILES['image'])){
                if($readMatches->addMatch($readMatches->uploadImage())){
                    $_SESSION['message'] = "Match has been added successfully !";
                    $_SESSION['msg_type'] = "success";
                    header('location: pages/matches.php');
                }
                else{
                    $_SESSION['message'] = "Match has not been added !";
                    $_SESSION['msg_type'] = "danger";
                    header('location: pages/matches.php');
                }
            }
        }else
        {
            //If there are errors, redirect to products.php with errors
            //Empty fields alerts
            $_SESSION['dateErr'] = $errors['date'];
            $_SESSION['team_1Err'] = $errors['team_1'];
            $_SESSION['team_2Err'] = $errors['team_2'];
            $_SESSION['stadiumErr'] = $errors['stadium'];
            $_SESSION['descriptionErr'] = $errors['description'];
            //launch js script to show already filled fields in modal
            $_SESSION['error'] = "<script type = text/javascript>
            createProduct(); 
            document.getElementById('date').value ='".$_POST['date']."' ;
            document.getElementById('first-team').value = '".$_POST['team_1']."';
            document.getElementById('second-team').value = '".$_POST['team_2']."';
            document.getElementById('stadium').value = '".$_POST['stadium']."';
            document.getElementById('description').value = '".$_POST['description']."';
            </script>";
        }
}
        





        //ADD TEAM IMAGE
        $match = new MatchesModel();
        if ($match->addMatch()) {
            unset($_POST);
        }
        else{
            echo "Error in saving";
            die();
        }
    }

    //DELETE FUNCTION
    if (isset($_GET['deleteMatch'])){
        $match = new MatchesModel();
        $result = $match->getMatchById($_GET['deleteMatch'])->fetch(PDO::FETCH_ASSOC);

        if ($result['image'] != '' ) {
            unlink("../assets/img/".$result['image']);
        }

        if ($match->deleteMatch($_GET['deleteMatch'])) {
            header('location:../pages/admin/teams.php');
        }
        else{
            echo "Error in deleting";
            die();
        }
    }

    //UPDATE FUNCTION
    if(isset($_GET['updateId'])){
        $result = $readMatches->getMatchById($_GET['updateId']);
        $row = $result->fetch(PDO::FETCH_ASSOC);
    }



    if (isset($_POST['update'])) {
        $match = new MatchesModel();
        if ($match->updateMatch($_POST['match-id'])) {
            header('location:../pages/admin/teams.php');
        }
        else{
            echo "Error in updating";
            die();
        }
    }
?>