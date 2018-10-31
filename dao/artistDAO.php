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
            $artist->setArtistName($row["name"]);

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
            $artist->setArtistName($row["name"]);
        }

        return $artist;
    }

    public function addArtist($ArtistName)
    {
        $query = "INSERT INTO ".$this->tableName." (artistname) VALUES (:artistname);";
            
        $parameters["artistname"] = $ArtistName;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);

    }


    public function Delete($artistID)
    {
        $query = "UPDATE ".$this->tableName." set isActive = false WHERE id = :artistCode";
        
        $parameters["artistCode"] = $artistID;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

}





?>