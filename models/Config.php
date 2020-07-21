<?php

//
//if($_SERVER['REQUEST_METHOD']=='GET')
//{
//    header('HTTP/1.0 403 Forbidden');
//    die('You are not allowed to access this file.');
//}

require_once ('DBManager.php');



class Config
{
    private  $welcomeText = "";
    private $footerText = "";
    private $aboutText = "";
    private $aboutImage = "";
    //contact page variables

    private $emails = array();
    private $phoneNumbers = array();
    private $address = "";

    //social media variables.

    private $facebook = "";
    private $instagram = "";
    private $linkedin = "";
    private $github = "";
    public function getEmails()
    {
        return $this->emails;
    }


    public function setEmails(string $emails)
    {
        $this->emails = explode(",", $emails);
    }

    public function getPhoneNumbers()
    {
        return $this->phoneNumbers;
    }

    public function setPhoneNumbers(string $phoneNumbers)
    {


        $this->phoneNumbers = explode(",",$phoneNumbers );
        //var_dump($this->phoneNumbers);
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getFacebook()
    {
        return $this->facebook;
    }

    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    public function getInstagram()
    {
        return $this->instagram;
    }

    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

    public function getLinkedin()
    {
        return $this->linkedin;
    }

    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
    }


    public function getGithub()
    {
        return $this->github;
    }


    public function setGithub($github)
    {
        $this->github = $github;
    }




    public function getAboutText()
    {
        return $this->aboutText;
    }
    public function setAboutText($aboutText)
    {
        $this->aboutText = $aboutText;
    }
    public function setAboutImage($aboutImage)
    {
        $this->aboutImage = $aboutImage;
    }
    public function getAboutImage()
    {
        return $this->aboutImage;
    }

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



    public function saveAboutInformation()
    {
        try {
            $conn = DBManager::getConnection();
            $conn->exec("update config_cms set cms_value = '$this->aboutText' where cms_key = 'd_about_text'");
            $conn->exec("update config_cms set cms_value = '$this->aboutImage' where cms_key = 'd_about_image'");
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
           $config->setAboutText($rows[2]['cms_value']);
           $config->setAboutImage($rows[3]['cms_value']);
            $config->setAddress(($rows[4]['cms_value']));
            $config->setEmails(($rows[5]['cms_value']));
            $config->setPhoneNumbers(($rows[6]['cms_value']));
            $config->setFacebook(($rows[7]['cms_value']));
            $config->setInstagram(($rows[8]['cms_value']));
            $config->setLinkedin(($rows[9]['cms_value']));
            $config->setGithub(($rows[10]['cms_value']));


        }
        catch (PDOException $e)
        {
            echo $e;
        }

        return $config;
    }



    public function saveSocialMedia()
    {
        try {
            $conn = DBManager::getConnection();
            $conn->exec("update config_cms set cms_value = '$this->facebook' where cms_key = 'd_facebook_link'");
            $conn->exec("update config_cms set cms_value = '$this->instagram' where cms_key = 'd_instagram_link'");
            $conn->exec("update config_cms set cms_value = '$this->linkedin' where cms_key = 'd_linkedin_link'");
            $conn->exec("update config_cms set cms_value = '$this->github' where cms_key = 'd_github_link'");

            echo("Upload Successful");
        }
        catch (PDOException $e)
        {
            echo($e);
        }
    }

    public function saveContactInfo()
    {

        $emails_string = implode(",", $this->emails);
        $phoneNumbers_string = implode("," , $this->phoneNumbers);
        try {
            $conn = DBManager::getConnection();
            $conn->exec("update config_cms set cms_value = '$this->address' where cms_key = 'd_company_address'");
            $conn->exec("update config_cms set cms_value = '$emails_string' where cms_key = 'd_emails'");
            $conn->exec("update config_cms set cms_value = '$phoneNumbers_string' where cms_key = 'd_phonenumbers'");
        }
        catch (PDOException $e)
        {
            echo($e);
        }
    }






}

Config::object();

?>