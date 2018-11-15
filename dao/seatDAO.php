<?php

namespace DAO;


use Models\Seat as Seat;


class SeatDAO
{
    private $tableName = "seats";


    public function GetAllSeats()
    {
        $SeatList = array();

        $query = "SELECT * FROM ".$this->tableName." where isactive = true";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        
        foreach ($resultSet as $row)
        {                
            $Seat = new Seat();
            $Seat->setIdSeat($row["idseat"]);
            $Seat->setSeatName($row["seatname"]);

            array_push($SeatList, $Seat);
        }

        return $SeatList;
    }


    public function GetSeatbyID($id)
    {
        $Seat = null;
        $error = null;

        $query = "SELECT * FROM ".$this->tableName." where id=".$id;

        try
        {
            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

        }catch(Exception $ex)
        {
            $error = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
        } 
        
        foreach ($resultSet as $row)
        {                
            $Seat = new Seat();
            $Seat->setIdSeat($row["idSeat"]);
            $Seat->setSeatName($row["name"]);
        }

        if ($error = null)
            return $Seat;
        else    
            return $error;
    }


    public function addSeat($SeatName)
    {
        $error = "";

        $index = $this->existSeat($SeatName);

        if ( $index > -1)
        {
            $query = "UPDATE ".$this->tableName." set isActive = true where idseat = ".$index;
            $parameters["index"] = $index;
        }
        else
        {
            $query = "INSERT INTO ".$this->tableName." (Seatname) VALUES (:Seatname);";
            $parameters["Seatname"] = $SeatName;
        }   
        
        try
        {
            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

        }catch(Exception $ex)
        {
            $error = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
        }  

        return $error;
    }

    private function existSeat($seatName)
    {
        $exist = -1; // -1 no existe

        $query = "SELECT idseat FROM ".$this->tableName." where seatname ='".$seatName."'";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);

        if (count($resultSet) > 0)
            $exist = $resultSet[0]["idseat"];

        return $exist;
    }

    public function Delete($SeatID)
    {
        $error = "";

        $query = "UPDATE ".$this->tableName." set isActive = false WHERE idseat = :SeatCode";
        
        $parameters["SeatCode"] = $SeatID;

        try
        {
            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

        }catch(Exception $ex)
        {
            $error = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
        }  

        return $error;
    }


    public function UpdateName($seatId, $seatName)
    {
        $error = "";

        $query = "UPDATE ".$this->tableName." set seatname = :seatName WHERE idseat = :seatId";
        
        $parameters["seatName"] = $seatName;
        $parameters["seatId"] = $seatId;

        try
        {
            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

        }catch(Exception $ex)
        {
            $error = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
        }  

        return $error;
    }

}





?>