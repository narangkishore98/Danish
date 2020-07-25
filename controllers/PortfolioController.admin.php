<?php

require_once '../models/Portfolio.php';

if(isset($_GET['deleteItem']))
{
    $id = $_GET['d_id'];


    $member = Portfolio::getItemById($id);

    $member->delete();

    header('Location:../admin/portfolio.admin.php?itemDeleted=true');
}


if(isset($_POST['d_title']))
{
    $title = $_POST['d_title'];
    $text = $_POST['d_text'];

    $item = new Portfolio($title, $text);

    $item->save();

    header('Location: ../admin/portfolio.admin.php?itemAdded=true');
}


if(isset($_POST['d_id_u']))
{
    $id = $_POST['d_id_u'];
    $title = $_POST['d_title_u'];
    $text =$_POST['d_text_u'];


    $item = Portfolio::getItemById($id);

    $item->setTitle($title);
    $item->setText($text);

    $item->save();

    header("Location: ../admin/portfolio.admin.php?updateItem=true");
}

?>