<?php 
    include '../models/TeamsModal.php';


    //INSERT/SAVE FUNCTION
    if (isset($_POST['save'])) {
        $country = $_POST['country'];
        $groups = $_POST['groups'];
        //ADD FLAG IMAGE
           

        //ADD TEAM IMAGE
        echo "first";
        $a = new Teams();
        $a->insert('teams',['name'=>$country,'team_group'=>$groups,'flag'=>$image]);
        if ($a == true) {
            header('location:../pages/admin/teams.php');
        }
    }

    


    //DELETE FUNCTION
    // if (isset($_POST['delete'])){
    // $id = $_POST['id'];

    // $a = new Teams();
    // $a->delete('teams',"id='$id'");

    // }



    


    
?>