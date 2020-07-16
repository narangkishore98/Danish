<?php



// The code has been refered from W3Schools File Upload.
//https://www.w3schools.com/php/php_file_upload.asp

require("../models/Slider.php");

function fileUpload()
{
    $imagesDirectory = "/Danish/static/img/";
    $imageFile = $_SERVER['DOCUMENT_ROOT'].$imagesDirectory . basename($_FILES['d_image']['name']);
    $uploadFlag = 1;
    $imageFileType = strtolower(pathinfo($imageFile, PATHINFO_EXTENSION));

    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['d_image']['tmp_name']);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            header("Location:../admin/home.admin.php?error=File is not an image. ");

            $uploadOk = 0;
        }
    }

    if (file_exists($imageFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["d_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        header("Location:../admin/home.admin.php?error=Sorry, Your file is too large.");
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("Location:../admin/home.admin.php?error=Invalid File format. ");

        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        header("Location:../admin/home.admin.php?error=Some error occoured.");

        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["d_image"]["tmp_name"], $imageFile)) {
            echo "The file " . basename($_FILES["d_image"]["name"]) . " has been uploaded.";


        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }






}




if(isset($_FILES["d_image"]))
{

    fileUpload();
    $title=$_POST['d_title'];
    $subtitle=$_POST['d_subtitle'];

    $image = $_FILES['d_image']['name'];

    $slider = new Slider($title, $subtitle, $image);
    $slider->save();
    echo("Slider Saved");
    header("Location:../admin/home.admin.php?sliderAdded=true");

}


if (isset($_GET['deleteSlider']))
{

    $id = $_GET['d_id'];
    echo("Going to delete slider. ".$id);
    $slider = Slider::getSliderById($id);
    var_dump($slider);
    echo( $slider->delete());
    header('Location:../admin/home.admin.php');



}




?>