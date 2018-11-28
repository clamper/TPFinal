<?php

namespace Controllers;

use Models\seat as Seat;
use dao\seatdao as SeatDao;

class SeatController
{
    
    public function Index($msg = "")
    {
        $dao = new SeatDAO();

        $array_Seat = $dao->GetAllSeats();

        require_once(VIEWS_PATH."abmSeats.php");

    }
    
    public function new($newSeat)
    {
        $dao = new SeatDAO();

        $seat = new Seat();
        $seat->setSeatName($newSeat);

        $msg = $dao->addSeat($seat);

        $this->Index($msg);

    }

    public function delete($idSeat)
    {
        $dao = new SeatDAO();

        $msg = $dao->Delete($idSeat);

        $this->Index($msg);

    }

    public function edit($idSeat, $newName)
    {
        $dao = new SeatDAO();

        $msg = $dao->UpdateName($idSeat, $newName);

        $this->Index($msg);

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