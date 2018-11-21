<?php

    // Definicion de usuarios registrados.

    namespace Models;

    class User
    {
        private $idUser;
        private $name;
        private $email;
        private $password;
        private $userType;

        public function getName()
        {
            return $this->name;
        }

        public function setname($name)
        {
            $this->name = $name;
        }

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

        public function getUserType()
        {
            return $this->userType;
        }

        public function setUserType($userType)
        {
            $this->userType = $userType;
        }

    }

?>