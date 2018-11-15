<?php

namespace Controllers;

use Models\seat as Seat;
use dao\seatdao as SeatDao;

class SeatController
{
    


    public function Index()
    {
        $dao = new SeatDAO();

        $array_Seat = $dao->GetAllSeats();

        require_once(VIEWS_PATH."abmSeats.php");

    }
    
    public function new($newSeat)
    {
        $dao = new SeatDAO();

        $error_msg = $dao->addSeat($newSeat);

        $this->Index();

    }

    public function delete($idSeat)
    {
        $dao = new SeatDAO();

        $error_msg = $dao->Delete($idSeat);

        $this->Index();

    }

    public function edit($idSeat, $newName)
    {
        $dao = new SeatDAO();

        $error_msg = $dao->UpdateName($idSeat, $newName);

        $this->Index();

    }

    public function GetSeatbyID($idSeat)
    {
        $Seat = null;

        $dao = new SeatDAO();

        $Seat = $dao->GetSeatbyID($idSeat);

        return $Seat;
    }


}








?>