<?php

namespace Controllers;

use DAO\categoryDAO as categoryDAO;
use DAO\ArtistDAO as ArtistDAO;
use DAO\seatDAO as seatDAO;

use DAO\ShowDAO as ShowDAO;
use DAO\PresentationDAO as PresentationDAO;
use DAO\LocationDAO as LocationDAO;

use Models\location as Location;
use Models\presentation as Presentation;
use Models\show as Show;


class EventController
{
    public function showAllEvents()
    {
        $showDAO = new ShowDAO();
        $showsList = $showDAO->GetAllShows();

        require_once(VIEWS_PATH."home.php");
    }

    public function showAllEventsByCategory($category = null)
    {
        $showDAO = new ShowDAO();
        $showsList = $showDAO->GetShowsByCategory($category);

        require_once(VIEWS_PATH."home.php");
    }

    public function showAllEventsByDate($date = null)
    {
        $showDAO = new ShowDAO();
        $showsList = $showDAO->GetShowsByDate($date);

        require_once(VIEWS_PATH."home.php");
    }

    

    public function showDetail($showid)
    {
        $showDAO = new ShowDAO();
        $show = $showDAO->GetShowByID($showid);

        $presentationDAO = new PresentationDAO();
        $presentationList = $presentationDAO->GetAllPresentationsByShow($showid);

        //$presentationId = $presentation->getIdPres();

        $artistDAO = new ArtistDAO();
        $locationsDAO = new LocationDAO();
        $seatDAO = new seatDAO();

        $artistArray = array();
        $presentationArray = array();
        $locationsArray = array();
        $presentationID = 0; // para sacar el numero de presentacion apra obtener una lista de seats

        foreach ($presentationList as $presentation) {
            $presentationID  = $presentation->getIdPres();

            $artistList = $artistDAO->GetAllArtistByPresentation($presentationID);

            $artistArrayAux = array();

            foreach ($artistList as $artist) {
                array_push($artistArrayAux, $artist->getArtistName());
            }

            $date = date("d-m-Y",strtotime($presentation->getPresDate()));

            $presentationArray[ $date ] = $presentationID;
            $artistArray[ $date ] = implode(", ", $artistArrayAux);
        }

        
        $locationsList = $locationsDAO->GetAllLocationsByPresentation($presentationID);
        
        
        $precioMenor = 0;

        foreach ($locationsList as $location) {
            if ($precioMenor == 0){
                $precioMenor = $location->getLocationPrice();
            }
            else{
                if ($location->getLocationPrice() < $precioMenor)
                    $precioMenor = $location->getLocationPrice();
            }            
        }

        require_once(VIEWS_PATH."show-detail.php");        
    }

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
        $nuevoShow = New Show();
        $nuevoShow->setShowName($showName);
        $nuevoShow->setIdImage(0);
        $nuevoShow->setDescription($description);

        $lastIdShow = $shows->addShow($nuevoShow);

        // CATEGORIES

        $categories = $_POST['categories'];

        foreach ($categories as $categoryId) {
            $shows->addCategoryToShow($lastIdShow, $categoryId);
        }

        //PRESENTATION

        $presentationDAO = new PresentationDAO();
        $artists = new ArtistDAO();
        $locationDAO = new LocationDAO();

        foreach ($_POST['days'] as $key => $day) {
            if ($day != "")
                if ($_POST['artist'][$key] != "")
                    {
                        // creo presentacion x cada dia
                        $presentation = new Presentation();
                        $presentation->setIdShow($lastIdShow);
                        $presentation->setPresDate($day);
                        $lastIdPresentation = $presentationDAO->AddPresentation($presentation);

                        // lista de artistas x dia
                        $artistList = explode(",", $_POST['artist'][$key]);
            
                        foreach ($artistList as $artist) {
                            $presentationDAO->AddArtistToPresentation($lastIdPresentation, $artist);
                        }   

                        // agrego locations x cada dia
                        foreach ($_POST as $key => $value) {
                            if ( substr($key,0,9) == "seat_cost")
                            {
                                if ($value != "")
                                    {
                                        $seatId = str_replace("seat_cost","",$key);
                                        if ($_POST['seat_total'.$seatId] != ""){

                                            $location = new Location();
                                            $location->setIdPres($lastIdPresentation);
                                            $location->setIdSeat($seatId);
                                            $location->setLocationPrice($_POST['seat_cost'.$seatId]);
                                            $location->setLocationQty($_POST['seat_total'.$seatId]);                                            

                                            $locationDAO->addLocation($location);
                                        }
                                            
                                    }
                                
                            }    
                
                        }

                    }
        }
        
        $this->showAllEvents();
    }























}




?>