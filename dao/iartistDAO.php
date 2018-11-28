<?php

namespace DAO;

use Model\Artist as Artist;

interface IArtistDAO
{
    function GetAllArtists();
    function GetArtistbyID($id);
    function addArtist(Artist $artist);
    function Delete($artistID);
    function GetAllArtistByPresentation($idPresentation);
    function UpdateName($artistID, $newName);

}


?>