<?php

    namespace DAO;

    use Models\Presentation as Presentation;

    class PresentationDAO implements IPresentationDAO
    {
        private $tableName = "presentations";
        private $tableArtist= "artistxpresentation";

        public function GetPresentationById($idPresentation)
        {
            $Presentation = null;

            $query = "SELECT idpresentation, idshow, date FROM ".$this->tableName." where idPresentation=".$idPresentation;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $Presentation = new Presentation();
                $Presentation->setIdPres($row["idpresentation"]);
                $Presentation->setIdShow($row["idshow"]);
                $Presentation->setPresDate($row["date"]);
            }
 
            return $Presentation;
        }

        public function GetAllPresentations()
        {
            $presentationsList = array();

            $query = "SELECT idpresentation, idshow, date FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $Presentation = new Presentation();
                $Presentation->setIdPres($row["idPresentation"]);
                $Presentation->setIdShow($row["idShow"]);
                $Presentation->setPresDate($row["Date"]);         
                
                array_push($presentationsList, $Presentation);
            }

            return $presentationsList;
        }

        public function GetAllPresentationsByDate($Date)
        {
            $presentationsList = array();

            $query = "SELECT idpresentation, idshow, date FROM ".$this->tableName." where Date =".$Date;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $Presentation = new Presentation();
                $Presentation->setIdPres($row["idPresentation"]);
                $Presentation->setIdShow($row["idShow"]);
                $Presentation->setPresDate($row["Date"]);         
                
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

            $query = "SELECT idpresentation, idshow, date FROM ".$this->tableName." where idShow =".$idShow;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $Presentation = new Presentation();
                $Presentation->setIdPres($row["idpresentation"]);
                $Presentation->setIdShow($row["idshow"]);
                $Presentation->setPresDate($row["date"]);         
                
                array_push($presentationsList, $Presentation);
            }

            return $presentationsList;
        }

        public function AddPresentation($presentation)
        {
            $query = "INSERT INTO ".$this->tableName." (idShow, Date) VALUES (:idShow, :Date);";
            $parameters["idShow"] = $presentation->getIdShow();
            $parameters["Date"] = $presentation->getPresDate();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

            $query = "SELECT LAST_INSERT_ID() 'last'";

            $resultSet = $this->connection->Execute($query);

            return $resultSet[0]['last'];
        }

        public function AddArtistToPresentation($idPresentation, $idArtist)
        {
            $query = "INSERT INTO ".$this->tableArtist." (idArtist, idPresentation) VALUES (:idArtist, :idPresentation);";
            $parameters["idArtist"] = $idArtist;
            $parameters["idPresentation"] = $idPresentation;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }


    }

?>