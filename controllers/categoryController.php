<?php

    namespace Controllers;

    use models\category as category;
    use dao\categoryDAO as categoryDAO;


    Class CategoryController
    {

        public function Index()
        {
            $dao = new categoryDAO();

            $array_category = $dao->GetAllCategories();

            require_once(VIEWS_PATH."abmcategories.php");
        }

        public function getCategoryById($CategoryID)
        {
            $dao = new categoryDAO();

            $categoryById = $dao->GetCategorybyID($CategoryID);

            return $categoryById;
        }

        public function new($newCategoryName)
        {
            $dao = new categoryDAO();

            $dao->addCategory($newCategoryName);

            $this->Index();
        }

        public function delete($CategoryID)
        {
            $dao = new categoryDAO();

            $dao->delete($CategoryID);

            $this->Index();
        }

        public function edit($CategoryID, $newCategoryName)
        {
            $dao = new categoryDAO();

            $dao->UpdateCategory($CategoryID, $newCategoryName);

            $this->Index();
        }

    }

?>