<?php


class UserController
{

}

require ('../models/User.php');

if (isset($_GET['deleteUser']))
{

    $id = $_GET['d_id'];
    echo("Going to delete user. ".$id);
    $user = User::getUserById($id);
    var_dump($user);
    echo( $user->delete());
    header('Location:../admin/users.php');



}


if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST['d_name']))
    {
        $name = $_POST['d_name'];
        $email = $_POST['d_email'];
        $password = $_POST['d_password'];
        $username = $_POST['d_username'];
        $level = $_POST['d_level'];
        $user = new User($name, $email, $username, $password, $level);
       $user->save();
        header("Location:../admin/users.php?userCreated=true");
    }
}
