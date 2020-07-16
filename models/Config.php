<?php

require ('DBManager.php');

class Config
{

    private var $welcomeText = "";

    /**
     * @return string
     */
    public function getWelcomeText()
    {
        return $this->welcomeText;
    }

    /**
     * @param string $welcomeText
     */
    public function setWelcomeText($welcomeText)
    {
        $this->welcomeText = $welcomeText;
    }


    public function  saveWelcomeText()
    {
        $conn = DBManager::getConnection();
        $conn->exec("update config_cms set cms_value = '$this->welcomeText' where cms_key = 'd_welcome_text'");
    }




}

?>