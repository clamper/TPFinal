<?php

namespace DAO;


use Models\Artist as Artist;
use DAO\ShowDao as ShowDao;


class ArtistDAO implements IArtistDAO
{
    private $tableName = "artists";
    private $tableArtistXPres = "artistxpresentation";


    public function GetAllArtists()
    {
        $artistList = array();

        $query = "SELECT idartist, artistname FROM ".$this->tableName." where isactive = true";

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

        $query = "SELECT idartist, artistname FROM ".$this->tableName." where id=".$id;

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

    private function isActive($idartist)
    {
        $active = false;

        $query = "SELECT isactive FROM ".$this->tableName." where idartist ='".$idartist."'";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);

        if ($resultSet[0]["isactive"] == 1)
            $active = true;

        return $active;
    }

    public function addArtist($artist)
    {
        $msg = "";

        $index = $this->existArtist($artist->getArtistName());

        if ( $index > -1)
        {
            if ($this->isActive($index))
                $msg = "el artista ya existe";
            else
            {
                $query = "UPDATE ".$this->tableName." set isActive = true where idartist = ".$index;
                $parameters["index"] = $index;
                $msg = "artista agregado con exitos";

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
            $query = "INSERT INTO ".$this->tableName." (artistname) VALUES (:artistname);";
            $parameters["artistname"] = $artist->getArtistName();
            $msg = "artista agregado con exitos";

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

    public function Delete($artistID)
    {
        $msg = "";

        $showDAO =  new ShowDao();
        $cant = count($showDAO-> GetShowsByArtist($artistID));

        if ($cant == 0)
        {
            $query = "UPDATE ".$this->tableName." set isActive = false WHERE idartist = :artistCode";

            $parameters["artistCode"] = $artistID;

            try
            {
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

                $msg = "artista eliminado con exito";

            }catch(Exception $ex)
            {
                $msg = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
            }  
        }
        else
            $msg = "el artista no puede ser eliminado por que hay un evento asociado a el";

        return $msg;
    }

    public function GetAllArtistByPresentation($idPresentation)
    {
        $artistList = array();

        $query = "SELECT AXP.idartist, artistname FROM ".$this->tableArtistXPres." AXP inner join artists A on AXP.idartist = A.idartist where AXP.idpresentation =".$idPresentation;

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

    public function UpdateName($artistID, $newName)
    {
        $msg = "";

        $index = $this->existArtist($newName);

        if ( $index == -1)
        {
            $query = "UPDATE ".$this->tableName." set artistname = :newName WHERE idartist = :artistID";
            
            $parameters["newName"] = $newName;
            $parameters["artistID"] = $artistID;

            try
            {
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

                $msg = "artista actualizado con exito";

            }catch(Exception $ex)
            {
                $msg = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
            }  
        }
        else
            if ($this->isActive($index))
                $msg = "ya existe un artista con ese nombre";
            else
                $msg = "ya existia un artista con ese nombre; debe usar la funcion agregar nuevo artista";

        return $msg;
    }
}





?>
