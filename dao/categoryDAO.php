<?php

namespace DAO;


use Models\Category as Category;


class CategoryDAO
{
    private $tableName = "categories";


    public function GetAllCategories()
    {
        $CategoryList = array();

        $query = "SELECT * FROM ".$this->tableName." where isactive = true";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Category = new Category();
            $Category->setIdCategory($row["idCategory"]);
            $Category->setCategoryName($row["name"]);

            array_push($CategoryList, $Category);
        }

        return $CategoryList;
    }


    public function GetCategorybyID($id)
    {
        $Category = null;

        $query = "SELECT * FROM ".$this->tableName." where id=".$id;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $Category = new Category();
            $Category->setIdCategory($row["idCategory"]);
            $Category->setCategoryName($row["name"]);
        }

        return $Category;
    }


    public function addCategory($CategoryName)
    {
        $query = "INSERT INTO ".$this->tableName." (Categoryname) VALUES (:Categoryname);";
            
        $parameters["Categoryname"] = $CategoryName;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);

    }


    public function Delete($CategoryID)
    {
        $query = "UPDATE ".$this->tableName." set isActive = false WHERE id = :CategoryCode";
        
        $parameters["CategoryCode"] = $CategoryID;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

}





?>