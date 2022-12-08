<?php 
    include '../models/TeamsModal.php';


    //INSERT/SAVE FUNCTION
    if (isset($_POST['save'])) {
        $country = $_POST['country'];
        $groups = $_POST['groups'];
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
        $a = new Teams();
        $a->insert('teams',['name'=>$country,'team_group'=>$groups,'flag'=>$flag,'team_image'=>$team]);
        if ($a == true) {
            header('location:../pages/admin/teams.php');
        }
    }

    


    //DELETE FUNCTION
    if (isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];
    $a = new Teams();
    


    $a->select("teams","*","id='$id'");
    $result = $a->sql->fetch(PDO::FETCH_ASSOC);

    if ($result['flag'] != '' ) {
        unlink("../assets/img/".$result['flag']);
    }
    if ($result['team_image'] != '' ) {
        unlink("../assets/img/".$result['team_image']);
    }




    $a->delete('teams',"id='$id'");
    if ($a == true) {
        header('location:../pages/admin/teams.php');
    }

    }



    


    
?>