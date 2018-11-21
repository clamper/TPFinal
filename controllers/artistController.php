<?php

namespace Controllers;

use Models\Artist as Artist;
use dao\ArtistDAO as artistdao;

class ArtistController
{
    


    public function Index()
    {
        $dao = new ArtistDAO();

        $array_artist = $dao->GetAllArtists();

        require_once(VIEWS_PATH."abmartist.php");

    }
    
    public function new($newArtist)
    {
        $dao = new ArtistDAO();

        $error_msg = $dao->addArtist($newArtist);

        $this->Index();

    }

    public function delete($idArtist)
    {
        $dao = new ArtistDAO();

        $error_msg = $dao->Delete($idArtist);

        $this->Index();

    }

    public function edit($idArtist, $newName)
    {
        $dao = new ArtistDAO();

        $error_msg = $dao->UpdateName($idArtist, $newName);

        $this->Index();

    }

    public function GetArtistbyID($idArtist)
    {
        $artist = null;

        $dao = new ArtistDAO();

        $artist = $dao->GetArtistbyID($idArtist);

        return $artist;
    }


}








?>