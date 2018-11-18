<?php

    use Models\Presentation as Presentation;

    class PresentationDAO
    {
        private $tableName = "presentations";
        private $tableArtist= "artistxpresentation";

        public function GetPresentationById($idPresentation)
        {
            $Presentation = null;

            $query = "SELECT * FROM ".$this->tableName." where idPresentation=".$idPresentation;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $Presentation = new Presentation();
                $Presentation->setIdPres($row["idPresentation"]);
                $Presentation->setIdShow()($row["idShow"]);
                $Presentation->setPresDate()($row["pressDate"]);
            }

            return $Presentation;
        }

        public function GetAllPresentations()
        {
            $presentationsList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $Presentation = new Presentation();
                $Presentation->setIdPres($row["idPresentation"]);
                $Presentation->setIdShow()($row["idShow"]);
                $Presentation->setPresDate()($row["pressDate"]);         
                
                array_push($presentationsList, $Presentation);
            }

            return $presentationsList;
        }

        public function GetAllPresentationsByDate($pressDate)
        {
            $presentationsList = array();

            $query = "SELECT * FROM ".$this->tableName." where pressDate =".$pressDate;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $Presentation = new Presentation();
                $Presentation->setIdPres($row["idPresentation"]);
                $Presentation->setIdShow()($row["idShow"]);
                $Presentation->setPresDate()($row["pressDate"]);         
                
                array_push($presentationsList, $Presentation);
            }

            return $presentationsList;
        }

        public function GetAllPresentationsByArtist($idArtist)
        {
            $presentationsList = array();

            $query = "SELECT idpresentation FROM ".$this->tableArtist." where idArtist =".$idArtist;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $idPresentation = ($row["idPresentation"]);

                array_push($presentationsList, $this->GetPresentationById($idPresentation));
            }

            return $presentationsList;
        }

        public function GetAllPresentationsByShow($idShow)
        {
            $presentationsList = array();

            $query = "SELECT * FROM ".$this->tableName." where idShow =".$idShow;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $Presentation = new Presentation();
                $Presentation->setIdPres($row["idPresentation"]);
                $Presentation->setIdShow()($row["idShow"]);
                $Presentation->setPresDate()($row["pressDate"]);         
                
                array_push($presentationsList, $Presentation);
            }

            return $presentationsList;
        }

        public function AddPresentation($idShow, $pressDate)
        {
            $error = "";

            $query = "INSERT INTO ".$this->tableName." (idShow, pressDate) VALUES (:idShow, :pressDate);";
            $parameters["idShow"] = $idShow;
            $parameters["pressDate"] = $pressDate;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

            return $error;
        }




    }

?>