<?php

namespace DAO;

use Model\Ticket as Ticket;

class TicketDAO
{
    private $tableName = "tickets";


    public function addTicket($idUser, $idLocation)
    {
        $query = "INSERT INTO ".$this->tableName.
        " (iduser, idLocation) ".
        "VALUES (:idUser, :idLocation,);";
            
        $parameters["idUser"] = $idUser;
        $parameters["idLocation"] = $idLocation;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

    public function GetAllTicketsByUser($idUser)
    {
        $TicketsList = array();

        $query = "SELECT * FROM ".$this->tableName." where iduser =".$iduser;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Ticket = new Ticket();
            $Ticket->setTicketNumber($ticketNumber);
            $Ticket->setIdUser($idUser);
            $Ticket->setIdLocation($idLocation);
           
            array_push($TicketsList, $Ticket);
        }

        return $TicketsList;
    }

    public function GetAllTicketsByLocation($idlocation)
    {
        $TicketsList = array();

        $query = "SELECT * FROM ".$this->tableName." where idlocation =".$idlocation;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Ticket = new Ticket();
            $Ticket->setTicketNumber($ticketNumber);
            $Ticket->setIdUser($idUser);
            $Ticket->setIdLocation($idLocation);
           
            array_push($TicketsList, $Ticket);
        }

        return $TicketsList;
    }

    public function GetAllTicketsByCategory($idCategory)
    {
        $TicketsList = array();

        $query = "SELECT * FROM ".$this->tableName." T inner join locations L on T.idlocation = L.idlocation".
        " inner join presentations P on P.idpresentation = L.idpresentation".
        " inner join shows S on S.idshow = P.idshow".
        " inner join categoryxshow CXS on CXS.idshow = S.idshow".
        " inner join categories C on C.idcategory = CXS.idcategory".
        " where C.idcategory = ".$idCategory;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Ticket = new Ticket();
            $Ticket->setTicketNumber($ticketNumber);
            $Ticket->setIdUser($idUser);
            $Ticket->setIdLocation($idLocation);
           
            array_push($TicketsList, $Ticket);
        }

        return $TicketsList;
    }

    public function GetAllTicketsByDate($date)
    {
        $TicketsList = array();

        $query = "SELECT * FROM ".$this->tableName." T inner join locations L on T.idlocation = L.idlocation".
        " inner join presentations P on P.idpresentation = L.idpresentation".
        " where DAY(P.date) = DAY(".$date.")";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Ticket = new Ticket();
            $Ticket->setTicketNumber($ticketNumber);
            $Ticket->setIdUser($idUser);
            $Ticket->setIdLocation($idLocation);
           
            array_push($TicketsList, $Ticket);
        }

        return $TicketsList;
    }

}
?>