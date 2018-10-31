<?php

    // Definicion de un Show, tiene un nombre y una categoria, por ejemplo : Festival de musica, Lollapalooza
    // Aca deberia ir cualquier otro dato referente al show en si, por ejemplo,
    //  la imagen de presentacion, el slogan del show, etc.

    namespace Models;

    class Show
    {
        private $idShow;
        private $idCategory;
        private $showName;
        private $idImage;
        private $description;

        public function getIdShow()
        {
            return $this->idShow;
        }

        public function setIdShow($idShow)
        {
            $this->idShow = $idShow;
        }

        public function getIdCategory()
        {
            return $this->idCategory;
        }

        public function setIdCategory($idCategory)
        {
            $this->idCategory = $idCategory;
        }

        public function getShowName()
        {
            return $this->showName;
        }

        public function setShowName($showName)
        {
            $this->showName = $showName;
        }

        public function getIdImage()
        {
            return $this->idImage;
        }

        public function setIdImage($idImage)
        {
            $this->idImage = $idImage;
        }
        
        public function getDescription()
        {
            return $this->description;
        }

        public function setDescription($description)
        {
            $this->description = $description;
        }

    }

?>