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


    public function GetShowsByCategory($idcategory)
    {
        $ShowList = array();

        $query = "SELECT *".
        " FROM ".$this->tableName." S inner join categoryxshow CXS on S.idshow=CXS.idshow inner join categories C on c.idcategory= CXS.idcategory".
        " where C.idcategory = :idcategory";

        $parameters["idcategory"] = $idcategory;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query, $parameters);
        
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

    public function GetShowsByArtist($idArtist)
    {
        $ShowList = array();

        $query = "SELECT * FROM shows S ".
        "inner join presentations P on S.idshow = P.idshow ".
        "inner join artistxpresentation AXP on AXP.idpresentation = P.idpresentation ".
        "inner join artists A on A.idartist = AXP.idartist ".
        " where A.idartist = ".$idArtist;
 
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


    public function GetShowBsyID($idShow)
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


    public function addShow($showName, $idImage, $description)
    {
        $query = "INSERT INTO ".$this->tableName.
        " (showName, idImage, description) ".
        "VALUES (:showName, :idImage, :description);";
            
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


    public function UpdateShow($showId, $showName, $idImage, $description)
    {
        $query = "UPDATE ".$this->tableName.
        " set name = :seatName, showName = :showName, idImage = :idImage, description = :description".
        " WHERE id = :showId";
        
        $parameters["showName"] = $showName;
        $parameters["idImage"] = $idImage;
        $parameters["description"] = $description;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

    public function addCategoryToShow($idshow, $idCategory)
    {
        $query = "INSERT INTO categoryxshow".
        " (idshow, idCategory) ".
        "VALUES (:idshow, :idCategory, :description);";
            
        $parameters["idshow"] = $idshow;
        $parameters["idCategory"] = $idCategory;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

}





?>