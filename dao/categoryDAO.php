<?php

namespace DAO;


use models\category as Category;


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
            $category = new Category();
            $category->setIdCategory($row["idcategory"]);
            $category->setCategoryName($row["categoryname"]);

            array_push($CategoryList, $category);
        }

        return $CategoryList;
    }

    public function GetAllCategoriesInUse()
    {
        $CategoryList = array();

        $query = "SELECT c.idcategory, c.categoryname FROM categories C inner join categoryxshow CXS on c.idcategory = CXS.idcategory ". 
        "where C.isactive = true and CXS.idshow is not null group by c.categoryname ";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $row)
        {                
            $category = new Category();
            $category->setIdCategory($row["idcategory"]);
            $category->setCategoryName($row["categoryname"]);

            array_push($CategoryList, $category);
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
            $Category->setCategoryName($row["categoryname"]);
        }

        return $Category;
    }


    public function addCategory($CategoryName)
    {
        $existId = $this->existCategory($CategoryName);

        if ($existId <> -1)
        {
            $query = "UPDATE ".$this->tableName." set isactive = true where idcategory = :ExistId;";
            $parameters["ExistId"] = $existId;
        }
        else
        {
            $query = "INSERT INTO ".$this->tableName." (Categoryname) VALUES (:Categoryname);";
            $parameters["Categoryname"] = $CategoryName;
        }   
        

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);

    }


    public function Delete($CategoryID)
    {
        $query = "UPDATE ".$this->tableName." set isActive = false WHERE idCategory = :CategoryCode";
        
        $parameters["CategoryCode"] = $CategoryID;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

    private function existCategory($nameCategory)
    {
        $exist = -1;

        $query = "SELECT idcategory FROM ".$this->tableName." where categoryname = '".$nameCategory."'";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);

        if (count($resultSet) > 0)
            $exist = $resultSet[0]["idcategory"];

        return $exist;
    }


    public function UpdateCategory($categoryId, $CategoryName)
    {
        $query = "UPDATE ".$this->tableName." set categoryname = :CategoryName WHERE idCategory = :categoryId";
        
        $parameters["CategoryName"] = $CategoryName;
        $parameters["categoryId"] = $categoryId;

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

}





?>