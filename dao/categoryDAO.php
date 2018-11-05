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

        if ( existCategory($CategoryName))
            $query = "UPDATE ".$this->tableName." set Categoryname = :Categoryname where Categoryname = :Categoryname;";
        else
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

    private function existCategory($nameCategori)
    {
        $exist = false;

        $query = "SELECT * FROM ".$this->tableName." where categoryname =".$CategoryName;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);

        if (count($resultSet) > 0)
            $exist = true;

        return $exist;
    }


    public function UpdateCategory($categoryId, $CategoryName)
    {
        $query = "UPDATE ".$this->tableName." set name = :CategoryName WHERE id = :categoryId";
        
        $parameters["CategoryName"] = $CategoryName;
        $parameters["categoryId"] = $categoryId;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

}





?>