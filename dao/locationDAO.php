<?php

namespace DAO;


use Models\Location as Location;


class LocationDAO
{
    private $tableName = "locations";


    public function GetAllLocationsByPresentation($idPresentation)
    {
        $LocationList = array();

        $query = "SELECT * FROM ".$this->tableName." where idPres =".$idPresentation;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Location = new Location();
            $Location->setIdLocation($row["idLocation"]);
            $Location->setIdPres()($row["idPres"]);
            $Location->setIdSeat()($row["idSeat"]);
            $Location->setLocationPrice($row["locationPrice"]);
            $Location->setLocationQty($row["locationQty"]);
            $Location->setLocationSold()()($row["locationSold"]);
            
            array_push($LocationList, $Location);
        }

        return $LocationList;
    }


    public function GetLocationById($id)
    {
        $Location = null;

        $query = "SELECT * FROM ".$this->tableName." where id=".$id;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Location = new Location();
            $Location->setIdLocation($row["idLocation"]);
            $Location->setIdPres()($row["idPres"]);
            $Location->setIdSeat()($row["idSeat"]);
            $Location->setLocationPrice($row["locationPrice"]);
            $Location->setLocationQty($row["locationQty"]);
            $Location->setLocationSold()()($row["locationSold"]);
            
        }

        return $Location;
    }


    public function addLocation( $idPresentation, $idseat, $price, $quantity, $sold)
    {
        $query = "INSERT INTO ".$this->tableName.
        " (idpresentation, idseat,  price, quantity, sold) ".
        "VALUES (:idPresentation, :idseat, :price, :quantity, :sold);";
            
        $parameters["idPresentation"] = $idPresentation;
        $parameters["idseat"] = $idseat;
        $parameters["price"] = $price;
        $parameters["quantity"] = $quantity;
        $parameters["sold"] = $sold;

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
        $query = "DELETE FROM ".$this->tableName."  WHERE id = :LocationId";
        
        $parameters["LocationID"] = $LocationID;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

}





?>