<?php

namespace Controllers;

use Models\Artist as Artist;
use dao\ArtistDAO as artistdao;

class ArtistController
{
    public function Index()
    {
        $dao = new ArtistDAO();

        $array_artist = $dao->GetAllArtist();

        require_once(VIEWS_PATH."abmartist.php");

    }
    
    public function new($newArtist)
    {
        $dao = new ArtistDAO();

        $dao->addArtist($newArtist);

        $this->Index();

    }

    public function delete($idArtist)
    {
        $dao = new ArtistDAO();

        $dao->Delete($idArtist);

        $this->Index();

    }

    public function edit($idArtist, $newName)
    {
        $dao = new ArtistDAO();

        $dao->UpdateName($idArtist, $newName);

        $this->Index();

    }



}








?>