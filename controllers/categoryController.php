<?php

    namespace Controllers;

    use models\category as category;
    use dao\categoryDAO as categoryDAO;


    Class CategoryController
    {

        public function Index($msg = "")
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

            $msg = $dao->addCategory($newCategoryName);

            $this->Index($msg);
        }

        public function delete($CategoryID)
        {
            $dao = new categoryDAO();

            $msg = $dao->delete($CategoryID);

            $this->Index($msg);
        }

        public function edit($CategoryID, $newCategoryName)
        {
            $dao = new categoryDAO();

            $msg = $dao->UpdateCategory($CategoryID, $newCategoryName);

            $this->Index($msg);
        }

    }

?>