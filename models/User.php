<?php

require ('DBManager.php');

class User
{
    private $name = "";
    private $email = "";
    private $username = "";
    private $password = "";
    private $level = "";
    private $id = "";


    public function __construct($name, $email, $username, $password, $level)
    {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->level = $level;
    }
    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }
    public function getId()
    {
        return $this->id;
    }

    public function save()
    {


        if($this->id==null)
        {
            try {

                $conn = DBManager::getConnection();

                $new = $conn->exec("INSERT INTO USERS (d_name, d_email, d_username, d_password, d_level) VALUES ('$this->name', '$this->email', '$this->username', '$this->level' )");
                echo("New user creted successfully");
                DBManager::close();
            }
            catch (PDOException $e)
            {
                echo("Unable to create a user ".$e->getMessage());
            }
        }
        else {

        }

    }






}

$user = new User("Kishore Narang", "narangkishore98@gmail.com", "narangkishore98", "Hello@123", "Senior");
$user->save();


?>