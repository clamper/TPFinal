<?php

    // Definicion de categorias existentes: recital, festival de musica, obra teatral, etc

    namespace Models;

    class Categorie
    {
        private $idCat;
        private $catName;

        public function getIdCat()
        {
            return $this->idCat;
        }

        public function setIdCat($idCat)
        {
            $this->idCat = $idCat;
        }

        public function getCatName()
        {
            return $this->catName;
        }

        public function setCatName($catName)
        {
            $this->catName = $catName;
        }

    }

?>