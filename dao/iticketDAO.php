<?php

namespace DAO;

use Model\Ticket as Ticket;

interface ITicketDAO
{
    function addTicket(Ticket $ticket);
    function GetAllTicketsByUser($idUser);
    function countTicketByLocation($idlocation);
    function GetAllTicketsByLocation($idlocation);
    function GetAllTicketsByCategory($idCategory);
    function GetAllTicketsByDate($date);
    function GetAllTicketsForDates();
    function GetAllTicketsForCategories();
    function GetAllTicketsSold();
}

?>