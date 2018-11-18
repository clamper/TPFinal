<?php

namespace Controllers;

class HomeController
{
    public function Index()
    {
        //require_once(VIEWS_PATH."abmcategories.php");
        require_once(VIEWS_PATH."add-event.php");
        //require_once(VIEWS_PATH."home.php");
        //require_once(VIEWS_PATH."viewmyticket.php");
        //require_once(VIEWS_PATH."userregister.php");
    }

    public function Logout()
    {
        session_destroy();
        
        $this->Index();
    }
}

?>