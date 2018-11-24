<?php

    // Definicion de una Localidad, una localidad es: todos los lugares disponibles 
    // en una presentacion (artista + show + fecha), para una ubicacion

    // especifica (platea, etc), contra de un id de locaclidad, un precio, y
    // las cantidades totales de lugares y vendidas.

    namespace Models;

    class Location
    {
        private $idLocation;
        private $idPres;        // para que presentacion
        private $idSeat;        // en que ubicacion
        private $locationPrice;
        private $locationQty;   // cantidad de lugares totales para esa localidad

        public function getIdLocation()
        {
            return $this->idLocation;
        }

        public function setIdLocation($idLocation)
        {
            $this->idLocation = $idLocation;
        }

        public function getIdPres()
        {
            return $this->idPres;
        }

        public function setIdPres($idPres)
        {
            $this->idPres = $idPres;
        }

        public function getIdSeat()
        {
            return $this->idSeat;
        }

        public function setIdSeat($idSeat)
        {
            $this->idSeat = $idSeat;
        }

        public function getLocationPrice()
        {
            return $this->locationPrice;
        }

        public function setLocationPrice($locationPrice)
        {
            $this->locationPrice = $locationPrice;
        }
       
        public function getLocationQty()
        {
            return $this->locationQty;
        }

        public function setLocationQty($locationQty)
        {
            $this->locationQty = $locationQty;
        }

    }

?>