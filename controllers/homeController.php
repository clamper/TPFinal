<?php
    namespace Controllers;

    class HomeController
    {
        public function Index()
        {
            require_once(VIEWS_PATH."add-event.php");
        }

        public function Logout()
        {
            session_destroy();
            
            $this->Index();
        }
    }
?>