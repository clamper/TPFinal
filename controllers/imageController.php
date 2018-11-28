<?php

namespace Controllers;


class ImageController
{


    public function index()
    {
        require_once(VIEWS_PATH."uploadImage.php");
    }

    public function save($id, $image)
    {
        var_dump($_POST);


    }
























}

?>