<?php

//
//if($_SERVER['REQUEST_METHOD']=='GET')
//{
//    header('HTTP/1.0 403 Forbidden');
//    die('You are not allowed to access this file.');
//}

//require ('DBManager.php');

class Config
{
    private  $welcomeText = "";
    private $footerText = "";

    public function getFooterText()
    {
        return $this->footerText;
    }
    public function setFooterText($footerText)
    {
        $this->footerText = $footerText;
    }

    private function __construct()
    {

    }


    public function getWelcomeText()
    {
        return $this->welcomeText;
    }


    public function setWelcomeText($welcomeText)
    {
        $this->welcomeText = $welcomeText;
    }


    public function  saveWelcomeText()
    {
        try {
            $conn = DBManager::getConnection();
            $conn->exec("update config_cms set cms_value = '$this->welcomeText' where cms_key = 'd_welcome_text'");
        }
        catch (PDOException $e)
        {
            echo($e);
        }
    }


    public function  saveFooterText()
    {
        try {
            $conn = DBManager::getConnection();
            $conn->exec("update config_cms set cms_value = '$this->footerText' where cms_key = 'd_footer_text'");
        }
        catch (PDOException $e)
        {
            echo($e);
        }
    }


    public static function object()
    {
        $config = new Config();

        try {
            $conn = DBManager::getConnection();
            $sql = "select * from config_cms";
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);

            $rows = $q->fetchAll();

           $config->setWelcomeText($rows[0]['cms_value']);
           $config->setFooterText($rows[1]['cms_value']);

        }
        catch (PDOException $e)
        {
            echo $e;
        }

        return $config;
    }






}


?>