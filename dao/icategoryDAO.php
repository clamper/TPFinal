<?php

namespace DAO;

use Model\Category as Category;

interface ICategoryDAO
{
    function GetAllCategories();
    function GetAllCategoriesInUse();
    function GetCategorybyID($id);
    function addCategory($Category);
    function Delete($CategoryID);
    function UpdateCategory($categoryId, $CategoryName);

}

?>