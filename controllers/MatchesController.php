<?php 
    //INCLUDES
    require(__DIR__.'/../models/MatchesModel.php');


    //READ FUNCTION
    $readMatches = new MatchesModel();
    $matches = $readMatches->getMatches();

    //SAVE FUNCTION
    if (isset($_POST['save'])) {
        //ADD FLAG IMAGE
        foreach($_FILES as $key => $value){
            //Upload img
            //-----------------------------------------------
            
            $tmp_picture_name     = $value['tmp_name'];
            //unique id img
            $new_unique_name      = uniqid('',true);
            //
            $basename = $value['name'];
            $image = $new_unique_name . $basename;
            //check picture
            if(!empty($value['name'])){
                $distination_file = '../assets/img/'.$image;
            }
            
            //Func upload picture
            move_uploaded_file($tmp_picture_name,$distination_file);
            if($key=="flagImage"){
                $flag=$image;
            }else{
                $team=$image;
            }
        }
        //ADD TEAM IMAGE
        echo "first";
        $match = new MatchesModel();

        if ($match->addMatch()) {
            header('location:../pages/admin/teams.php');
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