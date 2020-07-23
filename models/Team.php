<?php

require_once ('DBManager.php');

class Team
{
    private $id = "";
    private $name = "";
    private $title = "";
    private $shortBio = "";
    private  $image = "";

    function __construct($name, $title, $shortBio, $image)
    {
        $this->name = $name;
        $this->title = $title;
        $this->shortBio = $shortBio;
        $this->image = $image;
    }
    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getShortBio(): string
    {
        return $this->shortBio;
    }

    public function setShortBio(string $shortBio)
    {
        $this->shortBio = $shortBio;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }





    public static function getMemberById($id)
    {

        try{
            $conn = DBManager::getConnection();
            $q = $conn->query("SELECT * FROM team WHERE D_ID = $id");

            $q->setFetchMode(PDO::FETCH_ASSOC);;

            $row = $q->fetch();



            $member = new Team($row['d_name'], $row['d_title'], $row['d_short_bio'], $row['d_image']);
            $member->id = $row['d_id'];

            //DBManager::close();
            //var_dump($user);
            return $member;

        }
        catch (PDOException $e)
        {
            echo("What happend here i don't know".$e->getMessage());
        }
    }




    public static  function getMembers()
    {

        try{
            $conn = DBManager::getConnection();
            $q = $conn->query("SELECT * FROM team");

            $q->setFetchMode(PDO::FETCH_ASSOC);;

            $rows = $q->fetchAll();

            //DBManager::close();

            $array = array();

            foreach ($rows as $row)
            {
                $member = new Team($row['d_name'], $row['d_title'], $row['d_short_bio'], $row['d_image']);
                $member->id = $row['d_id'];

                array_push($array, $member);
            }

            return $array;

        }
        catch (PDOException $e)
        {
            echo("What happend here i don't know".$e->getMessage());
        }
    }


    public function delete()
    {
        try{
            $conn = DBManager::getConnection();


            $var =  $conn->exec("DELETE  FROM team WHERE d_id=$this->id");

            //DBManager::close();

            return $var;

        }
        catch (PDOException $e)
        {
            echo("What happend here i don't know".$e->getMessage());
        }
    }


    public function save()
    {



        if($this->id=="")
        {
            try {

                $conn = DBManager::getConnection();

                $new = $conn->exec("INSERT INTO team (d_name, d_title, d_short_bio, d_image) VALUES ('$this->name', '$this->title', '$this->shortBio','$this->image')");
                echo("New team member created successfully");

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
                $new = $conn->exec("UPDATE team SET d_name = '$this->name', d_title = '$this->title', d_short_bio = '$this->shortBio', d_image = '$this->image' WHERE d_id = $this->id");
                echo("Update Successful");
                //DBManager::close();
            }
            catch (PDOException $e)
            {
                echo("Unable to update a user ".$e->getMessage());

            }

        }

    }


}

?>