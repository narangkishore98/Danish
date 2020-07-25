<?php

require_once ("DBManager.php");


class Slider
{
    private $title = "";
    private $subtitle = "";
    private $image  = "";
    private $id = "";

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    private function __construct($title, $subtitle, $image)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }




    public function save()
    {
        if($this->id=="")
        {
            try {

                $conn = DBManager::getConnection();

                $new = $conn->exec("INSERT INTO sliders (d_title, d_subtitle, d_image) VALUES ('$this->title', '$this->subtitle', '$this->image')");
                echo("New slider created successfully");

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
                $new = $conn->exec("UPDATE sliders SET d_title = '$this->title', d_subtitle = '$this->subtitle', d_image = '$this->image' WHERE d_id = $this->id");
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


            $var =  $conn->exec("DELETE  FROM sliders WHERE d_id=$this->id");

            //DBManager::close();

            return $var;

        }
        catch (PDOException $e)
        {
            echo("What happend here i don't know".$e->getMessage());
        }
    }


    public static function getSliderById($id)
    {

        try{
            $conn = DBManager::getConnection();
            $q = $conn->query("SELECT * FROM sliders WHERE D_ID = $id");

            $q->setFetchMode(PDO::FETCH_ASSOC);;

            $row = $q->fetch();

            //$user = new Slider($row['d_name'],$row['d_email'],$row['d_username'], $row['d_password'],$row['d_level'] );
            $slider = new Slider($row['d_title'], $row['d_subtitle'], $row['image']);
            $slider->id = $row['d_id'];

            //DBManager::close();
            //var_dump($user);
            return $slider;

        }
        catch (PDOException $e)
        {
            echo("What happend here i don't know".$e->getMessage());
        }
    }



    public static  function getSliders()
    {

        try{
            $conn = DBManager::getConnection();
            $q = $conn->query("SELECT * FROM sliders");

            $q->setFetchMode(PDO::FETCH_ASSOC);;

            $rows = $q->fetchAll();

            //DBManager::close();

            $array = array();

            foreach ($rows as $row)
            {
                $slider = new Slider($row['d_title'], $row['d_subtitle'], $row['d_image']);
                $slider->id = $row['d_id'];

                array_push($array, $slider);
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