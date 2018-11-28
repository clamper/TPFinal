<?php

namespace DAO;

use Model\Location as Location;

interface ILocationDAO
{
    function GetAllLocationsByPresentation($idPresentation);
    function GetLocationById($id);
    function addLocation($location);
    function GetAvailability($idLocation);
    function Delete($LocationID);
}

?>