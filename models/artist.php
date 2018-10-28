<?php

    // Definicion de artistas existentes: metallica, iron maiden, korn, piñon fijo, etc

    namespace Models;

    class Artist
    {
        private $idArtist;
        private $artistName;

        public function getIdArtist()
        {
            return $this->idArtist;
        }

        public function setIdArtist($idArtist)
        {
            $this->idArtist = $idArtist;
        }

        public function getArtistName()
        {
            return $this->artistName;
        }

        public function setArtistName($artistName)
        {
            $this->artistName = $artistName;
        }

    }

?>