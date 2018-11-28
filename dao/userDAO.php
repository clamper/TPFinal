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
            $User->setName()($row["name"]);
            $User->setEmail($row["email"]);
            $User->setUserType($row["isadmin"]);
            
        }

        return $User;
    }

    public function GetUserByEmail($email)
    {
        $User = null;

        $query = "SELECT 'name', iduser, email, 'password', isadmin FROM ".$this->tableName." where email='".$email."'";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $User = new User();
            $User->setName($row["name"]);
            $User->setIdUser($row["iduser"]);
            $User->setEmail($row["email"]);
            $User->setPassword($row["password"]);
            $User->setUserType($row["isadmin"]);
        }

        return $User;
    }

    public function addUser($user)
    {
        $query = "INSERT INTO ".$this->tableName." (name, email, password) VALUES (:name, :email, :password);";
            
        $parameters["name"] = $user->getName();
        $parameters["email"] = $user->getEmail();
        $parameters["password"] = $user->getPassword();

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);

    }

    public function resetPass($mail, $newpass)
    {
        $user = $this->GetUserByEmail($mail);
        $idUser = $user->getIdUser();

        $query = "UPDATE ".$this->tableName." set password = :newpass WHERE iduser = :idUser";
        
        $parameters["newpass"] = $newpass;
        $parameters["idUser"] = $idUser;

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