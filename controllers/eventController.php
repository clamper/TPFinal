<?php

namespace Controllers;

use DAO\categoryDAO as categoryDAO;
use DAO\artistDAO as artistDAO;
use DAO\seatDAO as seatDAO;

use DAO\ShowDAO as ShowDAO;


class EventController
{


    public function new()
    {
        $CategoriesDAO = new categoryDAO();
        $ArtistDAO = new artistDAO();
        $SeatDAO = new seatDAO();

        $categories = $CategoriesDAO->getAllCategories();
        $artists = $ArtistDAO->GetAllArtists();
        $seats = $SeatDAO->getAllSeats();    

        require_once(VIEWS_PATH."add-event.php");

    }

    public function save()
    {
        var_dump($_POST);


        $showName = $_POST['name'];
        $description = $_POST['description'];

        $show = new ShowDAO();
        $lastIdShow = $show->addShow($showName, 0, $description);

        $categories = $_POST['categories'];

        foreach ($categories as $categoryId) {
            $show->addCategoryToShow($lastIdShow, $categoryId);
        }


        
        
        
        






    }























}




?>