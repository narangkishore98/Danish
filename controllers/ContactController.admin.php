<?php



require_once ('../models/Config.php');

var_dump($_POST);

if(isset($_POST['d_emails_cs']))
{

    $emails_cs = $_POST['d_emails_cs'];
    $phoneNumbers_cs = $_POST['d_phonenumbers_cs'];
    $address = $_POST['d_address'];


    $config = Config::object();

    $config->setPhoneNumbers($phoneNumbers_cs);
    $config->setEmails($emails_cs);
    $config->setAddress($address);

    $config->saveContactInfo();

    header("Location: ../admin/contact.admin.php?contactChanged=true");
}

if(isset($_POST['d_facebook']))
{
    $facebook = $_POST["d_facebook"];
    $instagram = $_POST["d_instagram"];
    $linkedin = $_POST["d_linkedin"];
    $github = $_POST["d_github"];
    $config = Config::object();
    $config->setFacebook($facebook);
    $config->setInstagram($instagram);
    $config->setLinkedin($linkedin);
    $config->setGithub($github);

    $config->saveSocialMedia();

    header("Location: ../admin/contact.admin.php?socialChanged=true");

}


?>