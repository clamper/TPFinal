<?php

namespace DAO;

use Model\Show as Show;

interface IShowDAO
{
    function GetAllShows();
    function GetShowsByCategory($idcategory);
    function GetShowsByArtist($idArtist);
    function GetShowsByDate($date);
    function GetShowsBySeat($idSeat);
    function GetDatesByShows();
    function GetShowByID($idShow);
    function addShow(Show $Show);
    function Delete($ShowID);
    function UpdateShow($showId, $showName, $idImage, $description);
    function addCategoryToShow($idshow, $idCategory);
    function setImageToShow($showId, $imageId);
}

?>