<?php

require_once 'DBManager.php';


class Portfolio
{

    private $id = "" ;
    private  $title = "";
    private $text = "";

    /**
     * Portfolio constructor.
     * @param string $title
     * @param string $text
     */
    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }


    public static function getItemById($id)
    {

        try{
            $conn = DBManager::getConnection();
            $q = $conn->query("SELECT * FROM portfolio WHERE D_ID = $id");

            $q->setFetchMode(PDO::FETCH_ASSOC);;

            $row = $q->fetch();



            $item = new Portfolio($row['d_title'], $row['d_text']);
            $item->id = $row['d_id'];

            //DBManager::close();
            //var_dump($user);
            return $item;

        }
        catch (PDOException $e)
        {
            echo("What happend here i don't know".$e->getMessage());
        }
    }




    public static  function getItems()
    {

        try{
            $conn = DBManager::getConnection();
            $q = $conn->query("SELECT * FROM portfolio");

            $q->setFetchMode(PDO::FETCH_ASSOC);;

            $rows = $q->fetchAll();

            //DBManager::close();

            $array = array();

            foreach ($rows as $row)
            {
                $item = new Portfolio($row['d_title'], $row['d_text']);
                $item->id = $row['d_id'];

                array_push($array, $item);
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


            $var =  $conn->exec("DELETE  FROM portfolio WHERE d_id=$this->id");

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

                $new = $conn->exec("INSERT INTO portfolio ( d_title, d_text) VALUES ('$this->title', '$this->text')");
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
                $new = $conn->exec("UPDATE portfolio SET d_title = '$this->title', d_text = '$this->text'  WHERE d_id = $this->id");
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