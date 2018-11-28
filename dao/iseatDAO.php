<?php

namespace DAO;

use Model\Seat as Seat;

interface ISeatDAO
{
    function GetAllSeats();
    function GetSeatbyID($id);
    function addSeat($Seat);
    function Delete($SeatID);
    function UpdateName($seatId, $seatName);
}