<?php

    // Definicion de categoryegorias existentes: recital, festival de musica, obra teatral, etc

    namespace Models;

    class Categoryegory
    {
        private $idCategory;
        private $categoryName;
        private $isActive = true;

        public function getIdCategory()
        {
            return $this->idCategory;
        }

        public function setIdCategory($idCategory)
        {
            $this->idCategory = $idCategory;
        }

        public function getCategoryName()
        {
            return $this->categoryName;
        }

        public function setCategoryName($categoryName)
        {
            $this->categoryName = $categoryName;
        }

        public function deleteCategoryByID($id)
        {
            $this->isActive = false;
        }

    }

?>