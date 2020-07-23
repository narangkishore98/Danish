<?php


    /*
     *
     * AUTHENTICATOR is a type of controller which can authenticate or unauthenticate an user from  website.. This can control if an user has logged in or not.


     * */

    require_once ('../models/User.php');

    session_start();


    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $id = User::authenticate($email, $password);
        if($id != -1)
        {
            $_SESSION['loggedInId'] = $id;
            //header('Location: ../admin/dashboard.php ');
            echo("Does not exist");

        }
        else
        {
            //header('Location: ../admin/index.php?invalid=true ');

        }
    }

?>






