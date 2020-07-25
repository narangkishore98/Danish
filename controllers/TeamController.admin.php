<?php



function fileUpload()
{
    $imagesDirectory = "/Danish/static/img/";
    $imageFile = $_SERVER['DOCUMENT_ROOT'].$imagesDirectory . basename($_FILES['d_image']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($imageFile, PATHINFO_EXTENSION));

    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['d_image']['tmp_name']);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            // header("Location:../admin/about.admin.php?error=File is not an image. ");
            echo("File is not an image");
            $uploadOk = 0;
        }
    }

    if (file_exists($imageFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;

    }

    if ($_FILES["d_image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        //header("Location:../admin/about.admin.php?error=Sorry, Your file is too large.");



        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        //header("Location:../admin/about.admin.php?error=Invalid File format. ");
        echo("Invalid Format");

        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        //header("Location:../admin/about.admin.php?error=Some error occoured.");

        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["d_image"]["tmp_name"], $imageFile)) {
            echo "The file " . basename($_FILES["d_image"]["name"]) . " has been uploaded.";


        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }






}

require_once ('../models/Team.php');

if(isset($_POST['d_name']))
{


    echo("running");

    fileUpload();
    $name  = $_POST['d_name'];
    $title  = $_POST['d_title'];
    $shortBio  = $_POST['d_short_bio'];
    $image  = $_FILES['d_image']['name'];
    $member  = new Team($name, $title, $shortBio, $image);

    $member->save();

    header("Location:../admin/team.admin.php");




}




if(isset($_GET['deleteUser']))
{
    $id = $_GET['d_id'];


    $member = Team::getMemberById($id);

    $member->delete();

    header('Location:../admin/team.admin.php?userDeleted=true');
}

echo("Running");
var_dump($_POST);

if(isset($_POST['updateUser']))
{

    $imageName = "";

    if(isset($_FILES['d_image']))
    {
        if($_FILES['d_image']['name']!="")
        {
            fileUpload();
            $imageName = $_FILES['d_image']['name'];
            $id = $_POST['d_id_u'];
            $name = $_POST['d_name_u'];
            $title = $_POST['d_title_u'];
            $shortBio = $_POST['d_short_bio_u'];
            $member = Team::getMemberById($id);
            $member->setName($name);
            $member->setImage($imageName);
            $member->setTitle($title);
            $member->setShortBio($shortBio);
            $member->save();
        }
    }
    else
    {
        $id = $_POST['d_id_u'];
        $name = $_POST['d_name_u'];
        $title = $_POST['d_title_u'];
        $shortBio = $_POST['d_short_bio_u'];
        $member = Team::getMemberById($id);
        $member->setName($name);

        $member->setTitle($title);
        $member->setShortBio($shortBio);
        $member->save();
    }


    //update data





    header('Location:../admin/team.admin.php?userUpdate=true');
}

?>