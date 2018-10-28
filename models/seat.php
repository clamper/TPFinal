<?php

    // Definicion de tipos de asientos existentes: palco, general, platea lateral, platea central, etc

    namespace Models;

    class Seat
    {
        private $idSeat;
        private $seatName;

        public function getIdSeat()
        {
            return $this->idSeat;
        }

        public function setIdSeat($idSeat)
        {
            $this->idSeat = $idSeat;
        }

        public function getSeatName()
        {
            return $this->seatName;
        }

        public function setSeatName($seatName)
        {
            $this->seatName = $seatName;
        }

    }

?>