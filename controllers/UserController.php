<?php


class UserController
{

}

require ('../models/User.php');
session_start();
if (isset($_GET['deleteUser']))
{

    $id = $_GET['d_id'];
    echo("Going to delete user. ".$id);
    $user = User::getUserById($id);
    var_dump($user);
    echo( $user->delete());
    header('Location:../admin/users.admin.php');



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
        header("Location:../admin/users.admin.php?userCreated=true");
    }

    if(isset($_POST['d_id_u']))
    {
        $name = $_POST['d_name_u'];
        $email = $_POST['d_email_u'];
        $password = $_POST['d_password_u'];
        $username = $_POST['d_username_u'];
        $level = $_POST['d_level_u'];
        $id = $_POST['d_id_u'];

        $user = User::getUserById($id);

        $user->setUsername($username);
        $user->setPassword($email);
        $user->setPassword($password);
        $user->setLevel($level);
        $user->setName($name);


        echo($level);
        $user->save();

        header('Location:../admin/users.admin.php?userUpdated=true');
    }


    if(isset($_POST['updateUser']))
    {


        $id = $_SESSION['loggedInId'];

        $name = $_POST['d_name_u'];
        $email = $_POST['d_email_u'];
        $password = $_POST['d_password_u'];
        $username = $_POST['d_username_u'];
        $level = $_POST['d_level_u'];


        $user = User::getUserById($id);

        $user->setUsername($username);
        $user->setPassword($email);
        $user->setPassword($password);
        $user->setLevel($level);
        $user->setName($name);


        echo($level);
        $user->save();

        header('Location:../admin/profile.admin.php?updated=true');
    }




}
