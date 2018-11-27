<?php

namespace DAO;


use Models\Location as Location;


class LocationDAO
{
    private $tableName = "locations";


    public function GetAllLocationsByPresentation($idPresentation)
    {
        $LocationList = array();

        $query = "SELECT * FROM ".$this->tableName." where idpresentation =".$idPresentation;

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

        $query = "SELECT * FROM ".$this->tableName." where idlocation =".$id;

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


    public function addLocation( $idPresentation, $idseat, $price, $quantity)
    {
        $query = "INSERT INTO ".$this->tableName.
        " (idpresentation, idseat,  price, quantity) ".
        "VALUES (:idPresentation, :idseat, :price, :quantity);";
            
        $parameters["idPresentation"] = $idPresentation;
        $parameters["idseat"] = $idseat;
        $parameters["price"] = $price;
        $parameters["quantity"] = $quantity;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

    public function GetAvailability($idLocation)
    {
        $Location = $this->GetLocationById($idLocation);

        $availability = $Location->getLocationQty() - $Location->getLocationSold();

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