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
            $Seat->setIdSeat($row["idSeat"]);
            $Seat->setSeatName($row["name"]);

            array_push($arraylist, $Seat);
        }

        return $SeatList;
    }


    public function GetSeatbyID($id)
    {
        $Seat = null;

        $query = "SELECT * FROM ".$this->tableName." where id=".$id;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Seat = new Seat();
            $Seat->setIdSeat($row["idSeat"]);
            $Seat->setSeatName($row["name"]);
        }

        return $Seat;
    }


    public function addSeat($SeatName)
    {
        if ( existArtist($SeatName))
            $query = "UPDATE ".$this->tableName." set SeatName = :SeatName where SeatName = :SeatName;";
        else
        $query = "INSERT INTO ".$this->tableName." (Seatname) VALUES (:Seatname);";
            
        $parameters["Seatname"] = $SeatName;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);

    }

    private function existSeat($seatName)
    {
        $exist = false;

        $query = "SELECT * FROM ".$this->tableName." where seatName =".$seatName;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);

        if (count($resultSet) > 0)
            $exist = true;

        return $exist;
    }

    public function Delete($SeatID)
    {
        $query = "UPDATE ".$this->tableName." set isActive = false WHERE id = :SeatCode";
        
        $parameters["SeatCode"] = $SeatID;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }


    public function UpdateSeat($seatId, $seatName)
    {
        $query = "UPDATE ".$this->tableName." set name = :seatName WHERE id = :seatId";
        
        $parameters["seatName"] = $seatName;
        $parameters["seatId"] = $seatId;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

}





?>