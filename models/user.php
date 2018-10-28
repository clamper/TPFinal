<?php

    // Definicion de usuarios registrados.

    namespace Models;

    class User
    {
        private $idUser;
        private $email;
        private $password;

        public function getIdUser()
        {
            return $this->idUser;
        }

        public function setIdUser($idUser)
        {
            $this->idUser = $idUser;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

    }

?>