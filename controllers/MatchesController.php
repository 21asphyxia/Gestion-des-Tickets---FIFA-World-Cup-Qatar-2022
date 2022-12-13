<?php 
    //INCLUDES
    require(__DIR__.'/../models/MatchesModel.php');
    require(__DIR__.'/../models/TeamsModal.php');
    require(__DIR__.'/../models/StadiumsModel.php');
    

    $readMatches = new MatchesModel();
    $teams = new Teams();
    $stadiums = new Stadiums();
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
            if (!empty($_FILES['image']['name'])){
                echo "1";
                if($readMatches->addMatch(true)){
                    $_SESSION['message'] = "Match has been added successfully !";
                    $_SESSION['msg_type'] = "success";
                }
                else{
                    $_SESSION['message'] = "Match has not been added !";
                    $_SESSION['msg_type'] = "danger";
                }
            }
            else{
                //SQL insert query if there are no errors and image is not uploaded
                if($readMatches->addMatch()){
                    $_SESSION['message'] = "Match has been added successfully !";
                    $_SESSION['msg_type'] = "success";
                }
                else{
                    $_SESSION['message'] = "Match has not been added !";
                    $_SESSION['msg_type'] = "danger";
                }
            }
            header('location: played-matches.php');
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
            createMatch(); 
            document.getElementById('date').value ='".$_POST['date']."' ;
            document.getElementById('first-team').value = '".$_POST['team_1']."';
            document.getElementById('second-team').value = '".$_POST['team_2']."';
            document.getElementById('stadium').value = '".$_POST['stadium']."';
            document.getElementById('description').value = '".$_POST['description']."';
            </script>";
        }
    }
    
    
    //DELETE FUNCTION
    if (isset($_GET['deleteMatch'])){
        // $match = new MatchesModel();
        $result = $readMatches->getMatchById($_GET['deleteMatch']);
        if($result){
            if ($result['image'] != '' ) {
                unlink(__DIR__."/../assets/upload/".$result['image']);
            }
            if ($readMatches->deleteMatch($_GET['deleteMatch'])) {
                $_SESSION['message'] = "Match has been deleted successfully !";
                $_SESSION['msg_type'] = "danger";
                header("location: played-matches.php");
            }
            else{
                $_SESSION['message'] = "Match has not been deleted !";
                $_SESSION['msg_type'] = "danger";
                header("location: played-matches.php");
            }
        }
    }
    
    //UPDATE FUNCTION
    if(isset($_GET['updateId'])){
        $row = $readMatches->getMatchById($_GET['updateId']);
        
    }
    
    if (isset($_POST['update'])) {
        $errors = array();
        //Check if all fields are filled
        if(empty($_POST['date']))        $errors['date'] = "Date is required";
        if(empty($_POST['team_1']))              $errors['team_1'] = "First team is required";
        if(empty($_POST['team_2']))           $errors['team_2'] = "Second team is required";
        if(empty($_POST['stadium']))              $errors['stadium'] = "Stadium is required";
        if(empty($_POST['description']))        $errors['description'] = "Description is required";
        
        

        //Check if there are errors
        if (count($errors) == 0) {
            //SQL update query if there are no errors and image is uploaded
            if (!empty($_FILES['image']['name'])){

                // Unlink old image
                $imageResult = $readMatches->getMatchById($_POST['match-id']);
                if($imageResult){
                    if ($imageResult['image'] != '' ) {
                        unlink(__DIR__."/../assets/upload/".$imageResult['image']);
                    }
                }

                if ($readMatches->updateMatch($_POST['match-id'],true)) {
                    $_SESSION['message'] = "Match has been updated successfully !";
                    $_SESSION['msg_type'] = "success";
                    header("location: played-matches.php");
                }
                else{
                    $_SESSION['message'] = "Match has not been updated !";
                    $_SESSION['msg_type'] = "danger";
                    header("location: played-matches.php");
                }
            }
            else{
                //SQL update query if there are no errors and image is not uploaded
                if($readMatches->updateMatch($_POST['match-id'],$imageResult['image'])){
                    $_SESSION['message'] = "Match has been updated successfully !";
                    $_SESSION['msg_type'] = "success";
                }
                else{
                    $_SESSION['message'] = "Match has not been updated !";
                    $_SESSION['msg_type'] = "danger";
                }
                header('location: played-matches.php');
            }
        }else
        {
            header("location: played-matches.php?updateId=".$_POST['match-id']);
        }

        
    }
    //READ FUNCTION
    
    $matches = $readMatches->getMatches();
    
    $teams->select("teams","*");
    $readTeams = $teams->sql->fetchAll(PDO::FETCH_ASSOC);
    $readStadiums=$stadiums->getStads();
    ?>