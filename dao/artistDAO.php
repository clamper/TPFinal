<?php

namespace DAO;


use Models\Artist as Artist;


class ArtistDAO
{
    private $tableName = "artists";


    public function GetAllArtist()
    {
        $artistList = array();

        $query = "SELECT * FROM ".$this->tableName." where isactive = true";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $artist = new Artist();
            $artist->setIdArtist($row["idartist"]);
            $artist->setArtistName($row["artistname"]);

            array_push($artistList, $artist);
        }

        return $artistList;
    }


    public function GetArtistbyID($id)
    {
        $artist = null;
        $error = null;

        $query = "SELECT * FROM ".$this->tableName." where id=".$id;

        try
        {
            $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);

        }catch(Exception $ex)
        {
            Echo $ex;
            $error = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
        } 
        

        foreach ($resultSet as $row)
        {                
            $artist = new Artist();
            $artist->setIdArtist($row["idartist"]);
            $artist->setArtistName($row["artistname"]);
        }

        if ($error = null)
            return $artist;
        else    
            return $error;
    }

    private function existArtist($ArtistName)
    {
        $exist = -1; // -1 no existe

        $query = "SELECT idartist FROM ".$this->tableName." where artistname ='".$ArtistName."'";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);

        if (count($resultSet) > 0)
            $exist = $resultSet[0]["idartist"];

        return $exist;
    }

    public function addArtist($ArtistName)
    {
        $error = "";

        $index = $this->existArtist($ArtistName);

        if ( $index > -1)
            //$query = "UPDATE ".$this->tableName." set artistname = :artistname where idartist = :index;";
            {
            $query = "UPDATE ".$this->tableName." set isActive = true where idartist = ".$index;
            $parameters["index"] = $index;
            }
        else
            $query = "INSERT INTO ".$this->tableName." (artistname) VALUES (:artistname);";
            
        $parameters["artistname"] = $ArtistName;
        

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

    public function Delete($artistID)
    {
        $error = "";

        $query = "UPDATE ".$this->tableName." set isActive = false WHERE idartist = :artistCode";

        $parameters["artistCode"] = $artistID;

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

    public function UpdateName($artistID, $newName)
    {
        $error = "";

        $query = "UPDATE ".$this->tableName." set artistname = :newName WHERE idartist = :artistID";
        
        $parameters["newName"] = $newName;
        $parameters["artistID"] = $artistID;

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
