<?php

namespace DAO;


use Models\Show as Show;


class ShowDAO
{
    private $tableName = "shows";


    public function GetAllShows()
    {
        $ShowList = array();

        $query = "SELECT S.idshow, showname, id_image, description FROM ".$this->tableName." S inner join presentations P on S.idshow = P.idshow where P.date > now() group by S.idshow";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Show = new Show();
            $Show->setIdShow($row["idshow"]);
            $Show->setShowName($row["showname"]);
            $Show->setIdImage($row["id_image"]);
            $Show->setDescription($row["description"]);

            array_push($ShowList, $Show);
        }

        return $ShowList;
    }


    public function GetShowsByCategory($idcategory)
    {
        $ShowList = array();

        $query = "SELECT S.idshow, showname, id_image, description".
        " FROM ".$this->tableName." S inner join categoryxshow CXS on S.idshow=CXS.idshow inner join categories C on c.idcategory= CXS.idcategory".
        " where C.idcategory = :idcategory";

        $parameters["idcategory"] = $idcategory;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query, $parameters);
        
        foreach ($resultSet as $row)
        {                
            $Show = new Show();
            $Show->setIdShow($row["idshow"]);
            $Show->setShowName($row["showname"]);
            $Show->setIdImage($row["id_image"]);
            $Show->setDescription($row["description"]);

            array_push($ShowList, $Show);
        }

        return $ShowList;
    }

    public function GetShowsByArtist($idArtist)
    {
        $ShowList = array();

        $query = "SELECT S.idshow, showname, id_image, description FROM shows S ".
        "inner join presentations P on S.idshow = P.idshow ".
        "inner join artistxpresentation AXP on AXP.idpresentation = P.idpresentation ".
        "inner join artists A on A.idartist = AXP.idartist ".
        " where P.date > now() and A.idartist = ".$idArtist;
 
        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Show = new Show();
            $Show->setIdShow($row["idshow"]);
            $Show->setShowName($row["showname"]);
            $Show->setIdImage($row["id_image"]);
            $Show->setDescription($row["description"]);

            array_push($ShowList, $Show);
        }

        return $ShowList;
    }

    public function GetShowsByDate($date)
    {
        $ShowList = array();

        $query = "SELECT S.idshow, showname, id_image, description FROM shows S ".
        "inner join presentations P on S.idshow = P.idshow ".
        " where DAY(P.date) = DAY('".$date."') and MONTH(P.date) = MONTH('".$date."')";
 
        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Show = new Show();
            $Show->setIdShow($row["idshow"]);
            $Show->setShowName($row["showname"]);
            $Show->setIdImage($row["id_image"]);
            $Show->setDescription($row["description"]);

            array_push($ShowList, $Show);
        }

        return $ShowList;
    }

    public function GetShowsBySeat($idSeat)
    {
        $ShowList = array();

        $query = "SELECT S.idshow, showname, id_image, description FROM shows S ".
        "inner join presentations P on S.idshow = P.idshow ".
        "inner join locations L on L.idpresentation = P.idpresentation ".
        "inner join seats SE on SE.idseat = L.idseat ".
        " where P.date > now() and SE.idseat = ".$idSeat;
 
        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Show = new Show();
            $Show->setIdShow($row["idshow"]);
            $Show->setShowName($row["showname"]);
            $Show->setIdImage($row["id_image"]);
            $Show->setDescription($row["description"]);

            array_push($ShowList, $Show);
        }

        return $ShowList;
    }

    public function GetDatesByShows()
    {
        $datesList = array();

        $showsList = $this->GetAllShows();

        foreach ($showsList as $show) {
            
            $idshow = $show->getIdShow();

            $query = "SELECT p.date 'date' FROM shows S ".
            "inner join presentations P on S.idshow = P.idshow ".
            " where P.date > now() and S.idshow = ".$idshow;
 
            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row)
            {                
                //$date = date("d/m/y", strtotime($row["date"]) );
    
                array_push($datesList, $row['date']);
            }
        }

        return $datesList;
    }


    public function GetShowByID($idShow)
    {
        $Show = null;

        $query = "SELECT idshow, showname, id_image, description FROM ".$this->tableName." where idshow =".$idShow;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Show = new Show();
            $Show->setIdShow($row["idshow"]);
            $Show->setShowName($row["showname"]);
            $Show->setIdImage($row["id_image"]);
            $Show->setDescription($row["description"]);;
        }

        return $Show;
    }


    public function addShow($Show)
    {
        $query = "INSERT INTO ".$this->tableName.
        " (showName, id_image, description) ".
        "VALUES (:showName, :idImage, :description);";
            
        $parameters["showName"] = $Show->getShowName();
        $parameters["idImage"] = $Show->getIdImage();
        $parameters["description"] = $Show->getDescription();

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);


        $query = "SELECT LAST_INSERT_ID() 'last'";

        $resultSet = $this->connection->Execute($query);

        return $resultSet[0]['last'];
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
        " set name = :seatName, showName = :showName, id_image = :idImage, description = :description".
        " WHERE id = :showId";
        
        $parameters["showname"] = $showName;
        $parameters["idImage"] = $idImage;
        $parameters["description"] = $description;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

    public function addCategoryToShow($idshow, $idCategory)
    {
        $query = "INSERT INTO categoryxshow".
        " (idshow, idCategory) ".
        "VALUES (:idshow, :idCategory);";
            
        $parameters["idshow"] = $idshow;
        $parameters["idCategory"] = $idCategory;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

    public function setImageToShow($showId, $imageId)
    {
        $query = "UPDATE ".$this->tableName.
        " set id_image = :imageId".
        " WHERE idshow = :showId";

        $parameters["imageId"] = $imageId;
        $parameters["showId"] = $showId;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }
}





?>