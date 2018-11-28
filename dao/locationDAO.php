<?php

namespace DAO;


use Models\Location as Location;
use DAO\TicketDAO as TicketDAO;


class LocationDAO implements ILocationDAO
{
    private $tableName = "locations";


    public function GetAllLocationsByPresentation($idPresentation)
    {
        $LocationList = array();

        $query = "SELECT idlocation, idpresentation, idseat, price, quantity FROM ".$this->tableName." where idpresentation =".$idPresentation;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Location = new Location();
            $Location->setIdLocation($row["idlocation"]);
            $Location->setIdPres($row["idpresentation"]);
            $Location->setIdSeat($row["idseat"]);
            $Location->setLocationPrice($row["price"]);
            $Location->setLocationQty($row["quantity"]);
            
            array_push($LocationList, $Location);
        }

        return $LocationList;
    }


    public function GetLocationById($id)
    {
        $Location = null;

        $query = "SELECT idlocation, idpresentation, idseat, price, quantity FROM ".$this->tableName." where idlocation =".$id;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Location = new Location();
            $Location->setIdLocation($row["idlocation"]);
            $Location->setIdPres($row["idpresentation"]);
            $Location->setIdSeat($row["idseat"]);
            $Location->setLocationPrice($row["price"]);
            $Location->setLocationQty($row["quantity"]);
            
        }

        return $Location;
    }


    public function addLocation($location)
    {
        $query = "INSERT INTO ".$this->tableName.
        " (idpresentation, idseat,  price, quantity) ".
        "VALUES (:idPresentation, :idseat, :price, :quantity);";
            
        $parameters["idPresentation"] = $location->getIdPres();
        $parameters["idseat"] = $location->getIdSeat();
        $parameters["price"] = $location->getLocationPrice();
        $parameters["quantity"] = $location->getLocationQty();

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

    public function GetAvailability($idLocation)
    {
        $plates = 0;
        $sold = 0;
        $availability = 0;


        $location = $this->GetLocationById($idLocation);
        $plates = $location->getLocationQty();

        $ticketDAO = new TicketDAO();
        $sold = $ticketDAO->countTicketByLocation(  $location->getIdLocation()    );


        $availability = $plates - $sold;

        return $availability;
    }


    public function Delete($LocationID)
    {
        $query = "DELETE FROM ".$this->tableName."  WHERE idlocation = :LocationId";
        
        $parameters["LocationID"] = $LocationID;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

}





?>