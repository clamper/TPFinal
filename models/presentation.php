<?php

    // Definicion de una Presentacion, consta de un artista, un show, una fecha, por ejemplo: metallica, lolapallooza, 23/01/19 -
    // Varios artistas deberian poder presentarse en una misma fecha, y un artista deberia poder presentarse en varias fechas.    

    namespace Models;

    class Presentation
    {
        private $idPresentation;
        private $idShow;        // para que show
        //private $idArtist;      // VA EN LA TABLE ARTISTAxPRESENTACION
        private $pressDate;     // en que dia

        public function getIdPres()
        {
            return $this->idPresentation;
        }

        public function setIdPres($idPresentation)
        {
            $this->idPresentation = $idPresentation;
        }

        public function getIdShow()
        {
            return $this->idShow;
        }

        public function setIdShow($idShow)
        {
            $this->idShow = $idShow;
        }

        public function getPresDate()
        {
            return $this->pressDate;
        }

        public function setPresDate($pressDate)
        {
            $this->pressDate = $pressDate;
        }

    }

?>