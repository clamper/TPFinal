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


    public function GetLocationbyID($id)
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


    public function addLocation($idLocation, $idPres, $idSeat, $locationPrice, $locationQty, $locationSold)
    {
        $query = "INSERT INTO ".$this->tableName.
        " (idLocation, idPres, idSeat, locationPrice, locationQty, locationSold) ".
        "VALUES (:idLocation, :idPres, :idSeat, :locationPrice, :locationQty, :locationSold);";
            
        $parameters["idLocation"] = $idLocation;
        $parameters["idPres"] = $idPres;
        $parameters["idSeat"] = $idSeat;
        $parameters["locationPrice"] = $locationPrice;
        $parameters["locationQty"] = $locationQty;
        $parameters["locationSold"] = $locationSold;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
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