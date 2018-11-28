<?php

namespace DAO;


use Models\Seat as Seat;


class SeatDAO
{
    private $tableName = "seats";


    public function GetAllSeats()
    {
        $SeatList = array();

        $query = "SELECT idseat, seatname FROM ".$this->tableName." where isactive = true";

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

        $query = "SELECT idseat, seatname FROM ".$this->tableName." where idseat =".$id;

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
            $Seat->setIdSeat($row["idseat"]);
            $Seat->setSeatName($row["seatname"]);
        }

        if ($error == null)
            return $Seat;
        else    
            return $error;
    }


    public function addSeat($Seat)
    {
        $msg = "";

        $index = $this->existSeat($Seat->getSeatName());


        if ( $index > -1)
        {
            if ($this->isActive($index))
                $msg = "el tipo de plaza ya existe";
            else
            {
                $query = "UPDATE ".$this->tableName." set isActive = true where idseat = ".$index;
                $parameters["index"] = $index;
                $msg = "tipo de plaza agregada exitosamente";

                try
                {
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query, $parameters);
                }catch(Exception $ex)
                {
                    $msg = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
                }  
        
            }
        }
        else
        {
            $query = "INSERT INTO ".$this->tableName." (Seatname) VALUES (:Seatname);";
            $parameters["Seatname"] = $Seat->getSeatName();
            $msg = "tipo de plaza agregada exitosamente";

            try
            {
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(Exception $ex)
            {
                $msg = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
            }  
    
        }   

        return $msg;
    }

    private function isActive($idseat)
    {
        $active = false;

        $query = "SELECT isactive FROM ".$this->tableName." where idseat ='".$idseat."'";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);

        if ($resultSet[0]["isactive"] == 1)
            $active = true;

        return $active;
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
        $msg = "";

        $showDAO =  new ShowDao();
        $cant = count($showDAO-> GetShowsBySeat($SeatID));

        if ($cant == 0)
        {
            $query = "UPDATE ".$this->tableName." set isActive = false WHERE idseat = :SeatCode";

            $parameters["SeatCode"] = $SeatID;

            try
            {
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

                $msg = "tipo de plaza eliminada con exito";

            }catch(Exception $ex)
            {
                $msg = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
            }  
        }
        else
            $msg = "el tipo de plaza no puede ser eliminado por que hay un evento asociado a el";

        return $msg;
    }


    public function UpdateName($seatId, $seatName)
    {
        $msg = "";

        $index = $this->existSeat($seatName);

        if ( $index == -1)
        {
            $query = "UPDATE ".$this->tableName." set seatname = :seatName WHERE idseat = :seatId";
            
            $parameters["seatName"] = $seatName;
            $parameters["seatId"] = $seatId;

            try
            {
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

                $msg = "tipo de plaza actualizada con exito";

            }catch(Exception $ex)
            {
                $msg = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
            }  
        }
        else
            if ($this->isActive($index))
                $msg = "ya existe un tipo de plaza con ese nombre";
            else
                $msg = "ya existia un tipo de plaza con ese nombre; debe usar la funcion agregar nuevo tipo de plaza";

        return $msg;
    }

}





?>