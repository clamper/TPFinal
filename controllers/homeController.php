<?php

namespace Controllers;

use Controllers\EventController as EventController;


class HomeController
{
    public function Index()
    {
        $events = new EventController();
        $events->showAllEvents();
        
        //require_once(VIEWS_PATH."abmcategories.php");
        //require_once(VIEWS_PATH."add-event.php");
     //  require_once(VIEWS_PATH."home.php");
        //require_once(VIEWS_PATH."viewmyticket.php");
     //   require_once(VIEWS_PATH."userregister.php");
     //   require_once(VIEWS_PATH."userlogin.php");
        //require_once(VIEWS_PATH."show-detail.php");
    }

    public function Logout()
    {
        session_destroy();
        
        $this->Index();
    }
}

?>