<?php

namespace Controllers;

use DAO\categoryDAO as categoryDAO;
use DAO\ArtistDAO as ArtistDAO;
use DAO\seatDAO as seatDAO;

use DAO\ShowDAO as ShowDAO;
use DAO\PresentationDAO as PresentationDAO;


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

        // SHOW

        $shows = new ShowDAO();
        $lastIdShow = $shows->addShow($showName, 0, $description);

        // CATEGORIES

        $categories = $_POST['categories'];

        foreach ($categories as $categoryId) {
            $shows->addCategoryToShow($lastIdShow, $categoryId);
        }

        //PRESENTATION

        $presentations = new PresentationDAO();
        $artists = new ArtistDAO();
        
        if ($_POST['days_radio'] == 'only')
        {
            $day = $_POST['days'];

            $lastIdPresentation = $presentations->AddPresentation($lastIdShow, $day);

            // artist

            $artistList == explode(",", $_POST['artist'][0]);

        }
        
        
        







    }























}




?>