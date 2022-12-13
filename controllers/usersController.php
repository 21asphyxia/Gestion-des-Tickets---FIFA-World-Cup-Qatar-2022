<?php 
    include '../models/UsersModel.php';

    //UPDATE FUNCTION
    if (isset($_POST['update'])) {
        $role = $_POST['role'];
        $id=$_POST['users-id'];

        }
        //ADD TEAM IMAGE
        $a = new Users();
        $a->update('users',['role'=>$role],$id);
            
        if ($a == true) {
            header('location:../pages/admin/users.php');
        }
    
    
    


    
?>