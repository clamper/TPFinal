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

        $query = "SELECT * FROM ".$this->tableName." where id=".$id;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $artist = new Artist();
            $artist->setIdArtist($row["idartist"]);
            $artist->setArtistName($row["artistname"]);
        }

        return $artist;
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
        

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);

    }

    public function Delete($artistID)
    {
        $query = "UPDATE ".$this->tableName." set isActive = false WHERE idartist = :artistCode";

        $parameters["artistCode"] = $artistID;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

    public function UpdateName($artistID, $newName)
    {
        $query = "UPDATE ".$this->tableName." set name = :newName WHERE idartist = :artistID";
        
        $parameters["newName"] = $newName;
        $parameters["artistID"] = $artistID;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }
}





?>
