<?php

namespace DAO;


use Models\User as User;


class UserDAO
{
    private $tableName = "users";

    private $idUser;
    private $email;
    private $password;


    public function GetUserByID($id)
    {
        $User = null;

        $query = "SELECT iduser, name, email FROM ".$this->tableName." where id=".$id;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $User = new User();
            $User->setIdUser($row["idUser"]);
            $User->setname()($row["name"]);
            $User->setEmail($row["email"]);
            $User->setUserType($row["isadmin"]);
            
        }

        return $User;
    }

    public function GetUserByEmail($email)
    {
        $User = null;

        $query = "SELECT * FROM ".$this->tableName." where email='".$email."'";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $User = new User();
            $User->setname($row["name"]);
            $User->setIdUser($row["iduser"]);
            $User->setEmail($row["email"]);
            $User->setPassword($row["password"]);
            $User->setUserType($row["isadmin"]);
        }

        return $User;
    }


    public function addUser($name, $email, $pass)
    {
        $query = "INSERT INTO ".$this->tableName." (name, email, password) VALUES (:name, :email, :password);";
            
        $parameters["name"] = $name;
        $parameters["email"] = $email;
        $parameters["password"] = $pass;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);

    }


    public function Delete($UserID)
    {
        $query = "DELETE FROM".$this->tableName." WHERE id = :UserID";
        
        $parameters["UserID"] = $UserID;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

}





?>