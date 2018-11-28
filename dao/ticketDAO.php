<?php

namespace DAO;

use Models\Ticket as Ticket;

class TicketDAO implements ITicketDAO
{
    private $tableName = "tickets";


    public function addTicket($ticket)
    {
        $query = "INSERT INTO ".$this->tableName.
        " (iduser, idLocation, date, price) ".
        "VALUES (:idUser, :idLocation, now(), :price);";
            
        $parameters["idUser"] = $ticket->getIdUser();
        $parameters["idLocation"] = $ticket->getIdLocation();
        $parameters["price"] = $ticket->getPrice();

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

    public function GetAllTicketsByUser($idUser)
    {
        $TicketsList = array();

        $query = "SELECT idticket, idlocation, iduser, date, price FROM ".$this->tableName." where iduser =".$idUser;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Ticket = new Ticket();
            $Ticket->setTicketNumber($row["idticket"]);
            $Ticket->setIdUser($row["iduser"]);
            $Ticket->setIdLocation($row["idlocation"]);
            $Ticket->setDate($row["date"]);
            $Ticket->setPrice($row["price"]);
           
            array_push($TicketsList, $Ticket);
        }

        return $TicketsList;
    }

    public function countTicketByLocation($idlocation)
    {
        $count = 0;

        $query = "SELECT count(*) 'total' FROM ".$this->tableName." where idlocation =".$idlocation;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);

        if (count($resultSet) != 0)
            $count = $resultSet[0]["total"];
        
        return $count;
    }

    public function GetAllTicketsByLocation($idlocation)
    {
        $TicketsList = array();

        $query = "SELECT idticket, idlocation, iduser, date, price FROM ".$this->tableName." where idlocation =".$idlocation;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Ticket = new Ticket();
            $Ticket->setTicketNumber($row["idticket"]);
            $Ticket->setIdUser($row["iduser"]);
            $Ticket->setIdLocation($row["idlocation"]);
            $Ticket->setDate($row["date"]);
            $Ticket->setPrice($row["price"]);
           
            array_push($TicketsList, $Ticket);
        }

        return $TicketsList;
    }

    public function GetAllTicketsByCategory($idCategory)
    {
        $TicketsList = array();

        $query = "SELECT idticket, idlocation, iduser, date, price FROM ".$this->tableName." T inner join locations L on T.idlocation = L.idlocation".
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
            $Ticket->setTicketNumber($row["idticket"]);
            $Ticket->setIdUser($row["iduser"]);
            $Ticket->setIdLocation($row["idlocation"]);
            $Ticket->setDate($row["date"]);
            $Ticket->setPrice($row["price"]);
           
            array_push($TicketsList, $Ticket);
        }

        return $TicketsList;
    }

    public function GetAllTicketsByDate($date)
    {
        $TicketsList = array();

        $query = "SELECT idticket, idlocation, iduser, date, price FROM ".$this->tableName." T inner join locations L on T.idlocation = L.idlocation".
        " inner join presentations P on P.idpresentation = L.idpresentation".
        " where MONTH(P.date) = MONTH(".$date.") and DAY(P.date) = DAY(".$date.")";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Ticket = new Ticket();
            $Ticket->setTicketNumber($row["idticket"]);
            $Ticket->setIdUser($row["iduser"]);
            $Ticket->setIdLocation($row["idlocation"]);
            $Ticket->setDate($row["date"]);
            $Ticket->setPrice($row["price"]);
           
            array_push($TicketsList, $Ticket);
        }

        return $TicketsList;
    }

    public function GetAllTicketsForDates()
    {
        $TicketsList = array();

        $query = "SELECT count(*) 'cant', date, SUM(T.price) 'total' FROM ".$this->tableName." T group by T.date";
        
        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        return $resultSet;
    }

    public function GetAllTicketsForCategories()
    {
        $TicketsList = array();

        $query = "SELECT count(*) 'cant', C.categoryname 'category', SUM(T.price) 'total' ".
                    "FROM tickets T inner join locations L on T.idlocation = L.idlocation ".
                    "inner join presentations P on L.idpresentation = P.idpresentation ".
                    "inner join shows S on P.idshow = S.idshow ".
                    "inner JOIN categoryxshow CXS on S.idshow = CXS.idshow ".
                    "inner join categories C on c.idcategory = CXS.idcategory ".
                    "group by C.idcategory";
        
        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        return $resultSet;
    }

    public function GetAllTicketsSold()
    {
        $TicketsList = array();

        $query = "SELECT S.showname 'show', P.date 'date', SE.seatname 'seat', L.quantity 'total', count( T.idticket ) 'vendidos' FROM ".
                "locations L inner join presentations P on L.idpresentation = P.idpresentation ".
                "inner join shows S on P.idshow = S.idshow ".
                "inner join seats SE on SE.idseat = L.idseat ".
                "left join tickets T on T.idlocation = L.idlocation ".
                "where P.date > now() ".
                "group by L.idlocation";
        
        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        return $resultSet;
    }



}
?>