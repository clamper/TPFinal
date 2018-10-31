<?php

    // Definicion de un Ticket, especificamente se refiere a un ticket vendido, tiene un usuario, una localidad, un numero de ticket y un codigo qr
    // Deberia ser este ticket el que se envia por mail

    namespace Models;

    class Ticket
    {
        private $ticketNumber;
        private $idUser;
        private $idLocation;
        private $qrCode;

        public function getTicketNumber()
        {
            return $this->ticketNumber;
        }

        public function setTicketNumber($ticketNumber)
        {
            $this->ticketNumber = $ticketNumber;
        }

        public function getIdUser()
        {
            return $this->idUser;
        }

        public function setIdUser($idUser)
        {
            $this->idUser = $idUser;
        }        

        public function getIdLocation()
        {
            return $this->idLocation;
        }

        public function setIdLocation($idLocation)
        {
            $this->idLocation = $idLocation;
        }

        public function getQrCode()
        {
            return $this->qrCode;
        }

        public function setQrCode($qrCode)
        {
            $this->qrCode = $qrCode;
        }

    }

?>