<?php
    namespace Controllers;

    class SearchController
    {
        public function Index()
        {
            require_once(VIEWS_PATH."search.php");
        }

        public function Logout()
        {
            session_destroy();
            
            $this->Index();
        }
    }
?>