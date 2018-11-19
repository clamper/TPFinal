<?php

namespace Controllers;

use DAO\categoryDAO as categoryDAO;
use DAO\ArtistDAO as ArtistDAO;
use DAO\seatDAO as seatDAO;

use DAO\ShowDAO as ShowDAO;
use DAO\PresentationDAO as PresentationDAO;
use DAO\LocationDAO as LocationDAO;


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
        //var_dump($_POST);


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
        $location = new LocationDAO();

        foreach ($_POST['days'] as $key => $day) {
            if ($day != "")
                if ($_POST['artist'][$key] != "")
                    {
                        // creo presentacion x cada dia
                        $lastIdPresentation = $presentations->AddPresentation($lastIdShow, $day);

                        // lista de artistas x dia
                        $artistList = explode(",", $_POST['artist'][$key]);
            
                        foreach ($artistList as $artist) {
                            $presentations->AddArtistToPresentation($lastIdPresentation, $artist);
                        }   

                        // agrego locations x cada dia
                        foreach ($_POST as $key => $value) {
                            if ( substr($key,0,9) == "seat_cost")
                            {
                                if ($value != "")
                                    {
                                        $seatId = str_replace("seat_cost","",$key);
                                        if ($_POST['seat_total'.$seatId] != "")
                                            $location->addLocation($lastIdPresentation, $seatId, $_POST['seat_cost'.$seatId], $_POST['seat_total'.$seatId], 0);
                                    }
                                
                            }    
                
                        }

                    }
        }
        
        // LOCATIONS
        

        
        







    }























}




?>