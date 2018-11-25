<?php

namespace Controllers;

use Models\Artist as Artist;
use dao\ArtistDAO as artistdao;

class ArtistController
{
    


    public function Index($msg = "")
    {
        $dao = new ArtistDAO();

        $array_artist = $dao->GetAllArtists();

        require_once(VIEWS_PATH."abmartist.php");

    }
    
    public function new($newArtist)
    {
        $dao = new ArtistDAO();

        $artist = new Artist();
        $artist->setArtistName($newArtist);

        $msg = $dao->addArtist($artist);

        $this->Index($msg);

    }

    public function delete($idArtist)
    {
        $dao = new ArtistDAO();

        $msg = $dao->Delete($idArtist);

        $this->Index($msg);

    }

    public function edit($idArtist, $newName)
    {
        $dao = new ArtistDAO();

        $msg = $dao->UpdateName($idArtist, $newName);

        $this->Index($msg);

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