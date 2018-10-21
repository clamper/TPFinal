<?php
    namespace Controllers;

    class HomeController
    {
        public function Index()
        {
            require_once(VIEWS_PATH."add-event.php");
            //require_once(VIEWS_PATH."home.php");
        }

        public function Logout()
        {
            session_destroy();
            
            $this->Index();
        }
    }
?>