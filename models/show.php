<?php

    // Definicion de un Show, tiene un nombre y una categoria, por ejemplo : Festival de musica, Lollapalooza
    // Aca deberia ir cualquier otro dato referente al show en si, por ejemplo, la imagen de presentacion, el slogan del show, etc.

    namespace Models;

    class Show
    {
        private $idShow;
        private $idCat;
        private $showName;

        public function getIdShow()
        {
            return $this->idShow;
        }

        public function setIdShow($idShow)
        {
            $this->idShow = $idShow;
        }

        public function getIdCat()
        {
            return $this->idCat;
        }

        public function setIdCat($idCat)
        {
            $this->idCat = $idCat;
        }

        public function getShowName()
        {
            return $this->showName;
        }

        public function setShowName($showName)
        {
            $this->showName = $showName;
        }

    }

?>