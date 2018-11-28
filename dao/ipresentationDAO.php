<?php

namespace DAO;

use Model\Presentation as Presentation;

interface IPresentationDAO
{
    function GetPresentationById($idPresentation);
    function GetAllPresentations();
    function GetAllPresentationsByDate($Date);
    function GetAllPresentationsByArtist($idArtist);
    function GetAllPresentationsByShow($idShow);
    function AddPresentation(Presentation $presentation);
    function AddArtistToPresentation($idPresentation, $idArtist);
}

?>