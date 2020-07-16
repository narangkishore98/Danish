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



        if($this->id=="")
        {
            try {

                $conn = DBManager::getConnection();

                $new = $conn->exec("INSERT INTO users (d_name, d_email, d_username, d_password, d_level) VALUES ('$this->name', '$this->email', '$this->username','$this->password', '$this->level' )");
                echo("New user created successfully");

                $q = $conn->query("SELECT last_insert_id()");
                $q->setFetchMode(PDO::FETCH_ASSOC);
                $this->id=$q->fetch()['last_insert_id()'];

               // DBManager::close();
            }
            catch (PDOException $e)
            {
                echo("Unable to create a user ".$e->getMessage());
            }
        }
        else {


            try {
                $conn = DBManager::getConnection();


                //echo("UPDATE users SET d_name = '$this->name', d_email = '$this->email', d_username = '$this->username', d_password = '$this->password', d_level = '$this->level') WHERE d_id = $this->id");
                $new = $conn->exec("UPDATE users SET d_name = '$this->name', d_email = '$this->email', d_username = '$this->username', d_password = '$this->password', d_level='$this->level' WHERE d_id = $this->id");
                echo("Update Successful");
                //DBManager::close();
            }
            catch (PDOException $e)
            {
                echo("Unable to update a user ".$e->getMessage());

            }

        }

    }

    public function delete()
    {
        try{
            $conn = DBManager::getConnection();


            $var =  $conn->exec("DELETE  FROM users WHERE d_id=$this->id");

            //DBManager::close();

            return $var;

        }
        catch (PDOException $e)
        {
            echo("What happend here i don't know".$e->getMessage());
        }
    }



    public static function getUserById($id)
    {

        try{
            $conn = DBManager::getConnection();
            $q = $conn->query("SELECT * FROM users WHERE D_ID = $id");

            $q->setFetchMode(PDO::FETCH_ASSOC);;

            $row = $q->fetch();

            $user = new User($row['d_name'],$row['d_email'],$row['d_username'], $row['d_password'],$row['d_level'] );
            $user->id = $row['d_id'];

            //DBManager::close();
            //var_dump($user);
            return $user;

        }
        catch (PDOException $e)
        {
            echo("What happend here i don't know".$e->getMessage());
        }
    }

    public static  function getUsers()
    {

        try{
            $conn = DBManager::getConnection();
            $q = $conn->query("SELECT * FROM users");

            $q->setFetchMode(PDO::FETCH_ASSOC);;

            $rows = $q->fetchAll();

    //DBManager::close();

            $array = array();

            foreach ($rows as $row)
            {
                $user = new User($row['d_name'], $row['d_email'], $row['d_username'], $row['d_password'],$row['d_level']);
                $user->id = $row['d_id'];

                array_push($array, $user);
            }

            return $array;

        }
        catch (PDOException $e)
        {
            echo("What happend here i don't know".$e->getMessage());
        }
    }









}




?>