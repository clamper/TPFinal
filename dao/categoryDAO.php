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

    private function isActive($idcategory)
    {
        $active = false;

        $query = "SELECT isactive FROM ".$this->tableName." where idcategory ='".$idcategory."'";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);

        if ($resultSet[0]["isactive"] == 1)
            $active = true;

        return $active;
    }


    public function addCategory($CategoryName)
    {
        $msg = "";

        $index = $this->existCategory($CategoryName);

        if ( $index > -1)
        {
            if ($this->isActive($index))
                $msg = "la categoria ya existe";
            else
            {
                $query = "UPDATE ".$this->tableName." set isactive = true where idcategory = :index;";
                $parameters["index"] = $index;

                $msg = "categoria agregada con exitos";

                try
                {
                    $this->connection = Connection::GetInstance();

                    $this->connection->ExecuteNonQuery($query, $parameters);

                }catch(Exception $ex)
                {
                    $msg = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
                } 
            }
        }
        else
        {
            $query = "INSERT INTO ".$this->tableName." (Categoryname) VALUES (:Categoryname);";
            $parameters["Categoryname"] = $CategoryName;
            $msg = "categoria agregada con exitos";

            try
            {
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            }catch(Exception $ex)
            {
                $msg = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
            } 

        }

        return $msg;
    }


    public function Delete($CategoryID)
    {
        $msg = "";

        $showDAO =  new ShowDao();
        $cant = count($showDAO-> GetShowsByCategory($CategoryID));

        if ($cant == 0)
        {
            $query = "UPDATE ".$this->tableName." set isActive = false WHERE idCategory = :CategoryCode";
        
            $parameters["CategoryCode"] = $CategoryID;

            try
            {
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

                $msg = "categoria eliminada con exito";

            }catch(Exception $ex)
            {
                $msg = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
            }  
        }
        else
            $msg = "la categoria no puede ser eliminada por que hay un evento asociado a ella";

        return $msg;
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
        $msg = "";

        $index = $this->existCategory($CategoryName);

        if ( $index == -1)
        {
            $query = "UPDATE ".$this->tableName." set categoryname = :CategoryName WHERE idCategory = :categoryId";
        
            $parameters["CategoryName"] = $CategoryName;
            $parameters["categoryId"] = $categoryId;

            try
            {
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

                $msg = "categoria actualizada con exito";

            }catch(Exception $ex)
            {
                $msg = "ah ocurrido un error con el servidor, aguarde un instante y pruebe nuevamente";
            }  
        }
        else
            if ($this->isActive($index))
                $msg = "ya existe una categoria con ese nombre";
            else
                $msg = "ya existia una categoria con ese nombre; debe usar la funcion agregar nueva caegoria";

        return $msg;
    }

}





?>