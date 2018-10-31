<?php

namespace DAO;


use Models\Show as Show;


class ShowDAO
{
    private $tableName = "shows";


    public function GetAllShows()
    {
        $ShowList = array();

        $query = "SELECT * FROM ".$this->tableName;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Show = new Show();
            $Show->setIdShow($row["idShow"]);
            $Show->setIdCategory($row["idCategory"]);
            $Show->setShowName($row["showName"]);
            $Show->setIdImage($row["idImage"]);
            $Show->setDescription($row["description"]);

            array_push($ShowList, $Show);
        }

        return $ShowList;
    }


    public function GetShowbyID($idShow)
    {
        $Show = null;

        $query = "SELECT * FROM ".$this->tableName." where idshow =".$idShow;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Show = new Show();
            $Show->setIdShow($row["idShow"]);
            $Show->setIdCategory($row["idCategory"]);
            $Show->setShowName($row["showName"]);
            $Show->setIdImage($row["idImage"]);
            $Show->setDescription($row["description"]);
        }

        return $Show;
    }


    public function addShow($idCategory, $showName, $idImage, $description)
    {
         $query = "INSERT INTO ".$this->tableName.
        " (idCategory, showName, idImage, description) ".
        "VALUES (:idCategory, :showName, :idImage, :description);";
            
        $parameters["idCategory"] = $idCategory;
        $parameters["showName"] = $showName;
        $parameters["idImage"] = $idImage;
        $parameters["description"] = $description;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);

    }


    public function Delete($ShowID)
    {
        $query = "DELETE FROM ".$this->tableName." WHERE id = :ShowId";
        
        $parameters["ShowId"] = $ShowID;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

}





?>